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
            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                {{ ucfirst($property->type) }}
            </span>
        </div>
        <div class="flex items-center self-center text-gray-500 dark:text-gray-400">
        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
        <p class="text-gray-600 text-sm mb-3">{{ $property->location }}</p>
    </div>
        
        <!-- Star Rating -->
        @if($property->totalReviews() > 0)
            <div class="flex items-center mb-3">
                <x-star-rating :rating="$property->averageRating()" size="sm" />
                <span class="ml-2 text-sm text-gray-500">({{ $property->totalReviews() }})</span>
            </div>
        @endif
        
        <div class="flex justify-between items-center mb-3">
            <span class="text-2xl font-bold text-green-600">₦{{ number_format($property->price) }}<small>NGN</small></span>
            <div class="text-sm text-gray-500">
                {{ $property->bedrooms }} BD / {{ $property->bathrooms }} BA
                @if($property->area)
                    / {{ $property->area }} sq ft
                @endif
            </div>
        </div>
        <div class="flex flex-row space-x-4">
        @if($property->type == 'sale')
            <a href="{{ route('properties.show', $property) }}" 
           class="w-full bg-green-600 text-white text-center py-2 rounded-lg hover:bg-green-800 transition-colors block"> Buy Property
            </a>
            @else
            <a href="{{ route('properties.show', $property) }}" 
           class="w-full bg-green-600 text-white text-center py-2 rounded-lg hover:bg-green-800 transition-colors block">
           Rent/Shortlet
            </a>
        @endif

        <a href="{{ route('properties.show', $property) }}" 
           class=" w-full bg-gray-600 text-white text-center py-2 rounded-lg hover:bg-gray-800 transition-colors block">
            View Details
        </a>
    </div>
    </div>
</div>