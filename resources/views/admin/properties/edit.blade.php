@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit Property: {{ $property->title }}</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Property Title *</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title', $property->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Property Type *</label>
                                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                        <option value="">Select Type</option>
                                        <option value="sale" {{ old('type', $property->type) == 'sale' ? 'selected' : '' }}>For Sale</option>
                                        <option value="rent" {{ old('type', $property->type) == 'rent' ? 'selected' : '' }}>For Rent</option>
                                        <option value="lease" {{ old('type', $property->type) == 'lease' ? 'selected' : '' }}>For Lease</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price ($) *</label>
                                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" 
                                           id="price" name="price" value="{{ old('price', $property->price) }}" required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location *</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                           id="location" name="location" value="{{ old('location', $property->location) }}" required>
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4">{{ old('description', $property->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="bedrooms" class="form-label">Bedrooms</label>
                                    <input type="number" class="form-control @error('bedrooms') is-invalid @enderror" 
                                           id="bedrooms" name="bedrooms" value="{{ old('bedrooms', $property->bedrooms) }}">
                                    @error('bedrooms')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="bathrooms" class="form-label">Bathrooms</label>
                                    <input type="number" step="0.1" class="form-control @error('bathrooms') is-invalid @enderror" 
                                           id="bathrooms" name="bathrooms" value="{{ old('bathrooms', $property->bathrooms) }}">
                                    @error('bathrooms')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="area" class="form-label">Area (sq ft)</label>
                                    <input type="number" step="0.01" class="form-control @error('area') is-invalid @enderror" 
                                           id="area" name="area" value="{{ old('area', $property->area) }}">
                                    @error('area')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Current Images -->
                        @if($property->images->count() > 0)
                        <div class="mb-4">
                            <label class="form-label">Current Images</label>
                            <div class="row">
                                @foreach($property->images as $image)
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img src="{{ $image->url }}" class="card-img-top" alt="Property Image" style="height: 150px; object-fit: cover;">
                                        <div class="card-body text-center">
                                            @if($image->is_featured)
                                                <span class="badge bg-primary">Featured</span>
                                            @endif
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" name="delete_images[]" value="{{ $image->id }}" id="delete_image_{{ $image->id }}">
                                                <label class="form-check-label text-danger" for="delete_image_{{ $image->id }}">
                                                    Delete
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- New Featured Image -->
                        <div class="mb-3">
                            <label for="featured_image" class="form-label">New Featured Image</label>
                            <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                                   id="featured_image" name="featured_image" accept="image/*">
                            @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Upload a new featured image (will replace current featured image)</div>
                        </div>

                        <!-- New Gallery Images -->
                        <div class="mb-3">
                            <label for="gallery_images" class="form-label">Additional Gallery Images</label>
                            <input type="file" class="form-control @error('gallery_images') is-invalid @enderror" 
                                   id="gallery_images" name="gallery_images[]" accept="image/*" multiple>
                            @error('gallery_images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Select multiple images to add to the gallery</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="featured" value="1" 
                                               id="featured" {{ old('featured', $property->featured) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="featured">
                                            Featured Property
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status *</label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="1" {{ old('status', $property->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $property->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary me-md-2">Update Property</button>
                            <a href="{{ route('properties.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection