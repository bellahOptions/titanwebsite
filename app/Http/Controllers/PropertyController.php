<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PropertyRequest;
use Symfony\Component\Mime\Part\TextPart;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['type', 'location', 'min_price', 'max_price', 'bedrooms', 'bathrooms']);
        $properties = Property::active();

        if (!empty($filters['type'])) $properties->ofType($filters['type']);
        if (!empty($filters['location'])) $properties->location($filters['location']);
        if (!empty($filters['min_price']) || !empty($filters['max_price'])) {
            $min = $filters['min_price'] ?? 0;
            $max = $filters['max_price'] ?? PHP_INT_MAX;
            $properties->priceRange($min, $max);
        }
        if (!empty($filters['bedrooms'])) $properties->bedrooms($filters['bedrooms']);
        if (!empty($filters['bathrooms'])) $properties->bathrooms($filters['bathrooms']);

        $properties = $properties->latest()->paginate(12);
        $propertyTypes = ['sale' => 'For Sale', 'rent' => 'For Rent', 'land' => 'Land'];

        return view('properties.index', compact('properties', 'filters', 'propertyTypes'));
    }
    
    /**
 * Display a listing of properties for the admin dashboard.
 */
public function adminIndex()
{
    // Only allow admins (optional, if you have roles)
    abort_unless(auth()->user()->is_admin, 403);

    $properties = \App\Models\Property::latest()->paginate(10);
    
    return view('admin.propt.index', compact('properties'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $propertyTypes = ['sale' => 'For Sale', 'rent' => 'For Rent', 'land' => 'Land'];
        return view('admin.propt.create', compact('propertyTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(PropertyRequest $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'location' => 'required|string|max:255',
        'address' => 'nullable|string',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'type' => 'required|string',
        'bedrooms' => 'nullable|integer',
        'bathrooms' => 'nullable|integer',
        'area' => 'nullable|integer',
        'image_url' => 'required|string',
        'public_id' => 'required|string',
        'google_drive_link' => 'nullable|url',
        'featured' => 'nullable|boolean',
        'status' => 'nullable|boolean',
    ]);

    try {
        // ✅ No Cloudinary upload here — use existing AJAX results
        $property = Property::create([
            ...$validated,
            'user_id' => auth()->id(),
            'featured' => $request->boolean('featured'),
            'status' => $request->boolean('status', true),
        ]);

        // ✅ Send notification email to admin
        $admin = auth()->user();
        if ($admin && $admin->email) {
            $subject = '🏡 New Property Added Successfully!';
            $htmlContent = '
                <div style="font-family: Arial, sans-serif; max-width: 600px; margin:auto; border:1px solid #eee; border-radius:10px; overflow:hidden;">
                    <div style="background:#2F855A; color:white; padding:15px 20px;">
                        <h2 style="margin:0;">New Property Added!</h2>
                    </div>
                    <div style="padding:20px;">
                        <p>Hi <strong>' . e($admin->name) . '</strong>,</p>
                        <p>Your new property has been added successfully.</p>
                        <table style="width:100%; margin-top:10px; border-collapse:collapse;">
                            <tr><td><strong>Title:</strong></td><td>' . e($property->title) . '</td></tr>
                            <tr><td><strong>Price:</strong></td><td>₦' . number_format($property->price) . '</td></tr>
                            <tr><td><strong>Location:</strong></td><td>' . e($property->location) . '</td></tr>
                            <tr><td><strong>Type:</strong></td><td>' . ucfirst($property->type) . '</td></tr>
                        </table>
                        <p style="margin-top:15px;">
                            <a href="' . url('/properties/' . $property->id) . '" 
                               style="display:inline-block; background:#2F855A; color:white; text-decoration:none; padding:10px 15px; border-radius:5px;">
                               View Property
                            </a>
                        </p>
                    </div>
                    <div style="background:#f7f7f7; text-align:center; padding:10px; font-size:12px; color:#666;">
                        Titan Real Estate © ' . date('Y') . '
                    </div>
                </div>
            ';

            Mail::html($htmlContent, function ($message) use ($admin, $subject) {
    $message->to($admin->email)
            ->subject($subject);
});
        }

        return redirect()
            ->route('properties.index')
            ->with('success', 'Property created successfully!');
    } catch (\Exception $e) {
        \Log::error('Property creation failed', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return back()->withErrors([
            'error' => 'Failed to save property. Please try again.',
        ]);
    }
}

/**
 * Show the form for editing the specified property.
 */
public function edit(Property $property)
{
    try {
        // ✅ Optional: Only allow admin or the property owner
        if (!auth()->user()->isAdmin() && $property->user_id !== auth()->id()) {
            abort(403, 'You are not authorized to edit this property.');
        }

        // ✅ Property types for dropdowns
        $propertyTypes = ['sale' => 'For Sale', 'rent' => 'For Rent', 'land' => 'Land'];

        return view('admin.propt.edit', compact('property', 'propertyTypes'));
    } catch (\Exception $e) {
        \Log::error('Failed to load property edit page', [
            'property_id' => $property->id ?? null,
            'error' => $e->getMessage(),
        ]);

        return redirect()
            ->route('admin.properties.edit')
            ->withErrors(['error' => 'Unable to load the edit form.']);
    }
}


    public function update(PropertyRequest $request, Property $property)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'location' => 'required|string|max:255',
        'address' => 'nullable|string',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'type' => 'required|string',
        'bedrooms' => 'nullable|integer',
        'bathrooms' => 'nullable|integer',
        'area' => 'nullable|integer',
        'image_url' => 'nullable|string', // optional — only needed if new image uploaded
        'public_id' => 'nullable|string',
        'google_drive_link' => 'nullable|url',
        'featured' => 'nullable|boolean',
        'status' => 'nullable|boolean',
    ]); 

    try {
        // ✅ Optional: Only allow owner or admin
        if (!auth()->user()->isAdmin() && $property->user_id !== auth()->id()) {
            return back()->withErrors(['error' => 'You are not authorized to update this property.']);
        }

        // ✅ If a new image was uploaded via AJAX
        if (!empty($validated['image_url']) && !empty($validated['public_id'])) {
            // Delete old Cloudinary image (if exists)
            if ($property->public_id) {
                \CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary::destroy($property->public_id);
            }

            // Replace with new image details
            $property->image_url = $validated['image_url'];
            $property->public_id = $validated['public_id'];
        }

        // ✅ Update remaining fields
        $property->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? $property->description,
            'price' => $validated['price'],
            'location' => $validated['location'],
            'address' => $validated['address'] ?? $property->address,
            'latitude' => $validated['latitude'] ?? $property->latitude,
            'longitude' => $validated['longitude'] ?? $property->longitude,
            'type' => $validated['type'],
            'bedrooms' => $validated['bedrooms'] ?? $property->bedrooms,
            'bathrooms' => $validated['bathrooms'] ?? $property->bathrooms,
            'area' => $validated['area'] ?? $property->area,
            'google_drive_link' => $validated['google_drive_link'] ?? $property->google_drive_link,
            'featured' => $request->boolean('featured'),
            'status' => $request->boolean('status', true),
        ]);

        return redirect()
            ->route('properties.index')
            ->with('success', 'Property updated successfully!');
    } catch (\Exception $e) {
        \Log::error('Property Update Failed', [
            'property_id' => $property->id,
            'error' => $e->getMessage(),
        ]);

        return back()->withErrors([
            'error' => 'Failed to update property. Please try again.',
        ]);
    }
}




    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        if (!$property->status && !auth()->check()) {
            abort(404);
        }

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

        $property->load(['user', 'reviews.user']);
        $similarProperties = Property::where('type', $property->type)
            ->where('id', '!=', $property->id)
            ->active()
            ->limit(4)
            ->get();

        return view('properties.show', compact('property', 'similarProperties'));
    }
    /**
 * Remove the specified resource from storage.
 */
