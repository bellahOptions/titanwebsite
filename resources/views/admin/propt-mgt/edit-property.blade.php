@extends('admin.layout')
@section('title', 'Edit Property')
@section('content')
<div class="p-5">
    <div class="bg-yellow-100 p-6">
        <h2 class="text-yellow-600 text-center text-bold text-4xl">Edit Property</h2>

        <form action="{{ route('admin.properties.update', $property->id) }}" 
              method="POST" 
              class="my-5 p-5" 
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">Property Name</label>
                <input type="text" name="name" value="{{ old('name', $property->name) }}" 
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Property Type</label>
                <select name="property_type" class="w-full border rounded px-3 py-2">
                    <option value="apartment" {{ $property->property_type == 'apartment' ? 'selected' : '' }}>Apartment</option>
                    <option value="house" {{ $property->property_type == 'house' ? 'selected' : '' }}>House</option>
                    <option value="condo" {{ $property->property_type == 'condo' ? 'selected' : '' }}>Condo</option>
                    <option value="townhouse" {{ $property->property_type == 'townhouse' ? 'selected' : '' }}>Townhouse</option>
                    <option value="villa" {{ $property->property_type == 'villa' ? 'selected' : '' }}>Villa</option>
                    <option value="cottage" {{ $property->property_type == 'cottage' ? 'selected' : '' }}>Cottage</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Features</label>
                <input type="text" name="features" value="{{ old('features', $property->features) }}" 
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Description</label>
                <textarea name="description" class="w-full border rounded px-3 py-2" rows="4">{{ old('description', $property->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Lease Term</label>
                <input type="text" name="lease_term" value="{{ old('lease_term', $property->lease_term) }}" 
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Listing Price</label>
                <input type="number" name="listing_price" value="{{ old('listing_price', $property->listing_price) }}" 
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Sale/Lease Price</label>
                <input type="number" name="sale_lease_price" value="{{ old('sale_lease_price', $property->sale_lease_price) }}" 
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Location</label>
                <input type="text" name="address" value="{{ old('address', $property->address) }}" 
                       class="w-full border rounded px-3 py-2">
            </div>

            <!-- Featured Image -->
            <div class="mb-6">
                <label class="block font-bold">Featured Image</label>
                @if($property->featured_image)
                    <img src="{{ asset('storage/'.$property->featured_image) }}" class="h-24 mb-2 rounded">
                @endif
                <input type="file" name="featured_image" class="w-full border rounded px-3 py-2">
            </div>

            <!-- Additional Images -->
            <div class="mb-6">
                <label class="block font-bold">Additional Images</label>
                <div class="grid grid-cols-4 gap-3 mb-3">
                    @foreach($property->additional_images ?? [] as $img)
                        <img src="{{ asset('storage/'.$img) }}" class="h-20 rounded">
                    @endforeach
                </div>
                <input type="file" name="images[]" multiple class="w-full border rounded px-3 py-2">
                <small>Upload more to append. Existing images stay.</small>
            </div>

            <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded">Update Property</button>
        </form>
    </div>
</div>
@endsection
