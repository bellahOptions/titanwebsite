<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get search parameter from request
        $search = $request->input('search');
        
        // Start with all blogs
        $blogs = Blog::with('user');
        
        // Apply search filter if provided
        if (!empty($search)) {
            $blogs->search($search);
        }
        
        // For admin, show all blogs with pagination
        if (auth()->check() && auth()->user()->isAdmin()) {
            $blogs = $blogs->latest()->paginate(10);
        } else {
            // For guests, only show published blogs
            $blogs = $blogs->published()->latestPublished()->paginate(9);
        }
        
        return view('blog.index', compact('blogs', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }
    public function uploadImage(Request $request)
{
    $request->validate([
        'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    if ($request->hasFile('file')) {
        $path = $request->file('file')->store('blog-images', 'public');
        return response()->json([
            'location' => Storage::url($path)
        ]);
    }

    return response()->json(['error' => 'Upload failed'], 500);
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $blogData = $validator->validated();
        $blogData['user_id'] = auth()->id();
        $blogData['published'] = $request->has('published');
        
        // Generate slug from title
        $blogData['slug'] = Str::slug($blogData['title']);
        
        // Ensure slug is unique
        $counter = 1;
        $originalSlug = $blogData['slug'];
        while (Blog::where('slug', $blogData['slug'])->exists()) {
            $blogData['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('blog', 'public');
            $blogData['image'] = $path;
        }

        Blog::create($blogData);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        // For non-admin users, only show published posts
        if (!auth()->user() || !auth()->user()->isAdmin()) {
            if (!$blog->isPublished()) {
                abort(404);
            }
        }

        // Get related posts (same category or similar tags could be added later)
        $relatedPosts = Blog::published()
            ->where('id', '!=', $blog->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('blog.show', compact('blog', 'relatedPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'remove_image' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $blogData = $validator->validated();
        $blogData['published'] = $request->has('published');
        
        // Handle image removal
        if ($request->has('remove_image') && $request->input('remove_image')) {
            // Delete old image if exists
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $blogData['image'] = null;
        }

        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            
            $image = $request->file('image');
            $path = $image->store('blog', 'public');
            $blogData['image'] = $path;
        }

        // Update slug if title changed
        if ($blog->title !== $blogData['title']) {
            $blogData['slug'] = Str::slug($blogData['title']);
            
            // Ensure slug is unique
            $counter = 1;
            $originalSlug = $blogData['slug'];
            while (Blog::where('slug', $blogData['slug'])->where('id', '!=', $blog->id)->exists()) {
                $blogData['slug'] = $originalSlug . '-' . $counter;
                $counter++;
            }
        }

        $blog->update($blogData);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // Delete associated image
        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post deleted successfully.');
    }

    /**
     * Toggle published status of a blog post.
     */
    public function togglePublish(Blog $blog)
    {
        $blog->published = !$blog->published;
        
        // If publishing for the first time, set published_at to now
        if ($blog->published && !$blog->published_at) {
            $blog->published_at = now();
        }
        
        $blog->save();

        return redirect()->back()
            ->with('success', 'Blog post status updated successfully.');
    }
}