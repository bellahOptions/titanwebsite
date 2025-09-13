<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
        protected $fillable = [
        'name',
        'description',
        'features',
        'property_type',
        'listing_price',
        'sale_lease_price',
        'lease_term',
        'address',
        'featured_image',
        'additional_images',
        'featured',
        'views',
    ];

    protected $casts = [
        'additional_images' => 'array', // Laravel auto-decodes JSON
    ];

    // optional helper
    public function incrementViews()
    {
        $this->increment('views');
    }
}

