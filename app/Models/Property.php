<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'price',
        'location',
        'address',
        'latitude',
        'longitude',
        'type',
        'bedrooms',
        'bathrooms',
        'area',
        'image_url',
        'public_id',
        'google_drive_link',
        'featured',
        'status',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'status' => 'boolean',
        'price' => 'decimal:2',
    ];

    // Relation with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Map URL Accessor
    public function getMapUrlAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return "https://www.google.com/maps?q={$this->latitude},{$this->longitude}";
        }

        if ($this->address) {
            return "https://www.google.com/maps/search/?api=1&query=" . urlencode($this->address);
        }

        return "https://www.google.com/maps/search/?api=1&query=" . urlencode($this->location);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeLocation($query, $location)
    {
        return $query->where('location', 'like', "%$location%");
    }

 

    /**
     * Get the bookings for the property.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get the wishlists for the property.
     */
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    /**
     * Interact with the property's images.
     
    protected function images(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true) ?? [],
            set: fn ($value) => json_encode($value),
        );
    }
*/

    /**
     * Get featured image
     */
    public function getFeaturedImageAttribute()
    {
        $images = $this->images;
        return !empty($images) ? $images[0] : null;
    }

 

 



    /**
     * Scope a query to filter by price range.
     */
    public function scopePriceRange($query, $min, $max)
    {
        return $query->whereBetween('price', [$min, $max]);
    }

    /**
     * Scope a query to filter by bedrooms.
     */
    public function scopeBedrooms($query, $bedrooms)
    {
        return $query->where('bedrooms', '>=', $bedrooms);
    }

    /**
     * Scope a query to filter by bathrooms.
     */
    public function scopeBathrooms($query, $bathrooms)
    {
        return $query->where('bathrooms', '>=', $bathrooms);
    }

    // Review mgt
public function reviews()
{
    return $this->hasMany(Review::class);
}

public function approvedReviews()
{
    return $this->hasMany(Review::class)->approved();
}

public function averageRating()
{
    return $this->approvedReviews()->avg('rating') ?: 0;
}

public function totalReviews()
{
    return $this->approvedReviews()->count();
}
public function availableForInspection()
{
    return $this->status && $this->user_id !== auth()->id();
}
public function isForSale()
{
    return $this->type === 'sale' || $this->type === 'buy';
}

public function isForRent()
{
    return $this->type === 'rent' || $this->type === 'shortlet';
}

public function canBePurchased()
{
    return $this->isForSale() && $this->status && $this->price > 0;
}

public function canBeRented()
{
    return $this->isForRent() && $this->status && $this->price > 0;
}
}

