<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'user_id',
        'published',
        'published_at',
    ];

    protected $casts = [
        'published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Boot function for setting up model event hooks.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });

        static::updating(function ($blog) {
            if ($blog->isDirty('title') && empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }

    /**
     * Get the user that owns the blog post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include published posts.
     */
    public function scopePublished($query)
    {
        return $query->where('published', true)
                    ->where('published_at', '<=', now());
    }

    /**
     * Scope a query to only include draft posts.
     */
    public function scopeDraft($query)
    {
        return $query->where('published', false)
                    ->orWhere('published_at', '>', now());
    }

    /**
     * Scope a query to order by latest published.
     */
    public function scopeLatestPublished($query)
    {
        return $query->published()->orderBy('published_at', 'desc');
    }

    /**
     * Scope a query to search posts.
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
              ->orWhere('excerpt', 'like', '%' . $search . '%')
              ->orWhere('content', 'like', '%' . $search . '%');
        });
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Check if the post is published.
     */
    public function isPublished()
    {
        return $this->published && $this->published_at <= now();
    }

    /**
     * Check if the post is scheduled for future publication.
     */
    public function isScheduled()
    {
        return $this->published && $this->published_at > now();
    }

    /**
     * Check if the post is a draft.
     */
    public function isDraft()
    {
        return !$this->published;
    }

    /**
     * Get the reading time of the post.
     */
    public function getReadingTime()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / 200); // Average reading speed is 200 words per minute
        
        return $minutes . ' min read';
    }

    /**
     * Get the excerpt with a character limit.
     */
    public function getLimitedExcerpt($limit = 150)
    {
        return Str::limit(strip_tags($this->excerpt), $limit);
    }
}