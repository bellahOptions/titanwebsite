<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly; // Add this

class Property extends Model
{
    use HasFactory; // Add MediaAlly trait

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
        'featured',
        'status'
    ];

    protected $casts = [
        'featured' => 'boolean',
        'status' => 'boolean',
        'price' => 'decimal:2',
    ];

    protected $appends = ['map_url', 'featured_image', 'thumbnail']; // Add computed attributes

    /**
     * Get the user that owns the property.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the property images
     */
    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    /**
     * Get featured image
     */
    public function featuredImage()
    {
        // Return featured image if exists, otherwise first image
        return $this->images()
            ->where('is_featured', true)
            ->first()
            ?? $this->images()->first();
    }

    /**
     * Accessor for featured image URL
     */
    public function getFeaturedImageAttribute()
    {
        $featuredImage = $this->featuredImage();
        return $featuredImage ? $featuredImage->getOptimizedUrl(800, 600) : null;
    }


    /**
     * Get all images for gallery
     */
    public function getGalleryImagesAttribute()
    {
        return $this->images()->orderBy('order')->get();
    }

    // ... rest of your model code remains the same
    /**
     * Get optimized image URL with transformations
     */
    public function getImageUrl($transformations = [])
    {
        $image = $this->getFirstMedia('properties');
        if ($image) {
            $defaultTransformations = [
                'width' => 800,
                'height' => 600,
                'crop' => 'limit',
                'quality' => 'auto'
            ];
            
            $finalTransformations = array_merge($defaultTransformations, $transformations);
            return $image->getSecureUrl($finalTransformations);
        }
        return null;
    }

    /**
     * Get thumbnail URL
     */
    public function getThumbnailAttribute()
    {
        return $this->getImageUrl(['width' => 300, 'height' => 200, 'crop' => 'fill']);
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

    // Review management
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