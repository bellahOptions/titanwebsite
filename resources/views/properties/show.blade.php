<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $property->title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Property Details -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Image Gallery -->
                @if(!empty($property->images))
                    <div class="swiper property-gallery">
                        <div class="swiper-wrapper">
                            @foreach($property->images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ Storage::disk('public')->exists($image) ? Storage::url($image) : $image }}" 
                                         alt="{{ $property->title }}" class="w-full h-96 object-cover">
                                </div>
                            @endforeach
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- Navigation arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                @else
                    <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" 
                         alt="{{ $property->title }}" class="w-full h-96 object-cover">
                @endif

                <div class="p-6">
                    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-6">
                        <!-- Property Details -->
                        <div class="lg:w-2/3">
                            <div class="flex items-center justify-between mb-4">
                                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $property->title }}</h1>
                                <div class="flex items-center space-x-2">
                                    @if($property->featured)
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Featured</span>
                                    @endif
                                    <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">{{ $property->type }}</span>
                                </div>
                            </div>

                            <div class="flex items-center text-gray-500 dark:text-gray-400 mb-4">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $property->location }}
                            </div>

                            <div class="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-6">${{ number_format($property->price) }}</div>

                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                                <div class="text-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $property->bedrooms }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Bedrooms</div>
                                </div>
                                <div class="text-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $property->bathrooms }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Bathrooms</div>
                                </div>
                                <div class="text-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $property->area }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Square Feet</div>
                                </div>
                                <div class="text-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ ucfirst($property->type) }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Type</div>
                                </div>
                            </div>

                            <div class="mb-6">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Description</h2>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">{{ $property->description }}</p>
                            </div>
                        </div>

                        <!-- Action Sidebar -->
                        <div class="lg:w-1/3">
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 sticky top-6">
                                @auth
                                    <form action="{{ route('wishlist.toggle', $property) }}" method="POST" class="mb-4">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center justify-center px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-white rounded-md hover:bg-gray-300 dark:hover:bg-gray-500 transition duration-300">
                                            @if(auth()->user()->wishlists()->where('property_id', $property->id)->exists())
                                                <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                                </svg>
                                                Remove from Wishlist
                                            @else
                                                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                                </svg>
                                                Add to Wishlist
                                            @endif
                                        </button>
                                    </form>

                                    <button onclick="document.getElementById('booking-modal').classList.remove('hidden')" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-medium py-3 px-4 rounded-lg transition duration-300 mb-4">
                                        Book Inspection
                                    </button>
                                @else
                                    <p class="text-gray-600 dark:text-gray-300 mb-4">Sign in to book an inspection or add to wishlist</p>
                                    <div class="space-y-2">
                                        <a href="{{ route('login') }}" class="block w-full text-center bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                                            Login
                                        </a>
                                        <a href="{{ route('register') }}" class="block w-full text-center bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-white font-medium py-2 px-4 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 transition duration-300">
                                            Register
                                        </a>
                                    </div>
                                @endauth

                                <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Contact Agent</h3>
                                    <div class="flex items-center mb-3">
                                        <div class="w-12 h-12 bg-gray-300 dark:bg-gray-600 rounded-full flex items-center justify-center">
                                            <span class="text-lg font-medium text-gray-600 dark:text-gray-300">{{ substr($property->user->name, 0, 1) }}</span>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $property->user->name }}</p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Real Estate Agent</p>
                                        </div>
                                    </div>
                                    <a href="mailto:{{ $property->user->email }}" class="block w-full text-center bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-white font-medium py-2 px-4 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 transition duration-300 mb-2">
                                        Email Agent
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Properties -->
            @if($relatedProperties->count() > 0)
                <div class="mt-12">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Related Properties</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($relatedProperties as $relatedProperty)
                            <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                                <img src="{{ $relatedProperty->images[0] ?? 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80' }}" 
                                     alt="{{ $relatedProperty->title }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ Str::limit($relatedProperty->title, 30) }}</h3>
                                    <div class="flex justify-between items-center mb-2">
                                        <div class="text-xl font-bold text-primary-600 dark:text-primary-400">${{ number_format($relatedProperty->price) }}</div>
                                        <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">{{ $relatedProperty->type }}</span>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ Str::limit($relatedProperty->location, 25) }}
                                    </div>
                                    <a href="{{ route('properties.show', $relatedProperty) }}" class="block w-full bg-primary-600 hover:bg-primary-700 text-white text-center font-medium py-2 px-4 rounded-lg transition duration-300">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Booking Modal -->
    @auth
        <div id="booking-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-md bg-white dark:bg-gray-800">
                <div class="mt-3">
                    <div class="flex justify-between items-center pb-3 border-b">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">Book Inspection</h3>
                        <button onclick="document.getElementById('booking-modal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <form action="{{ route('bookings.store') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        
                        <div class="mb-4">
                            <label for="datetime" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Preferred Date & Time</label>
                            <input type="datetime-local" name="datetime" id="datetime" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message (Optional)</label>
                            <textarea name="message" id="message" rows="3" 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" 
                                      placeholder="Any specific requirements or questions..."></textarea>
                        </div>

                        <div class="flex justify-end space-x-3 pt-4">
                            <button type="button" onclick="document.getElementById('booking-modal').classList.add('hidden')" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-md hover:bg-gray-400 dark:hover:bg-gray-500">
                                Cancel
                            </button>
                            <button type="submit" class="px-4 py-2 bg-primary-600 dark:bg-primary-700 text-white rounded-md hover:bg-primary-700 dark:hover:bg-primary-600">
                                Book Inspection
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endauth

    @push('scripts')
    <!-- Initialize Swiper -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.property-gallery', {
                modules: [Navigation, Pagination],
                direction: 'horizontal',
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>
    @endpush
</x-app-layout>