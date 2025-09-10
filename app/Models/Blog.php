<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    
    
    protected $table = 'blogs';
    public $timestamps = false; // <-- Disable Laravel timestamps
    protected $fillable = [
        'post_author',
        'post_date',
        'post_date_gmt',
        'post_content',
        'post_title',
        'post_excerpt',
        'post_status',
        'comment_status',
        'ping_status',
        'post_password',
        'post_name',
        'post_content_filtered',
        'post_parent',
        'guid',
        'menu_order',
        'post_type',
        'post_mime_type',
        'comment_count',
        'post_modified',
        'post_modified_gmt',
    ];

    protected $dates = [
        'post_date',
        'post_date_gmt',
        'post_modified',
        'post_modified_gmt',
    ];

    /**
     * Automatically set the slug (post_name) from the title
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $blog->post_name = Str::slug($blog->post_title);
        });

        static::updating(function ($blog) {
            $blog->post_modified = now();
            $blog->post_modified_gmt = now();
        });
    }

    /**
     * Author relationship
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'post_author');
    }

    /**
     * Scope only published posts
     */
    public function scopePublished($query)
    {
        return $query->where('post_status', 'publish');
    }

    /**
     * Scope by post type
     */
    public function scopeType($query, $type = 'post')
    {
        return $query->where('post_type', $type);
    }
}
