<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'site_name',
        'facebook_url',
        'x_url', 
        'youtube_url',
        'instagram_url',
        'map_url',
        'company_address',
        'auto_approve_properies',
        'status',
        'admin_email',
        'currency',
        'currency_symbol'
    ];

    protected $attributes = [
        'site_name' => 'Your Site Name',
        'facebook_url' => '#',
        'x_url' => '#',
        'youtube_url' => '#',
        'instagram_url' => '#',
        'map_url' => '#',
        'company_address' => 'Company Address',
        'auto_approve_properies' => 'no',
        'status' => 'active',
        'admin_email' => 'admin@titannesources.com',
        'currency' => 'Naira',
        'currency_symbol' => '₦',
    ];
}