<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $featuredProperties = Property::where('featured', true)
            ->where('status', true)
            ->take(6)
            ->get();
            
        $latestBlogs = Blog::where('published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
            
        return view('home', compact('featuredProperties', 'latestBlogs'));
    }
}