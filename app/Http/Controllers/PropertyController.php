<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // Listing page
    public function index()
    {
        // Fetch all properties, paginate 12 per page
        $properties = Property::paginate(12);

        return view('properties.index', compact('properties'));
    }

    // Single property page
    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.show', compact('property'));
    }
}