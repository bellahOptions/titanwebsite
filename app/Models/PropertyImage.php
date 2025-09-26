<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'cloudinary_public_id',
        'url',
        'is_featured',
        'order'
    ];

    protected $appends = ['optimized_url', 'thumbnail_url']; // Add computed attributes

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * Get optimized image URL
     */
    public function getOptimizedUrl($width = 800, $height = 600)
    {
        if (!$this->cloudinary_public_id) {
            return null;
        }
        
        $cloudName = config('cloudinary.cloud_name');
        if (!$cloudName) {
            return $this->url; // Fallback to original URL
        }

        return "https://res.cloudinary.com/{$cloudName}/image/upload/w_{$width},h_{$height},c_limit,q_auto/{$this->cloudinary_public_id}";
    }

    /**
     * Get thumbnail URL
     */
    public function getThumbnailUrl()
    {
        return $this->getOptimizedUrl(300, 200);
    }

    /**
     * Accessor for optimized URL (for JSON responses)
     */
    public function getOptimizedUrlAttribute()
    {
        return $this->getOptimizedUrl();
    }

    /**
     * Accessor for thumbnail URL (for JSON responses)
     */
    public function getThumbnailUrlAttribute()
    {
        return $this->getThumbnailUrl();
    }
}