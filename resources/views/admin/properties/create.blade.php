<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Property') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-200 dark:border-gray-700">
                <div class="p-8">
                    <!-- Header -->
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Add New Property</h2>
                        <p class="text-gray-600 dark:text-gray-400">Fill in the property details below</p>
                    </div>

                    <!-- Error Messages -->
                    @if($errors->any())
                        <div class="mb-6 p-4 rounded-xl bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 dark:border-red-400">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-red-500 dark:text-red-400 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                <div class="flex-1">
                                    <p class="text-red-700 dark:text-red-300 font-medium mb-2">Your submission encountered the following error(s):</p>
                                    <ul class="list-disc list-inside space-y-1">
                                        @foreach($errors->all() as $error)
                                            <li class="text-red-600 dark:text-red-400 text-sm">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

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

                    <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data" id="propertyForm" class="space-y-8">
                        @csrf

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
                                        placeholder="e.g., Modern 3BR Apartment in Downtown"
                                        value="{{ old('title') }}">
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
                                        <option value="">Select Type</option>
                                        <option value="sale" {{ old('type') == 'sale' ? 'selected' : '' }}>For Sale</option>
                                        <option value="rent" {{ old('type') == 'rent' ? 'selected' : '' }}>Rentals (Shortlet)</option>
                                        <option value="lease" {{ old('type') == 'lease' ? 'selected' : '' }}>Lease</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Price & Location -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Price -->
                                <div class="space-y-2">
                                    <label for="price" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Price ($) <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">$</span>
                                        <input 
                                            type="number" 
                                            name="price" 
                                            id="price" 
                                            step="0.01" 
                                            min="0"
                                            required
                                            class="w-full pl-8 pr-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none" 
                                            placeholder="250,000"
                                            value="{{ old('price') }}">
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
                                        placeholder="e.g., Downtown, City Center"
                                        value="{{ old('location') }}">
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
                                        placeholder="123 Main Street, City, State ZIP"
                                        value="{{ old('address') }}">
                                    <p class="text-xs text-gray-500 dark:text-gray-400">For map display</p>
                                </div>

                                <!-- Coordinates -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Coordinates (optional)
                                    </label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <input 
                                            type="number" 
                                            name="latitude" 
                                            id="latitude" 
                                            step="0.00000001"
                                            class="w-full px-3 py-2 rounded-lg border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 text-sm focus:border-green-500 dark:focus:border-green-400 focus:ring-2 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none" 
                                            placeholder="Latitude"
                                            value="{{ old('latitude') }}">
                                        <input 
                                            type="number" 
                                            name="longitude" 
                                            id="longitude" 
                                            step="0.00000001"
                                            class="w-full px-3 py-2 rounded-lg border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 text-sm focus:border-green-500 dark:focus:border-green-400 focus:ring-2 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none" 
                                            placeholder="Longitude"
                                            value="{{ old('longitude') }}">
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

                            <!-- Description -->
                            <div class="space-y-2">
                                <label for="description" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Description
                                </label>
                                <div class="rounded-xl overflow-hidden border-2 border-gray-200 dark:border-gray-600 focus-within:border-green-500 dark:focus-within:border-green-400 focus-within:ring-4 focus-within:ring-green-100 dark:focus-within:ring-green-900/30 transition-all duration-200">
                                    <textarea 
                                        name="description" 
                                        id="editor" 
                                        rows="12"
                                        class="w-full">{{ old('description') }}</textarea>
                                </div>
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
                                        placeholder="3"
                                        value="{{ old('bedrooms') }}">
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
                                        placeholder="2.5"
                                        value="{{ old('bathrooms') }}">
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
                                        placeholder="1500"
                                        value="{{ old('area') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Images Section -->
                        <div class="space-y-6 pt-8 border-t border-gray-200 dark:border-gray-700">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-6 h-6 mr-2 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Property Images
                            </h3>

                            <!-- Featured Image -->
                            <div class="space-y-2">
                                <label for="featured_image" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Featured Image <span class="text-red-500">*</span>
                                </label>
                                <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-6 bg-gray-50 dark:bg-gray-700/50 hover:border-green-400 dark:hover:border-green-500 transition-all duration-200">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500 mb-3" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <label for="featured_image" class="cursor-pointer">
                                            <span class="text-green-600 dark:text-green-400 font-medium hover:text-green-700 dark:hover:text-green-300">Choose a file</span>
                                            <span class="text-gray-500 dark:text-gray-400"> or drag and drop</span>
                                        </label>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">PNG, JPG up to 10MB - This will be the main property image</p>
                                    </div>
                                    <input 
                                        type="file" 
                                        name="featured_image" 
                                        id="featured_image" 
                                        required 
                                        accept="image/*"
                                        class="hidden">
                                </div>
                            </div>

                            <!-- Gallery Images -->
                            <div class="space-y-2">
                                <label for="gallery_images" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Additional Gallery Images
                                </label>
                                <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-6 bg-gray-50 dark:bg-gray-700/50 hover:border-green-400 dark:hover:border-green-500 transition-all duration-200">
                                    <div class="text-center">
                                        <svg class="mx-auto h-10 w-10 text-gray-400 dark:text-gray-500 mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <label for="gallery_images" class="cursor-pointer">
                                            <span class="text-green-600 dark:text-green-400 font-medium hover:text-green-700 dark:hover:text-green-300">Select multiple images</span>
                                        </label>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">You can select multiple images at once</p>
                                    </div>
                                    <input 
                                        type="file" 
                                        name="gallery_images[]" 
                                        id="gallery_images" 
                                        accept="image/*" 
                                        multiple
                                        class="hidden">
                                </div>
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
                                            {{ old('featured') ? 'checked' : '' }}
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
                                        <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('properties.index') }}" 
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
                                    Create Property
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/x190tv6zsi1yvgsqf5idvi0gkbwjph9lbjyi1uxb8wzj91mm/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize TinyMCE
            tinymce.init({
                selector: '#editor',
                skin: 'oxide-dark',
                content_css: 'dark',
                plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
                toolbar: 'undo redo | blocks | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | help',
                height: 400,
                menubar: false,
                branding: false,
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                }
            });

            // File input preview handlers
            const featuredInput = document.getElementById('featured_image');
            const galleryInput = document.getElementById('gallery_images');

            featuredInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Validate file size (10MB)
                    if (file.size > 10 * 1024 * 1024) {
                        alert('File size must be less than 10MB.');
                        e.target.value = '';
                        return;
                    }
                    
                    // Validate file type
                    const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                    if (!validTypes.includes(file.type)) {
                        alert('Please upload a valid image file (JPG or PNG).');
                        e.target.value = '';
                        return;
                    }
                }
            });

            galleryInput.addEventListener('change', function(e) {
                const files = Array.from(e.target.files);
                files.forEach(file => {
                    // Validate file size (10MB)
                    if (file.size > 10 * 1024 * 1024) {
                        alert(`File ${file.name} is too large. Maximum size is 10MB.`);
                        e.target.value = '';
                        return;
                    }
                    
                    // Validate file type
                    const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                    if (!validTypes.includes(file.type)) {
                        alert(`File ${file.name} is not a valid image type.`);
                        e.target.value = '';
                        return;
                    }
                });
            });

            // Form validation
            document.getElementById('propertyForm').addEventListener('submit', function(e) {
                const title = document.getElementById('title').value.trim();
                const price = document.getElementById('price').value;
                const location = document.getElementById('location').value.trim();
                const featuredImage = document.getElementById('featured_image').files[0];

                if (!title || !price || !location || !featuredImage) {
                    e.preventDefault();
                    alert('Please fill in all required fields.');
                    return false;
                }
            });
        });
    </script>
</x-app-layout>