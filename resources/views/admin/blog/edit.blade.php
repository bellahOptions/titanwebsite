<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Blog Post') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-200 dark:border-gray-700">
                <div class="p-8">
                    <!-- Header -->
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Edit Blog Post</h2>
                        <p class="text-gray-600 dark:text-gray-400">Update your article details</p>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div x-data="{ show: true }" x-show="show" x-transition
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

                    <!-- Error Messages -->
                    @if($errors->any())
                        <div class="mb-6 p-4 rounded-xl bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 dark:border-red-400">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-red-500 dark:text-red-400 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                <div class="flex-1">
                                    <p class="text-red-700 dark:text-red-300 font-medium mb-2">Validation Error!</p>
                                    <ul class="list-disc list-inside space-y-1">
                                        @foreach($errors->all() as $error)
                                            <li class="text-red-600 dark:text-red-400 text-sm">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" id="editBlogForm" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="space-y-2">
                            <label for="title" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Title <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="title" 
                                id="title" 
                                required 
                                maxlength="255"
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none" 
                                placeholder="Enter an engaging title for your post"
                                value="{{ old('title', $blog->title) }}">
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Maximum 255 characters</p>
                        </div>

                        <!-- Excerpt -->
                        <div class="space-y-2">
                            <label for="excerpt" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Excerpt <span class="text-red-500">*</span>
                            </label>
                            <textarea 
                                name="excerpt" 
                                id="excerpt" 
                                rows="3" 
                                required 
                                maxlength="500"
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none resize-none" 
                                placeholder="Write a brief summary that will appear in listings">{{ old('excerpt', $blog->excerpt) }}</textarea>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Maximum 500 characters. This appears in blog previews.</p>
                        </div>

                         <!-- Content Editor -->
                        <div class="space-y-2">
                            <label for="content" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Content <span class="text-red-500">*</span>
                            </label>
                            <div class="rounded-xl overflow-hidden border-2 border-gray-200 dark:border-gray-600 focus-within:border-green-500 dark:focus-within:border-green-400 focus-within:ring-4 focus-within:ring-green-100 dark:focus-within:ring-green-900/30 transition-all duration-200">
                                <div id="editor" class="min-h-[400px] bg-white dark:bg-gray-700"></div>
                            </div>
                            <input type="hidden" name="content" id="content" value="{{ old('content', $blog->content) }}" required>
                        </div>

                        <!-- Image Upload Section -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Featured Image <span class="text-red-500">*</span>
                            </label>
                            <x-image-uploader
                                upload-route="{{ route('admin.blogs.upload-image') }}"
                                url-field="image_url"
                                current-url="{{ $blog->image_url }}"
                                current-pid="{{ $blog->public_id }}"
                            />
                        </div>

                        <!-- Publishing Options -->
                        <div class="space-y-6 p-6 bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Publishing Options</h3>
                            
                            <!-- Published Checkbox -->
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input 
                                        type="checkbox" 
                                        name="published" 
                                        id="published" 
                                        value="1" 
                                        {{ old('published', $blog->published) ? 'checked' : '' }}
                                        class="w-5 h-5 text-green-600 bg-white dark:bg-gray-700 border-2 border-gray-300 dark:border-gray-600 rounded focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200">
                                </div>
                                <div class="ml-3">
                                    <label for="published" class="font-medium text-gray-700 dark:text-gray-300 cursor-pointer">
                                        Publish this post
                                    </label>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Make this post visible to the public</p>
                                </div>
                            </div>

                            <!-- Publish Date -->
                            <div id="published_at_container" class="space-y-2">
                                <label for="published_at" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Publish Date & Time
                                </label>
                                <input 
                                    type="datetime-local" 
                                    name="published_at" 
                                    id="published_at" 
                                    value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none">
                                <p class="text-xs text-gray-500 dark:text-gray-400">Schedule when this post should be published</p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('admin.blogs.index') }}" 
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
                                    Update Post
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quill = new Quill('#editor', {
                theme: 'snow',
                placeholder: 'Start writing your blog content...',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'color': [] }, { 'background': [] }],
                        ['link', 'image'],
                        ['clean']
                    ]
                }
            });

            const contentField = document.getElementById('content');
            if (contentField.value) { quill.root.innerHTML = contentField.value; }
            quill.on('text-change', () => { contentField.value = quill.root.innerHTML; });

            document.getElementById('editBlogForm').addEventListener('submit', () => {
                contentField.value = quill.root.innerHTML;
            });

            const publishedCheckbox = document.getElementById('published');
            const publishedAtContainer = document.getElementById('published_at_container');

            function togglePublishedAt() {
                publishedAtContainer.style.display = publishedCheckbox.checked ? 'block' : 'none';
            }

            togglePublishedAt();
            publishedCheckbox.addEventListener('change', togglePublishedAt);
        });
    </script>
    @endpush
</x-app-layout>