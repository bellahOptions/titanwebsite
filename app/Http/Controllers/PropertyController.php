<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Requests\PropertyRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get filter parameters from request
        $filters = $request->only(['type', 'location', 'min_price', 'max_price', 'bedrooms', 'bathrooms']);
        
        // Start with all active properties
        $properties = Property::active();
        
        // Apply filters
        if (!empty($filters['type'])) {
            $properties->ofType($filters['type']);
        }
        
        if (!empty($filters['location'])) {
            $properties->location($filters['location']);
        }
        
        if (!empty($filters['min_price']) || !empty($filters['max_price'])) {
            $min = $filters['min_price'] ?? 0;
            $max = $filters['max_price'] ?? PHP_INT_MAX;
            $properties->priceRange($min, $max);
        }
        
        if (!empty($filters['bedrooms'])) {
            $properties->bedrooms($filters['bedrooms']);
        }
        
        if (!empty($filters['bathrooms'])) {
            $properties->bathrooms($filters['bathrooms']);
        }
        
        // Get paginated results
        $properties = $properties->latest()->paginate(12);
        
        // Property types for filter dropdown
        $propertyTypes = ['sale' => 'For Sale', 'rent' => 'For Rent', 'lease' => 'For Lease'];
        
        return view('properties.index', compact('properties', 'filters', 'propertyTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $propertyTypes = ['sale' => 'For Sale', 'rent' => 'For Rent', 'lease' => 'For Lease'];
        return view('admin.properties.create', compact('propertyTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'type' => 'required|in:sale,rent,lease',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'area' => 'nullable|integer|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $propertyData = $validator->validated();
        $propertyData['user_id'] = auth()->id();
        $propertyData['featured'] = $request->has('featured');
        $propertyData['status'] = $request->has('status');

        // Handle image uploads
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('properties', 'public');
                $imagePaths[] = $path;
            }
            $propertyData['images'] = $imagePaths;
        }

        Property::create($propertyData);

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        // Ensure only active properties are visible to guests
        if (!$property->status && !auth()->check()) {
            abort(404);
        }

        // For non-admin users, only show active properties
        if (!auth()->user() || !auth()->user()->isAdmin()) {
            if (!$property->status) {
                abort(404);
            }
        }

        $relatedProperties = Property::active()
            ->where('id', '!=', $property->id)
            ->where('type', $property->type)
            ->take(4)
            ->get();

              // Eager load relationships to avoid N+1 queries
    $property->load(['user', 'reviews.user']);
    
    // Get similar properties
    $similarProperties = Property::where('type', $property->type)
        ->where('id', '!=', $property->id)
        ->active()
        ->limit(4)
        ->get();

    return view('properties.show', compact('property', 'similarProperties'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $propertyTypes = ['sale' => 'For Sale', 'rent' => 'For Rent', 'lease' => 'For Lease'];
        return view('properties.edit', compact('property', 'propertyTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'description' => 'nullable|string',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|numeric|min:0',
            'area' => 'nullable|numeric|min:0',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'nullable|boolean',
            'status' => 'required|boolean'
        ]);

        $imagePaths = $property->images ?? [];

        // Update featured image
        if ($request->hasFile('featured_image')) {
            // Delete old featured image if exists
            if (!empty($imagePaths)) {
                Storage::disk('public')->delete($imagePaths[0]);
                array_shift($imagePaths); // Remove old featured image
            }

            $featuredImagePath = $request->file('featured_image')->store('properties', 'public');
            array_unshift($imagePaths, $featuredImagePath); // Add new featured image at beginning
        }

        // Add new gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $galleryImagePath = $image->store('properties', 'public');
                $imagePaths[] = $galleryImagePath;
            }
        }

        // Update property
        $propertyData = $validated;
        $propertyData['images'] = $imagePaths;
        $propertyData['featured'] = $request->has('featured');

        $property->update($propertyData);

        return redirect()->route('properties.index')
            ->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        // Delete all images
        if (!empty($property->images)) {
            foreach ($property->images as $imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        $property->delete();

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property deleted successfully.');
    }

    public function deleteImage(Property $property, $imageIndex)
    {
        $images = $property->images;
        
        if (isset($images[$imageIndex])) {
            // Delete the image file
            Storage::disk('public')->delete($images[$imageIndex]);
            
            // Remove the image from the array
            array_splice($images, $imageIndex, 1);
            
            // Update the property
            $property->update(['images' => $images]);
            
            return back()->with('success', 'Image deleted successfully.');
        }

        return back()->with('error', 'Image not found.');
    }


    /**
     * Toggle featured status of a property.
     */
    public function toggleFeatured(Property $property)
    {
        $property->featured = !$property->featured;
        $property->save();

        return redirect()->back()
            ->with('success', 'Property featured status updated successfully.');
    }

    /**
     * Toggle active status of a property.
     */
    public function toggleStatus(Property $property)
    {
        $property->status = !$property->status;
        $property->save();

        return redirect()->back()
            ->with('success', 'Property status updated successfully.');
    }
}