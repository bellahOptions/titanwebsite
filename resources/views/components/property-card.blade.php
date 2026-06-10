@props(['property'])

<div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-2xl overflow-hidden transition-all duration-300 transform hover:-translate-y-1 border border-gray-100 dark:border-gray-700">
    <!-- Image Container -->
    <div class="relative overflow-hidden">
        @if($property->image_url)
            <img src="{{ $property->image_url }}" 
                 alt="{{ $property->title }}" 
                 class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
        @else
            <div class="w-full h-56 bg-gradient-to-br from-gray-200 to-gray-300 dark:from-gray-700 dark:to-gray-600 flex items-center justify-center">
                <svg class="w-16 h-16 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </div>
        @endif
        
        <!-- Type Badge -->
        <div class="absolute top-4 left-4">
            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold backdrop-blur-md
                {{ $property->type == 'sale' ? 'bg-green-500/90 text-white' : 'bg-blue-500/90 text-white' }}">
                <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    @if($property->type == 'sale')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    @else
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    @endif
                </svg>
                {{ ucfirst($property->type) }}
            </span>
        </div>

        <!-- Quick View Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
            <a href="{{ route('properties.show', $property) }}" 
               class="transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                <div class="bg-white dark:bg-gray-800 rounded-full p-3 shadow-lg">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
            </a>
        </div>
    </div>
    
    <!-- Content -->
    <div class="p-5">
        <!-- Title -->
        <div class="mb-3">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white line-clamp-2 mb-2 group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors duration-200">
                {{ $property->title }}
            </h3>
            
            <!-- Location -->
            <div class="flex items-center text-gray-600 dark:text-gray-400 text-sm">
                <svg class="w-4 h-4 mr-1.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                </svg>
                <span class="line-clamp-1">{{ $property->location }}</span>
            </div>
        </div>
        
        <!-- Star Rating -->
        @if($property->totalReviews() > 0)
            <div class="flex items-center mb-4">
                <x-star-rating :rating="$property->averageRating()" size="sm" />
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400 font-medium">
                    ({{ $property->totalReviews() }})
                </span>
            </div>
        @endif
        
        <!-- Price & Details -->
        <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
            <div>
                <p class="text-2xl font-bold text-green-600 dark:text-green-400">
                    ₦{{ number_format($property->price) }}
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">NGN</p>
            </div>
            <div class="flex items-center gap-3 text-sm text-gray-600 dark:text-gray-400">
                @if($property->bedrooms)
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        <span class="font-medium">{{ $property->bedrooms }}</span>
                        <span class="ml-0.5 text-xs">BD</span>
                    </div>
                @endif
                @if($property->bathrooms)
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">{{ $property->bathrooms }}</span>
                        <span class="ml-0.5 text-xs">BA</span>
                    </div>
                @endif
                @if($property->area)
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                        </svg>
                        <span class="font-medium">{{ number_format($property->area) }}</span>
                        <span class="ml-0.5 text-xs">ft²</span>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="grid grid-cols-2 gap-3">
            @if($property->type == 'sale')
                <a href="{{ route('properties.show', $property) }}" 
                   class="flex items-center justify-center px-4 py-2.5 bg-green-600 hover:bg-green-700 dark:bg-green-600 dark:hover:bg-green-700 text-white text-sm font-semibold rounded-xl transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Buy Now
                </a>
            @elseif($property->type == 'land')
                <a href="{{ route('properties.show', $property) }}" 
                   class="flex items-center justify-center px-4 py-2.5 bg-yellow-600 hover:bg-yellow-700 dark:bg-yellow-600 dark:hover:bg-yellow-700 text-white text-sm font-semibold rounded-xl transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Buy Land
                </a>
            @else
                <a href="{{ route('properties.show', $property) }}" 
                   class="flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-700 text-white text-sm font-semibold rounded-xl transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Rent/Shortlet
                </a>
            @endif

            <a href="{{ route('properties.show', $property) }}" 
               class="flex items-center justify-center px-4 py-2.5 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 text-sm font-semibold rounded-xl transition-all duration-200 border-2 border-gray-200 dark:border-gray-600">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Details
            </a>
        </div>
    </div>
</div>