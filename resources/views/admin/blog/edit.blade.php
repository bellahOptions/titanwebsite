@extends('layouts.admin')

@section('content')
<div class="py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Edit Blog Post</h2>

                <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                            <input type="text" name="title" id="title" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                   value="{{ old('title', $blog->title) }}">
                        </div>

                        <!-- Excerpt -->
                        <div>
                            <label for="excerpt" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Excerpt *</label>
                            <textarea name="excerpt" id="excerpt" rows="3" required 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('excerpt', $blog->excerpt) }}</textarea>
                        </div>

                        <!-- Content -->
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content *</label>
                            <textarea name="content" id="content" rows="12" required 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('content', $blog->content) }}</textarea>
                        </div>

                        <!-- Image Upload -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Featured Image</label>
                            <input type="file" name="image" id="image" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Upload a new featured image (will replace current one).</p>
                            
                            @if($blog->image)
                                <div class="mt-4">
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Current Image:</p>
                                    <img src="{{ Storage::url($blog->image) }}" alt="Current featured image" class="mt-2 h-32 object-cover rounded-md">
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
                                       {{ old('published', $blog->published) ? 'checked' : '' }} 
                                       class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                <label for="published" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">Publish this post</label>
                            </div>
                        </div>

                        <!-- Published At -->
                        <div id="published_at_container">
                            <label for="published_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Publish Date & Time</label>
                            <input type="datetime-local" name="published_at" id="published_at" 
                                   value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <a href="{{ route('admin.blogs.index') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-md hover:bg-gray-400 dark:hover:bg-gray-500">
                            Cancel
                        </a>
                        <button type="submit" class="px-4 py-2 bg-primary-600 dark:bg-primary-700 text-white rounded-md hover:bg-primary-700 dark:hover:bg-primary-600">
                            Update Post
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
@endsection