<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Property') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-200 dark:border-gray-700">
                <div class="p-8">
                    <!-- Header -->
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Edit Property</h2>
                        <p class="text-gray-600 dark:text-gray-400">Update property details</p>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div x-data="{show: true}" x-show="show" x-transition
                            x-init="setTimeout(() => show = false, 5000)"
                            class="mb-6 p-4 rounded-xl bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 dark:border-green-400">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 dark:text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <p class="text-green-700 dark:text-green-300 font-medium">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" id="editPropertyForm" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <!-- Basic Information Section -->
                        <div class="space-y-6">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-6 h-6 mr-2 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Basic Information
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Title -->
                                <div class="space-y-2">
                                    <label for="title" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Property Title <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        name="title" 
                                        id="title" 
                                        required 
                                        maxlength="255"
                                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none" 
                                        value="{{ old('title', $property->title) }}">
                                </div>

                                <!-- Type -->
                                <div class="space-y-2">
                                    <label for="type" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Property Type <span class="text-red-500">*</span>
                                    </label>
                                    <select 
                                        name="type" 
                                        id="type" 
                                        required
                                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none">
                                        <option value="sale" {{ $property->type == 'sale' ? 'selected' : '' }}>For Sale</option>
                                        <option value="rent" {{ $property->type == 'rent' ? 'selected' : '' }}>Rentals (Shortlet)</option>
                                        <option value="lease" {{ $property->type == 'lease' ? 'selected' : '' }}>Lease</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Price & Location -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Price -->
                                <div class="space-y-2">
                                    <label for="price" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Price (₦) <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">₦</span>
                                        <input 
                                            type="number" 
                                            name="price" 
                                            id="price" 
                                            step="0.01" 
                                            min="0"
                                            required
                                            class="w-full pl-8 pr-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none" 
                                            value="{{ old('price', $property->price) }}">
                                    </div>
                                </div>

                                <!-- Location -->
                                <div class="space-y-2">
                                    <label for="location" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Location <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        name="location" 
                                        id="location" 
                                        required 
                                        maxlength="255"
                                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none" 
                                        value="{{ old('location', $property->location) }}">
                                </div>
                            </div>

                            <!-- Address & Coordinates -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <!-- Address -->
                                <div class="md:col-span-2 space-y-2">
                                    <label for="address" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Full Address
                                    </label>
                                    <input 
                                        type="text" 
                                        name="address" 
                                        id="address" 
                                        maxlength="500"
                                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none" 
                                        value="{{ old('address', $property->address) }}">
                                </div>

                                <!-- Coordinates -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Coordinates
                                    </label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <input 
                                            type="number" 
                                            name="latitude" 
                                            id="latitude" 
                                            step="0.00000001"
                                            class="w-full px-3 py-2 rounded-lg border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 text-sm focus:border-green-500 dark:focus:border-green-400 focus:ring-2 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none" 
                                            placeholder="Latitude"
                                            value="{{ old('latitude', $property->latitude) }}">
                                        <input 
                                            type="number" 
                                            name="longitude" 
                                            id="longitude" 
                                            step="0.00000001"
                                            class="w-full px-3 py-2 rounded-lg border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 text-sm focus:border-green-500 dark:focus:border-green-400 focus:ring-2 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none" 
                                            placeholder="Longitude"
                                            value="{{ old('longitude', $property->longitude) }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Property Details Section -->
                        <div class="space-y-6 pt-8 border-t border-gray-200 dark:border-gray-700">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-6 h-6 mr-2 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                Property Details
                            </h3>

                            <!-- Description with Quill Editor -->
                            <div class="space-y-2">
                                <label for="description" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Description
                                </label>
                                <div class="rounded-xl overflow-hidden border-2 border-gray-200 dark:border-gray-600 focus-within:border-green-500 dark:focus-within:border-green-400 focus-within:ring-4 focus-within:ring-green-100 dark:focus-within:ring-green-900/30 transition-all duration-200">
                                    <div id="quill-editor" class="min-h-[300px] bg-white dark:bg-gray-700"></div>
                                </div>
                                <input type="hidden" name="description" id="description" value="{{ old('description', $property->description) }}">
                            </div>

                            <!-- Bedrooms, Bathrooms & Area -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <!-- Bedrooms -->
                                <div class="space-y-2">
                                    <label for="bedrooms" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Bedrooms
                                    </label>
                                    <input 
                                        type="number" 
                                        name="bedrooms" 
                                        id="bedrooms" 
                                        min="0"
                                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none" 
                                        value="{{ old('bedrooms', $property->bedrooms) }}">
                                </div>

                                <!-- Bathrooms -->
                                <div class="space-y-2">
                                    <label for="bathrooms" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Bathrooms
                                    </label>
                                    <input 
                                        type="number" 
                                        name="bathrooms" 
                                        id="bathrooms" 
                                        step="0.1" 
                                        min="0"
                                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none" 
                                        value="{{ old('bathrooms', $property->bathrooms) }}">
                                </div>

                                <!-- Area -->
                                <div class="space-y-2">
                                    <label for="area" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Area (sq ft)
                                    </label>
                                    <input 
                                        type="number" 
                                        name="area" 
                                        id="area" 
                                        step="0.01" 
                                        min="0"
                                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none" 
                                        value="{{ old('area', $property->area) }}">
                                </div>
                            </div>
                        </div>

                        <!-- Images Section -->
                        <div class="space-y-6 pt-8 border-t border-gray-200 dark:border-gray-700">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-6 h-6 mr-2 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Property Image
                            </h3>

                            <!-- Image Upload -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Update Image
                                </label>
                                <x-image-uploader
                                    upload-route="{{ route('admin.properties.upload-image') }}"
                                    url-field="image_url"
                                    current-url="{{ $property->image_url }}"
                                    current-pid="{{ $property->public_id }}"
                                />
                            </div>

                            <!-- Google Drive Link -->
                            <div class="space-y-2">
                                <label for="google_drive_link" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Google Drive Link
                                </label>
                                <input 
                                    type="url" 
                                    name="google_drive_link" 
                                    id="google_drive_link"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none" 
                                    value="{{ old('google_drive_link', $property->google_drive_link) }}">
                            </div>
                        </div>

                        <!-- Settings Section -->
                        <div class="space-y-6 p-6 bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Property Settings</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Featured -->
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input 
                                            type="checkbox" 
                                            name="featured" 
                                            id="featured" 
                                            value="1"
                                            {{ $property->featured ? 'checked' : '' }}
                                            class="w-5 h-5 text-green-600 bg-white dark:bg-gray-700 border-2 border-gray-300 dark:border-gray-600 rounded focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200">
                                    </div>
                                    <div class="ml-3">
                                        <label for="featured" class="font-medium text-gray-700 dark:text-gray-300 cursor-pointer">
                                            Featured Property
                                        </label>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Highlight this property on the homepage</p>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="space-y-2">
                                    <label for="status" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Status <span class="text-red-500">*</span>
                                    </label>
                                    <select 
                                        name="status" 
                                        id="status" 
                                        required
                                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none">
                                        <option value="1" {{ $property->status ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ !$property->status ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('admin.properties.mgt') }}"  
                                class="px-6 py-3 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl transition-all duration-200 text-center">
                                Cancel
                            </a>
                            <button 
                                type="submit" 
                                class="px-8 py-3 bg-green-600 hover:bg-green-700 dark:bg-green-600 dark:hover:bg-green-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30">
                                <span class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Update Property
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Quill CSS -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    
    <!-- Quill JS -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Quill Editor
            const quill = new Quill('#quill-editor', {
                theme: 'snow',
                placeholder: 'Describe the property features, amenities, and highlights...',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'color': [] }, { 'background': [] }],
                        ['link'],
                        ['clean']
                    ]
                }
            });

            // Set initial content
            const existingDescription = document.getElementById('description').value;
            if (existingDescription) {
                quill.root.innerHTML = existingDescription;
            }

            // Get the hidden input
            const descriptionField = document.getElementById('description');

            // Update hidden input whenever Quill content changes
            quill.on('text-change', () => {
                descriptionField.value = quill.root.innerHTML;
            });

            // Form submission handler
            const form = document.getElementById('editPropertyForm');
            form.addEventListener('submit', (e) => {
                descriptionField.value = quill.root.innerHTML;
            });

        });
    </script>
</x-app-layout>