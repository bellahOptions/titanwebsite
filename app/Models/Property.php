<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
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
        'images',
        'featured',
        'status'
    ];

    protected $casts = [
        'images' => 'array',
        'featured' => 'boolean',
        'status' => 'boolean',
        'price' => 'decimal:2',
    ];

    protected $appends = ['map_url'];

    /**
     * Get the user that owns the property.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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
     */
    protected function images(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true) ?? [],
            set: fn ($value) => json_encode($value),
        );
    }

    /**
     * Get the map URL attribute.
     */
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

    /**
     * Get featured image
     */
    public function getFeaturedImageAttribute()
    {
        $images = $this->images;
        return !empty($images) ? $images[0] : null;
    }

    /**
     * Get gallery images (all except first)
     */
    public function getGalleryImagesAttribute()
    {
        $images = $this->images;
        return count($images) > 1 ? array_slice($images, 1) : [];
    }

    /**
     * Scope a query to only include active properties.
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope a query to only include featured properties.
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Scope a query to filter by type.
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope a query to filter by location.
     */
    public function scopeLocation($query, $location)
    {
        return $query->where('location', 'like', '%' . $location . '%');
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
}