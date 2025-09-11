<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogDisplayController extends Controller
{
    // Show all blogs (latest first)
    public function index()
    {
        $blogs = Blog::where('status', 'publish')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $trending = Blog::where('status', 'publish')
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        return view('blog', compact('blogs', 'trending'));
    }

    public function show($slug)
{
    $post = Blog::where('slug', $slug)
        ->where('status', 'publish')
        ->firstOrFail();

    // Increase views count
    $post->increment('views');

    return view('blog_show', compact('post'));
}

}
