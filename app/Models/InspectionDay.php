<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_name',
        'start_time',
        'end_time',
        'is_available',
        'max_bookings_per_slot'
    ];

    protected $casts = [
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'is_available' => 'boolean'
    ];

    public function getTimeSlotsAttribute()
    {
        $slots = [];
        $start = \Carbon\Carbon::parse($this->start_time);
        $end = \Carbon\Carbon::parse($this->end_time);
        
        while ($start < $end) {
            $slots[] = $start->format('H:i');
            $start->addMinutes(30); // 30-minute slots
        }
        
        return $slots;
    }
}