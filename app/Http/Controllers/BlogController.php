<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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

    public function adminIndex(Request $request)
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
        
        return view('admin.blog.index', compact('blogs', 'search'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */


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
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Blog $blog)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'excerpt' => 'required|string|max:500',
        'content' => 'required|string',
        'image_url' => 'nullable|url',
        'public_id' => 'nullable|string',
    ]);

    try {
        // Delete old image from Cloudinary if replaced
        if ($request->filled('public_id') && $request->public_id !== $blog->public_id) {
            if ($blog->public_id) {
                Cloudinary::destroy($blog->public_id);
            }
            $validated['image_url'] = $request->image_url;
            $validated['public_id'] = $request->public_id;
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    } catch (\Exception $e) {
        \Log::error('Blog Update Failed', ['error' => $e->getMessage()]);
        return back()->withErrors(['error' => 'Failed to update blog. Please try again.']);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // Delete associated image from Cloudinary
        if ($blog->public_id) {
            try { Cloudinary::destroy($blog->public_id); } catch (\Exception $e) {}
        }

        $blog->delete();

        return redirect()->route('admin.blogs.list')
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

    public function uploadImage(Request $request)
{
    try {
        // Validate that we have an image
        $request->validate([
            'image' => 'required|image|max:5120', // 5MB max
        ]);

        // Check if file exists in the request
        if (!$request->hasFile('image')) {
            return response()->json([
                'success' => false,
                'error' => 'No image file provided.',
            ], 400);
        }

        // Upload to Cloudinary
        $uploadedFile = $request->file('image');

        $uploadResult = \CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary::upload(
            $uploadedFile->getRealPath(),
            ['folder' => 'titan/blogs'] // customize your Cloudinary folder
        );

        // Safely get response
        $uploadData = $uploadResult->getSecurePath();

        if (!$uploadData) {
            return response()->json([
                'success' => false,
                'error' => 'Cloudinary did not return an image URL.',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'url' => $uploadData,
        ]);
    } catch (\Exception $e) {
        \Illuminate\Support\Facades\Log::error('Image upload failed: '.$e->getMessage());

        return response()->json([
            'success' => false,
            'error' => $e->getMessage(),
        ], 500);
    }
}


    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'excerpt' => 'required|string',
        'content' => 'required|string',
        'uploaded_image_url' => 'nullable|string',
        'public_id' => 'nullable|string',
        'published' => 'nullable|boolean',
        'published_at' => 'nullable|date',
    ]);

    $blog = new Blog();
    $blog->title = $validated['title'];
    $blog->slug = \Str::slug($validated['title']);
    $blog->excerpt = $validated['excerpt'];
    $blog->content = $validated['content'];

    // ✅ Save the Cloudinary URL & public_id
    $blog->image_url = $validated['uploaded_image_url'] ?? null;
    $blog->public_id = $validated['public_id'] ?? null;

    $blog->user_id = auth()->id();
    $blog->published = $request->has('published');
    $blog->published_at = $validated['published_at'] ?? now();

    $blog->save();

    return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully.');
}

}