public function destroy(Property $property)
{
    try {
        // ✅ Check authorization
        if (!auth()->user()->isAdmin() && $property->user_id !== auth()->id()) {
            return redirect()
                ->route('admin.properties.mgt')
                ->withErrors(['error' => 'You are not authorized to delete this property.']);
        }

        // ✅ Delete image from Cloudinary (only if a public_id exists)
        if (!empty($property->public_id)) {
            try {
                \CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary::destroy($property->public_id);
            } catch (\Exception $cloudinaryError) {
                \Log::warning('Cloudinary delete failed', [
                    'property_id' => $property->id,
                    'error' => $cloudinaryError->getMessage(),
                ]);
            }
        }

        // ✅ Delete the property record
        $property->delete();

        return redirect()
            ->route('admin.properties.mgt')
            ->with('success', 'Property deleted successfully.');
    } catch (\Exception $e) {
        \Log::error('Property Deletion Failed', [
            'property_id' => $property->id ?? 'unknown',
            'error' => $e->getMessage(),
        ]);

        return redirect()
            ->route('admin.properties.mgt')
            ->withErrors(['error' => 'Failed to delete property. Please try again.']);
    }
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
    
    public function toggleStatus(Property $property)
{
    try {
        $property->status = !$property->status; // Toggle true/false
        $property->save();

        $newStatus = $property->status ? 'active' : 'inactive';

        return redirect()
            ->back()
            ->with('success', "Property status changed to {$newStatus} successfully.");
    } catch (\Exception $e) {
        \Log::error('Property Status Toggle Failed', [
            'property_id' => $property->id,
            'error' => $e->getMessage(),
        ]);

        return back()->withErrors([
            'error' => 'Failed to update property status. Please try again.',
        ]);
    }
}

}
