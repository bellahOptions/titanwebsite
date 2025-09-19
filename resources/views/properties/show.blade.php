<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Property Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">{{ $property->title }}</h3>
                        <div class="flex space-x-2">
                            <x-secondary-button>
                                <a href="{{ route('admin.properties.edit', $property->id) }}" class="flex items-center">
                                    <i class="fas fa-edit mr-2"></i> Edit
                                </a>
                            </x-secondary-button>
                            <x-secondary-button>
                                <a href="{{ route('properties.index') }}" class="flex items-center">
                                    <i class="fas fa-arrow-left mr-2"></i> Back
                                </a>
                            </x-secondary-button>
                        </div>
                    </div>

                    <!-- Featured Image and Map -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                        <!-- Featured Image -->
                        <div>
                            @if($property->featured_image)
                                <img src="{{ asset('storage/' . $property->featured_image) }}" 
                                     alt="Featured Image" class="w-full h-64 object-cover rounded-lg">
                            @else
                                <div class="w-full h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <span class="text-gray-400">No Featured Image</span>
                                </div>
                            @endif
                        </div>

                        <!-- Map Section -->
                        <div class="bg-gray-100 rounded-lg p-4">
                            <h4 class="text-lg font-semibold mb-4">Location</h4>
                            <div class="mb-4">
                                <p class="text-gray-700">{{ $property->location }}</p>
                                @if($property->address)
                                    <p class="text-gray-600 text-sm">{{ $property->address }}</p>
                                @endif
                            </div>
                            <a href="{{ $property->map_url }}" target="_blank" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                View on Google Maps
                            </a>
                            @if($property->latitude && $property->longitude)
                                <p class="mt-2 text-xs text-gray-500">
                                    Coordinates: {{ $property->latitude }}, {{ $property->longitude }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Gallery Images -->
                    @if(count($property->gallery_images) > 0)
                        <div class="mb-8">
                            <h4 class="text-lg font-semibold mb-4">Gallery Images</h4>
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                @foreach($property->gallery_images as $index => $image)
                                    <div class="relative group">
                                        <img src="{{ asset('storage/' . $image) }}" 
                                             alt="Gallery Image" class="w-full h-32 object-cover rounded-lg">
                                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                                            <a href="{{ asset('storage/' . $image) }}" 
                                               target="_blank" class="text-white p-2 mr-2">
                                                <i class="fas fa-expand"></i>
                                            </a>
                                            <form action="{{ route('admin.properties.delete-image', ['property' => $property->id, 'imageIndex' => $index + 1]) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-white p-2" 
                                                        onclick="return confirm('Are you sure you want to delete this image?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Property Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-500">Type</h4>
                            <p class="mt-1 text-gray-900">{{ ucfirst($property->type) }}</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-500">Status</h4>
                            <span class="mt-1 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $property->status ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $property->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-500">Price</h4>
                            <p class="mt-1 text-gray-900">${{ number_format($property->price, 2) }}</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-500">Bed/Bath/Area</h4>
                            <p class="mt-1 text-gray-900">
                                {{ $property->bedrooms ?? 'N/A' }} BD / {{ $property->bathrooms ?? 'N/A' }} BA
                                @if($property->area)
                                    / {{ $property->area }} sq ft
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Description -->
                    @if($property->description)
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold mb-4">Description</h4>
                            <p class="text-gray-700 leading-relaxed">{{ $property->description }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>