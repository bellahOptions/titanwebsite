<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
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
        $properties = Property::active()->with('images');
        
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
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $propertyData = $validator->validated();
            $propertyData['user_id'] = auth()->id();
            $propertyData['featured'] = $request->has('featured');
            $propertyData['status'] = $request->has('status');

            // Create property record
            $property = Property::create($propertyData);

            // Upload featured image
            if ($request->hasFile('featured_image')) {
                $uploadedFile = Cloudinary::upload(
                    $request->file('featured_image')->getRealPath(),
                    [
                        'folder' => 'properties/' . $property->id,
                        'transformation' => ['width' => 800, 'height' => 600, 'crop' => 'limit']
                    ]
                );

                PropertyImage::create([
                    'property_id' => $property->id,
                    'cloudinary_public_id' => $uploadedFile->getPublicId(),
                    'url' => $uploadedFile->getSecurePath(),
                    'is_featured' => true,
                    'order' => 0
                ]);
            }

            // Upload gallery images
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $index => $image) {
                    $uploadedFile = Cloudinary::upload(
                        $image->getRealPath(),
                        [
                            'folder' => 'properties/' . $property->id,
                            'transformation' => ['width' => 800, 'height' => 600, 'crop' => 'limit']
                        ]
                    );

                    PropertyImage::create([
                        'property_id' => $property->id,
                        'cloudinary_public_id' => $uploadedFile->getPublicId(),
                        'url' => $uploadedFile->getSecurePath(),
                        'is_featured' => false,
                        'order' => $index + 1
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('admin.properties.index')
                ->with('success', 'Property created successfully with Cloudinary image storage.');

        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error for debugging
            \Log::error('Property creation failed: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Failed to create property: ' . $e->getMessage())
                ->withInput();
        }
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

        // Eager load relationships with images
        $property->load(['images', 'user', 'reviews.user']);
        
        // Get similar properties
        $similarProperties = Property::where('type', $property->type)
            ->where('id', '!=', $property->id)
            ->active()
            ->with('images')
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
        $property->load('images');
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
        'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        'delete_images' => 'sometimes|array',
        'featured' => 'nullable|boolean',
        'status' => 'required|boolean'
    ]);

    // Update property
    $property->update($validated);

    // Delete selected images
    if ($request->has('delete_images')) {
        foreach ($request->delete_images as $imageId) {
            $image = PropertyImage::find($imageId);
            if ($image) {
                Cloudinary::destroy($image->cloudinary_public_id);
                $image->delete();
            }
        }
    }

    // Update featured image
    if ($request->hasFile('featured_image')) {
        $oldFeatured = $property->images()->where('is_featured', true)->first();
        if ($oldFeatured) {
            Cloudinary::destroy($oldFeatured->cloudinary_public_id);
            $oldFeatured->delete();
        }

        $uploadedFile = Cloudinary::upload($request->file('featured_image')->getRealPath(), [
            'folder' => 'properties/' . $property->id,
            'transformation' => ['width' => 800, 'height' => 600, 'crop' => 'limit']
        ]);

        PropertyImage::create([
            'property_id' => $property->id,
            'cloudinary_public_id' => $uploadedFile->getPublicId(),
            'url' => $uploadedFile->getSecurePath(),
            'is_featured' => true,
            'order' => 0
        ]);
    }

    // Add new gallery images
    if ($request->hasFile('gallery_images')) {
        $currentMaxOrder = $property->images()->max('order') ?? 0;

        foreach ($request->file('gallery_images') as $image) {
            $uploadedFile = Cloudinary::upload($image->getRealPath(), [
                'folder' => 'properties/' . $property->id,
                'transformation' => ['width' => 800, 'height' => 600, 'crop' => 'limit']
            ]);

            PropertyImage::create([
                'property_id' => $property->id,
                'cloudinary_public_id' => $uploadedFile->getPublicId(),
                'url' => $uploadedFile->getSecurePath(),
                'is_featured' => false,
                'order' => ++$currentMaxOrder
            ]);
        }
    }

    return redirect()->route('properties.index')
        ->with('success', 'Property updated successfully with Cloudinary.');
}


    public function destroy(Property $property)
    {
        // Delete all images from Cloudinary
        foreach ($property->images as $image) {
            Cloudinary::destroy($image->cloudinary_public_id);
        }

        // Delete property (images will be deleted via cascade)
        $property->delete();

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property deleted successfully from Cloudinary and database.');
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