@props(['property'])

<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
    @if($property->featured_image)
        <img src="{{ asset('storage/' . $property->featured_image) }}" 
             alt="{{ $property->title }}" class="w-full h-48 object-cover">
    @else
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
            <span class="text-gray-400">No Image</span>
        </div>
    @endif
    
    <div class="p-4">
        <div class="flex justify-between items-start mb-2">
            <h3 class="text-lg font-semibold text-gray-900">{{ $property->title }}</h3>
            <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">
                {{ ucfirst($property->type) }}
            </span>
        </div>
        
        <p class="text-gray-600 text-sm mb-3">{{ $property->location }}</p>
        
        <!-- Star Rating -->
        @if($property->totalReviews() > 0)
            <div class="flex items-center mb-3">
                <x-star-rating :rating="$property->averageRating()" size="sm" />
                <span class="ml-2 text-sm text-gray-500">({{ $property->totalReviews() }})</span>
            </div>
        @endif
        
        <div class="flex justify-between items-center mb-3">
            <span class="text-2xl font-bold text-indigo-600">${{ number_format($property->price) }}</span>
            <div class="text-sm text-gray-500">
                {{ $property->bedrooms }} BD / {{ $property->bathrooms }} BA
                @if($property->area)
                    / {{ $property->area }} sq ft
                @endif
            </div>
        </div>
        
        <a href="{{ route('properties.show', $property) }}" 
           class="w-full bg-indigo-600 text-white text-center py-2 rounded-lg hover:bg-indigo-700 transition-colors block">
            View Details
        </a>
    </div>
</div>