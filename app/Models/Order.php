<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'property_id',
        'user_id',
        'type',
        'amount',
        'status',
        'details',
        'notes',
        'paid_at'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'details' => 'array',
        'paid_at' => 'datetime'
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopePaid($query)
    {
        return $query->where('status', 'paid');
    }

    public function scopePurchase($query)
    {
        return $query->where('type', 'purchase');
    }

    public function scopeRental($query)
    {
        return $query->where('type', 'rental');
    }

    public function markAsPaid()
    {
        $this->update([
            'status' => 'paid',
            'paid_at' => now()
        ]);
    }

    public function getFormattedAmountAttribute()
    {
        return '$' . number_format($this->amount, 2);
    }

    public function getDetailsSummaryAttribute()
    {
        if ($this->type === 'rental' && isset($this->details['check_in'])) {
            $checkIn = \Carbon\Carbon::parse($this->details['check_in']);
            $checkOut = \Carbon\Carbon::parse($this->details['check_out']);
            $days = $checkIn->diffInDays($checkOut);
            
            return "{$days} nights ({$checkIn->format('M d, Y')} to {$checkOut->format('M d, Y')})";
        }
        
        return 'One-time purchase';
    }
}