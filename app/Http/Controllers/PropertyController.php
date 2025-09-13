<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function properties()
    {
        $properties =  Property::all();
        return view('admin.propt-mgt.properties', compact('properties'));
    }
    public function propertiesUserView()
    {
         // Fetch paginated properties
    $properties = Property::orderBy('created_at', 'desc')->paginate(10);

    return view('properties.index', compact('properties'));
        return view('properties.index', compact('properties'));
    }

    public function createProperty()
    {
        return view('admin.propt-mgt.create-property');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeProperty(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'features' => 'nullable|string',
        'property_type' => 'required|string',
        'listing_price' => 'required|numeric',
        'sale_lease_price' => 'nullable|numeric',
        'lease_term' => 'nullable|string',
        'address' => 'required|string',
        'featured_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Handle featured image
    if ($request->hasFile('featured_image')) {
        $data['featured_image'] = $request->file('featured_image')
            ->store('properties/featured', 'public');
    }

    // Handle multiple additional images
    $imagePaths = [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imagePaths[] = $image->store('properties/additional', 'public');
        }
    }
    $data['additional_images'] = $imagePaths;

    // Save to DB
    $property = Property::create($data);

    if ($property) {
        return redirect()->back()->with('success', 'Property created successfully!');
    }

    return redirect()->back()->with('failed', 'Property failed to create!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProperty(string $id)
    {
        $property = Property::findOrFail($id);
    return view('admin.propt-mgt.edit-property', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $property = Property::findOrFail($id);

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'features' => 'nullable|string',
        'property_type' => 'required|string',
        'listing_price' => 'required|numeric',
        'sale_lease_price' => 'nullable|numeric',
        'lease_term' => 'nullable|string',
        'address' => 'required|string',
        'featured_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Handle featured image replacement
    if ($request->hasFile('featured_image')) {
        $data['featured_image'] = $request->file('featured_image')
            ->store('properties/featured', 'public');
    } else {
        $data['featured_image'] = $property->featured_image;
    }

    // Handle additional images (append to existing)
    $imagePaths = $property->additional_images ?? [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imagePaths[] = $image->store('properties/additional', 'public');
        }
    }
    $data['additional_images'] = $imagePaths;

    $property->update($data);

    return redirect()->route('admin.properties.index')
        ->with('success', 'Property updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
{
       // Delete featured image if it exists
    if ($property->featured_image && file_exists(public_path('storage/' . $property->featured_image))) {
        unlink(public_path('storage/' . $property->featured_image));
    }

    // Delete additional images (no need for json_decode)
    if (is_array($property->additional_images)) {
        foreach ($property->additional_images as $image) {
            if ($image && file_exists(public_path('storage/' . $image))) {
                unlink(public_path('storage/' . $image));
            }
        }
    } 
    return redirect()->route('admin.properties.index')
                     ->with('success', 'Property deleted successfully.');
}

}
