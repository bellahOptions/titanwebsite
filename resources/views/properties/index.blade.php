<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filters Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Filter Properties</h3>
                    <form method="GET" action="{{ route('properties.index') }}">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                                <select id="type" name="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <option value="">All Types</option>
                                    @foreach($propertyTypes as $key => $value)
                                        <option value="{{ $key }}" {{ request('type') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Location</label>
                                <input type="text" name="location" id="location" value="{{ request('location') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" 
                                       placeholder="Enter location">
                            </div>
                            
                            <div>
                                <label for="min_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Min Price</label>
                                <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" 
                                       placeholder="Min price">
                            </div>
                            
                            <div>
                                <label for="max_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Max Price</label>
                                <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" 
                                       placeholder="Max price">
                            </div>
                            
                            <div>
                                <label for="bedrooms" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bedrooms</label>
                                <select id="bedrooms" name="bedrooms" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <option value="">Any</option>
                                    <option value="1" {{ request('bedrooms') == 1 ? 'selected' : '' }}>1+</option>
                                    <option value="2" {{ request('bedrooms') == 2 ? 'selected' : '' }}>2+</option>
                                    <option value="3" {{ request('bedrooms') == 3 ? 'selected' : '' }}>3+</option>
                                    <option value="4" {{ request('bedrooms') == 4 ? 'selected' : '' }}>4+</option>
                                    <option value="5" {{ request('bedrooms') == 5 ? 'selected' : '' }}>5+</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="bathrooms" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bathrooms</label>
                                <select id="bathrooms" name="bathrooms" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <option value="">Any</option>
                                    <option value="1" {{ request('bathrooms') == 1 ? 'selected' : '' }}>1+</option>
                                    <option value="2" {{ request('bathrooms') == 2 ? 'selected' : '' }}>2+</option>
                                    <option value="3" {{ request('bathrooms') == 3 ? 'selected' : '' }}>3+</option>
                                    <option value="4" {{ request('bathrooms') == 4 ? 'selected' : '' }}>4+</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mt-4 flex justify-end space-x-3">
                            <a href="{{ route('properties.index') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-md hover:bg-gray-400 dark:hover:bg-gray-500">
                                Clear Filters
                            </a>
                            <button type="submit" class="px-4 py-2 bg-primary-600 dark:bg-primary-700 text-white rounded-md hover:bg-primary-700 dark:hover:bg-primary-600">
                                Apply Filters
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Properties Grid -->
            @if($properties->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($properties as $property)
                    @include('components.property-card')
                        
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $properties->links() }}
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900 dark:text-white">No properties found</h3>
                        <p class="mt-1 text-gray-500 dark:text-gray-400">Try adjusting your search filters to find what you're looking for.</p>
                        <div class="mt-6">
                            <a href="{{ route('properties.index') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 dark:bg-primary-700 border border-transparent rounded-md font-semibold text-white hover:bg-primary-700 dark:hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                Clear Filters
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>