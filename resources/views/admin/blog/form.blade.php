<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($blog) ? __('Edit Blog Post') : __('Create Blog Post') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ isset($blog) ? route('admin.blog.update', $blog) : route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($blog))
                            @method('PUT')
                        @endif

                        @if($errors->any())
                            <div class="bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-600 text-red-700 dark:text-red-300 px-4 py-3 rounded relative mb-4" role="alert">
                                <strong class="font-bold">Validation Error!</strong>
                                <ul class="mt-1 list-disc list-inside text-sm">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 gap-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title *</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $blog->title ?? '') }}" required 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            </div>

                            <!-- Excerpt -->
                            <div>
                                <label for="excerpt" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Excerpt *</label>
                                <textarea name="excerpt" id="excerpt" rows="3" required 
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">A brief summary of your blog post (max 500 characters).</p>
                            </div>

                            <!-- Content -->
                            <div>
                                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content *</label>
                                <textarea name="content" id="content" rows="12" required 
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('content', $blog->content ?? '') }}</textarea>
                            </div>

                            <!-- Image Upload -->
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Featured Image</label>
                                <input type="file" name="image" id="image" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Upload a featured image for your blog post (JPEG, PNG, JPG, GIF, max 2MB).</p>
                                
                                @if(isset($blog) && $blog->image_url)
                                    <div class="mt-4">
                                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Current Image:</p>
                                        <img src="{{ $blog->image_url }}" alt="Current featured image" class="mt-2 h-32 object-cover rounded-md">
                                        <div class="mt-2 flex items-center">
                                            <input type="checkbox" name="remove_image" id="remove_image" value="1" class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                            <label for="remove_image" class="ml-2 text-sm text-gray-700 dark:text-gray-300">Remove current image</label>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Published Status -->
                            <div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="published" id="published" value="1" 
                                           {{ old('published', isset($blog) && $blog->published ? 'checked' : '') ? 'checked' : '' }} 
                                           class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                    <label for="published" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">Publish this post</label>
                                </div>
                            </div>

                            <!-- Published At -->
                            <div id="published_at_container" style="display: none;">
                                <label for="published_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Publish Date & Time</label>
                                <input type="datetime-local" name="published_at" id="published_at" 
                                       value="{{ old('published_at', isset($blog) && $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Schedule when this post should be published.</p>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-3">
                            <a href="{{ route('admin.blog.index') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-md hover:bg-gray-400 dark:hover:bg-gray-500">
                                Cancel
                            </a>
                            <button type="submit" class="px-4 py-2 bg-primary-600 dark:bg-primary-700 text-white rounded-md hover:bg-primary-700 dark:hover:bg-primary-600">
                                {{ isset($blog) ? 'Update Post' : 'Create Post' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const publishedCheckbox = document.getElementById('published');
            const publishedAtContainer = document.getElementById('published_at_container');
            
            function togglePublishedAt() {
                if (publishedCheckbox.checked) {
                    publishedAtContainer.style.display = 'block';
                } else {
                    publishedAtContainer.style.display = 'none';
                }
            }
            
            // Initial toggle
            togglePublishedAt();
            
            // Add event listener
            publishedCheckbox.addEventListener('change', togglePublishedAt);
        });
    </script>
    @endpush
</x-app-layout>