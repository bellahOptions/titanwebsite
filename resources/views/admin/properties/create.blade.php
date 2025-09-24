<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Property') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($errors->any())
                        <div class="bg-red-400 border border-red-800 text-red-600 rounded-lg mb-4 p-2">
                            <strong>Your submission encountered the following error(s)</strong>
                            <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif

                    @if(session('success'))
                    <div
                        x-data="{show: true}"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 5000)"
                     class="bg-green-400 border border-green-800 text-green-600 rounded-lg mb-4 p-2">
                            {{ session('success')}}
                    </div>
                    <script type="text/javascript">
                        alert('{{ session('success')}}');
                    </script>
                    @endif

                    <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Basic Information -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="title" :value="__('Property Title *')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" 
                                             value="{{ old('title') }}" required />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="type" :value="__('Property Type *')" />
                                <select id="type" name="type" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                    <option value="">Select Type</option>
                                    <option value="sale" {{ old('type') == 'sale' ? 'selected' : '' }}>For Sale</option>
                                    <option value="rent" {{ old('type') == 'rent' ? 'selected' : '' }}>Rentals (Shortlet)</option>
                                    <option value="lease" {{ old('type') == 'lease' ? 'selected' : '' }}>Lease</option>
                                </select>
                                <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Price & Location -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="price" :value="__('Price ($) *')" />
                                <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full" 
                                             value="{{ old('price') }}" required />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="location" :value="__('Location *')" />
                                <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" 
                                             value="{{ old('location') }}" required />
                                <x-input-error :messages="$errors->get('location')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Address & Coordinates -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div class="md:col-span-2">
                                <x-input-label for="address" :value="__('Full Address')" />
                                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" 
                                             value="{{ old('address') }}" placeholder="Full address for map" />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="coordinates" :value="__('Coordinates (optional)')" />
                                <div class="grid grid-cols-2 gap-2">
                                    <x-text-input id="latitude" name="latitude" type="number" step="0.00000001" 
                                                 class="mt-1 block w-full" value="{{ old('latitude') }}" placeholder="Latitude" />
                                    <x-text-input id="longitude" name="longitude" type="number" step="0.00000001" 
                                                 class="mt-1 block w-full" value="{{ old('longitude') }}" placeholder="Longitude" />
                                </div>
                                <x-input-error :messages="$errors->get('latitude')" class="mt-2" />
                                <x-input-error :messages="$errors->get('longitude')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-6">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" rows="4" 
                                     class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Bedrooms, Bathrooms & Area -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div>
                                <x-input-label for="bedrooms" :value="__('Bedrooms')" />
                                <x-text-input id="bedrooms" name="bedrooms" type="number" class="mt-1 block w-full" 
                                             value="{{ old('bedrooms') }}" />
                                <x-input-error :messages="$errors->get('bedrooms')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="bathrooms" :value="__('Bathrooms')" />
                                <x-text-input id="bathrooms" name="bathrooms" type="number" step="0.1" class="mt-1 block w-full" 
                                             value="{{ old('bathrooms') }}" />
                                <x-input-error :messages="$errors->get('bathrooms')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="area" :value="__('Area (sq ft)')" />
                                <x-text-input id="area" name="area" type="number" step="0.01" class="mt-1 block w-full" 
                                             value="{{ old('area') }}" />
                                <x-input-error :messages="$errors->get('area')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Featured Image -->
                        <div class="mb-6">
                            <x-input-label for="featured_image" :value="__('Featured Image *')" />
                            <x-text-input id="featured_image" name="featured_image" type="file" class="mt-1 block w-full" 
                                         accept="image/*" required />
                            <x-input-error :messages="$errors->get('featured_image')" class="mt-2" />
                        </div>

                        <!-- Gallery Images -->
                        <div class="mb-6">
                            <x-input-label for="gallery_images" :value="__('Additional Gallery Images')" />
                            <x-text-input id="gallery_images" name="gallery_images[]" type="file" class="mt-1 block w-full" 
                                         accept="image/*" multiple />
                            <x-input-error :messages="$errors->get('gallery_images')" class="mt-2" />
                            <p class="mt-1 text-sm text-gray-500">Select multiple images for the gallery</p>
                        </div>

                        <!-- Featured & Status -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" name="featured" value="1" 
                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                           {{ old('featured') ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-600">Featured Property</span>
                                </label>
                            </div>

                            <div>
                                <x-input-label for="status" :value="__('Status *')" />
                                <select id="status" name="status" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                    <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Create Property') }}</x-primary-button>
                            <x-secondary-button>
                                <a href="{{ route('properties.index') }}">{{ __('Cancel') }}</a>
                            </x-secondary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>