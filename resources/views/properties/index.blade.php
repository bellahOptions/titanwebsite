<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-3">Find Your Dream Property</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400">Browse through our curated collection of premium properties</p>
            </div>

            <!-- Filters Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl mb-8 border border-gray-200 dark:border-gray-700">
                <div class="p-6 lg:p-8">
                    <!-- Filter Header -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                            </svg>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Filter Properties</h3>
                        </div>
                        
                        @if(request()->hasAny(['type', 'location', 'min_price', 'max_price', 'bedrooms', 'bathrooms']))
                            <a href="{{ route('properties.index') }}" 
                                class="inline-flex items-center text-sm font-medium text-red-600 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 transition-colors duration-200">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Clear All
                            </a>
                        @endif
                    </div>

                    <form method="GET" action="{{ route('properties.index') }}">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Type Filter -->
                            <div class="space-y-2">
                                <label for="type" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                    </svg>
                                    Property Type
                                </label>
                                <select id="type" name="type" 
                                    class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-sm focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 dark:bg-gray-700 dark:text-white transition-all duration-200">
                                    <option value="">All Types</option>
                                    @foreach($propertyTypes as $key => $value)
                                        <option value="{{ $key }}" {{ request('type') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- Location Filter -->
                            <div class="space-y-2">
                                <label for="location" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                    Location
                                </label>
                                <input type="text" name="location" id="location" value="{{ request('location') }}" 
                                    class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 dark:bg-gray-700 dark:text-white transition-all duration-200" 
                                    placeholder="e.g., Downtown, City Center">
                            </div>
                            
                            <!-- Bedrooms Filter -->
                            <div class="space-y-2">
                                <label for="bedrooms" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                    </svg>
                                    Bedrooms
                                </label>
                                <select id="bedrooms" name="bedrooms" 
                                    class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-sm focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 dark:bg-gray-700 dark:text-white transition-all duration-200">
                                    <option value="">Any</option>
                                    <option value="1" {{ request('bedrooms') == 1 ? 'selected' : '' }}>1+</option>
                                    <option value="2" {{ request('bedrooms') == 2 ? 'selected' : '' }}>2+</option>
                                    <option value="3" {{ request('bedrooms') == 3 ? 'selected' : '' }}>3+</option>
                                    <option value="4" {{ request('bedrooms') == 4 ? 'selected' : '' }}>4+</option>
                                    <option value="5" {{ request('bedrooms') == 5 ? 'selected' : '' }}>5+</option>
                                </select>
                            </div>
                            
                            <!-- Min Price -->
                            <div class="space-y-2">
                                <label for="min_price" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Min Price (₦)
                                </label>
                                <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" 
                                    class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 dark:bg-gray-700 dark:text-white transition-all duration-200" 
                                    placeholder="Min price">
                            </div>
                            
                            <!-- Max Price -->
                            <div class="space-y-2">
                                <label for="max_price" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Max Price (₦)
                                </label>
                                <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" 
                                    class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 dark:bg-gray-700 dark:text-white transition-all duration-200" 
                                    placeholder="Max price">
                            </div>
                            
                            <!-- Bathrooms Filter -->
                            <div class="space-y-2">
                                <label for="bathrooms" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Bathrooms
                                </label>
                                <select id="bathrooms" name="bathrooms" 
                                    class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-sm focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 dark:bg-gray-700 dark:text-white transition-all duration-200">
                                    <option value="">Any</option>
                                    <option value="1" {{ request('bathrooms') == 1 ? 'selected' : '' }}>1+</option>
                                    <option value="2" {{ request('bathrooms') == 2 ? 'selected' : '' }}>2+</option>
                                    <option value="3" {{ request('bathrooms') == 3 ? 'selected' : '' }}>3+</option>
                                    <option value="4" {{ request('bathrooms') == 4 ? 'selected' : '' }}>4+</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="mt-8 flex flex-col sm:flex-row justify-end gap-3">
                            <a href="{{ route('properties.index') }}" 
                                class="px-6 py-3 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl transition-all duration-200 text-center border-2 border-gray-200 dark:border-gray-600">
                                Clear Filters
                            </a>
                            <button type="submit" 
                                class="px-8 py-3 bg-green-600 hover:bg-green-700 dark:bg-green-600 dark:hover:bg-green-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                                <span class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    Apply Filters
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Results Count -->
            @if($properties->count() > 0)
                <div class="mb-6">
                    <p class="text-gray-600 dark:text-gray-400">
                        Found <span class="font-semibold text-green-600 dark:text-green-400">{{ $properties->total() }}</span> 
                        {{ Str::plural('property', $properties->total()) }}
                    </p>
                </div>
            @endif

            <!-- Properties Grid -->
            @if($properties->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($properties as $property)
                        @include('components.property-card')
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $properties->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-200 dark:border-gray-700">
                    <div class="p-12 text-center">
                        <svg class="mx-auto h-20 w-20 text-gray-400 dark:text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">No properties found</h3>
                        <p class="text-gray-500 dark:text-gray-400 mb-6 max-w-md mx-auto">
                            We couldn't find any properties matching your criteria. Try adjusting your filters or clear them to see all available properties.
                        </p>
                        <a href="{{ route('properties.index') }}" 
                            class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            View All Properties
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>