<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of blogs.
     */
    public function index()
    {
        $blogs = Blog::orderBy('post_date', 'desc')->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created blog post in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required|string|max:255',
            'post_content' => 'required|string',
            'post_status' => 'required|in:publish,draft',
        ]);

        Blog::create([
            'post_author' => Auth::id(),
            'post_date' => now(),
            'post_date_gmt' => now(),
            'post_title' => $request->post_title,
            'post_content' => $request->post_content,
            'post_status' => $request->post_status,
            'post_type' => 'post',
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully.');
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified blog post in the database.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'post_title' => 'required|string|max:255',
            'post_content' => 'required|string',
            'post_status' => 'required|in:publish,draft',
        ]);

        $blog->update([
            'post_title' => $request->post_title,
            'post_content' => $request->post_content,
            'post_status' => $request->post_status,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified blog post from the database.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully.');
    }
}
