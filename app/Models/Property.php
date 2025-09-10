<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'views', // add this
        // other fields
    ];

    // optional helper
    public function incrementViews()
    {
        $this->increment('views');
    }
}

