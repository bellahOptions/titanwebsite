<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Property Details') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Actions -->
            <div class="flex justify-between items-center mb-6">
                <a href="{{ route('properties.index') }}" 
                    class="inline-flex items-center text-green-600 hover:text-green-700 dark:text-green-400 dark:hover:text-green-300 font-semibold transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Properties
                </a>
                
                @if(auth()->check() && auth()->user()->is_admin)
                    <div class="flex gap-2">
                        <a href="{{ route('admin.properties.edit', $property->id) }}" 
                            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.properties.destroy', $property) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200"
                                onclick="return confirm('Are you sure you want to delete this property?')">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Property Title & Price -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-200 dark:border-gray-700">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300 mb-3">
                                    {{ ucfirst($property->type) }}
                                </span>
                                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ $property->title }}</h1>
                                <div class="flex items-center text-gray-600 dark:text-gray-400">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-lg">{{ $property->location }}</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-3xl font-bold text-green-600 dark:text-green-400">₦{{ number_format($property->price) }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    {{ $property->type === 'rent' ? 'per month' : 'total' }}
                                </p>
                            </div>
                        </div>

                        <!-- Property Stats -->
                        <div class="grid grid-cols-4 gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="text-center">
                                <svg class="w-8 h-8 mx-auto text-green-600 dark:text-green-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $property->bedrooms ?? 'N/A' }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Bedrooms</p>
                            </div>
                            <div class="text-center">
                                <svg class="w-8 h-8 mx-auto text-green-600 dark:text-green-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $property->bathrooms ?? 'N/A' }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Bathrooms</p>
                            </div>
                            <div class="text-center">
                                <svg class="w-8 h-8 mx-auto text-green-600 dark:text-green-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                                </svg>
                                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $property->area ? number_format($property->area) : 'N/A' }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Sq Ft</p>
                            </div>
                            <div class="text-center">
                                <svg class="w-8 h-8 mx-auto text-green-600 dark:text-green-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                <p class="text-lg font-bold text-gray-900 dark:text-white capitalize">{{ $property->type }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Type</p>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                        @if($property->image_url)
                            <img src="{{ $property->image_url }}" 
                                 alt="{{ $property->title }}" 
                                 class="w-full h-96 object-cover">
                        @else
                            <div class="w-full h-96 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 flex flex-col items-center justify-center">
                                <svg class="w-20 h-20 text-gray-400 dark:text-gray-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-gray-500 dark:text-gray-400 text-lg">No Image Available</span>
                            </div>
                        @endif
                        
                        @if($property->google_drive_link)
                            <div class="p-4 bg-blue-50 dark:bg-blue-900/20 border-t border-blue-200 dark:border-blue-800">
                                <a href="{{ $property->google_drive_link }}" target="_blank"
                                    class="inline-flex items-center text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 font-medium transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    View Additional Images
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Description -->
                    @if($property->description)
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-200 dark:border-gray-700">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Description
                            </h2>
                            <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300 leading-relaxed">
                                {!! $property->description !!}

                            </div>
                        </div>
                    @endif

                    <!-- Reviews Section -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-200 dark:border-gray-700">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                            Reviews
                        </h2>
                        
                        <!-- Overall Rating -->
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-6 mb-6">
                            <div class="flex flex-col md:flex-row items-center justify-between">
                                <div class="mb-4 md:mb-0">
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Overall Rating</h4>
                                    <x-star-rating :rating="$property->averageRating()" size="lg" />
                                    <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $property->totalReviews() }} {{ Str::plural('review', $property->totalReviews()) }}</p>
                                </div>
                                
                                <!-- Add Review Button -->
                                @auth
                                    @if(!auth()->user()->hasReviewed($property))
                                        <button onclick="document.getElementById('review-form').classList.toggle('hidden')"
                                                class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-md hover:shadow-lg">
                                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            Write a Review
                                        </button>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" 
                                        class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-md hover:shadow-lg">
                                        Login to Review
                                    </a>
                                @endauth
                            </div>
                        </div>

                        <!-- Review Form -->
                        @auth
                            @if(!auth()->user()->reviews->contains('property_id', $property->id))
                                <div id="review-form" class="hidden bg-gray-50 dark:bg-gray-700/50 rounded-xl p-6 mb-6">
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Write Your Review</h4>
                                    <form action="{{ route('reviews.store', $property) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Rating</label>
                                            <div class="flex space-x-2">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <button type="button" onclick="setRating({{ $i }})" class="text-3xl transition-transform hover:scale-110">
                                                        <span class="rating-star text-gray-300" data-rating="{{ $i }}">☆</span>
                                                    </button>
                                                @endfor
                                            </div>
                                            <input type="hidden" name="rating" id="rating" value="0" required>
                                            @error('rating')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="comment" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Your Review</label>
                                            <textarea name="comment" id="comment" rows="4" 
                                                     class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                                     placeholder="Share your experience with this property..." required></textarea>
                                            @error('comment')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="flex gap-3">
                                            <button type="submit" 
                                                class="px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors duration-200">
                                                Submit Review
                                            </button>
                                            <button type="button" onclick="document.getElementById('review-form').classList.add('hidden')"
                                                    class="px-6 py-2.5 bg-gray-300 hover:bg-gray-400 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-700 dark:text-gray-300 font-semibold rounded-lg transition-colors duration-200">
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <script>
                                    function setRating(rating) {
                                        document.getElementById('rating').value = rating;
                                        const stars = document.querySelectorAll('.rating-star');
                                        stars.forEach((star, index) => {
                                            star.textContent = index < rating ? '★' : '☆';
                                            star.className = index < rating ? 'rating-star text-yellow-400' : 'rating-star text-gray-300';
                                        });
                                    }
                                </script>
                            @endif
                        @endauth

                        <!-- Reviews List -->
                        <div class="space-y-4">
                            @forelse($property->approvedReviews()->recent()->get() as $review)
                                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-5">
                                    <div class="flex items-start justify-between mb-3">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center mr-3">
                                                <span class="text-green-700 dark:text-green-300 font-semibold">{{ substr($review->user->name, 0, 1) }}</span>
                                            </div>
                                            <div>
                                                <h5 class="font-semibold text-gray-900 dark:text-white">{{ $review->user->name }}</h5>
                                                <x-star-rating :rating="$review->rating" size="sm" />
                                            </div>
                                        </div>
                                        <p class="text-gray-500 dark:text-gray-400 text-sm">{{ $review->created_at->format('M d, Y') }}</p>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $review->comment }}</p>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                    </svg>
                                    <p class="text-gray-500 dark:text-gray-400">No reviews yet. Be the first to review this property!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Map & Location -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            Location
                        </h3>
                        <div class="mb-4">
                            <p class="text-gray-900 dark:text-white font-semibold mb-1">{{ $property->location }}</p>
                            @if($property->address)
                                <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $property->address }}</p>
                            @endif
                        </div>
                        <a href="{{ $property->map_url }}" target="_blank" 
                           class="flex items-center justify-center w-full px-4 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-md hover:shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                            </svg>
                            View on Google Maps
                        </a>
                        @if($property->latitude && $property->longitude)
                            <p class="mt-3 text-xs text-gray-500 dark:text-gray-400 text-center">
                                Coordinates: {{ $property->latitude }}, {{ $property->longitude }}
                            </p>
                        @endif
                    </div>

                    <!-- Booking Section -->
                    @auth
                        @if($property->availableForInspection())
                            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-200 dark:border-gray-700">
                                @php
                                    $availableDaysCount = \App\Models\InspectionDay::where('is_available', true)->count();
                                @endphp
                                
                                @if($availableDaysCount > 0)
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Book an Inspection</h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">Schedule a visit to see this property in person</p>
                                    <a href="{{ route('bookings.create', $property) }}" 
                                       class="flex items-center justify-center w-full px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-md hover:shadow-lg">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        Book Inspection
                                    </a>
                                @else
                                    <div class="text-center py-4">
                                        <svg class="w-12 h-12 mx-auto text-gray-400 dark:text-gray-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <p class="text-gray-500 dark:text-gray-400 text-sm">Inspections currently unavailable</p>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @else
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-200 dark:border-gray-700">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Book an Inspection</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">Login to schedule a property viewing</p>
                            <a href="{{ route('login') }}" 
                               class="flex items-center justify-center w-full px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                </svg>
                                Login to Book
                            </a>
                        </div>
                    @endauth

                    <!-- Purchase/Rent Options -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Interested in this property?</h3>
                        
                        <div class="space-y-4">
                            @if($property->canBePurchased())
                                <div class="p-4 border-2 border-green-200 dark:border-green-800 rounded-xl hover:border-green-400 dark:hover:border-green-600 transition-all duration-200">
                                    <div class="flex items-center justify-between mb-3">
                                        <h4 class="font-bold text-lg text-gray-900 dark:text-white">Purchase</h4>
                                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-2">Buy this property for</p>
                                    <p class="text-2xl font-bold text-green-600 dark:text-green-400 mb-4">₦{{ number_format($property->price) }}</p>
                                    <button onclick="handlePurchaseAction()" 
                                            class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl font-semibold transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                        Buy Now
                                    </button>
                                </div>
                            @endif
                            
                            @if($property->canBeRented())
                                <div class="p-4 border-2 border-blue-200 dark:border-blue-800 rounded-xl hover:border-blue-400 dark:hover:border-blue-600 transition-all duration-200">
                                    <div class="flex items-center justify-between mb-3">
                                        <h4 class="font-bold text-lg text-gray-900 dark:text-white">Rent</h4>
                                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-2">Rent this property for</p>
                                    <p class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-4">₦{{ number_format($property->price) }}/month</p>
                                    <button onclick="handleRentAction()" 
                                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        Rent Now
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Contact Card -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-2xl shadow-xl p-6 border border-green-200 dark:border-green-800">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Need Help?</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">Our team is here to assist you with any questions about this property.</p>
                        <div class="space-y-2">
                            <a href="mailto:titanrealtyltd@gmail.com"
                               class="flex items-center text-green-700 dark:text-green-300 hover:text-green-800 dark:hover:text-green-200 transition-colors duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                Email Us
                            </a>
                            <a href="tel:+2349115008562"
                               class="flex items-center text-green-700 dark:text-green-300 hover:text-green-800 dark:hover:text-green-200 transition-colors duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                Call Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Auth Modal (if not logged in) -->
    @guest
        <x-auth-modal 
            action="purchase or rent" 
            :redirectUrl="url()->current()" 
        />
    @endguest

    <!-- JavaScript for Purchase/Rent Actions -->
    <script>
        function handlePurchaseAction() {
            @auth
                window.location.href = "{{ route('purchases.checkout', $property) }}";
            @else
                showAuthModal('purchase', "{{ route('purchases.checkout', $property) }}");
            @endauth
        }
        
        function handleRentAction() {
            @auth
                window.location.href = "{{ route('rentals.form', $property) }}";
            @else
                showAuthModal('rent', "{{ route('rentals.form', $property) }}");
            @endauth
        }
    </script>
</x-app-layout>