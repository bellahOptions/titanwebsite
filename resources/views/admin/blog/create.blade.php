<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Blog Post') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-200 dark:border-gray-700">
                <div class="p-8">
                    <!-- Header -->
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Create New Blog Post</h2>
                        <p class="text-gray-600 dark:text-gray-400">Fill in the details below to publish your new article</p>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="mb-6 p-4 rounded-xl bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 dark:border-green-400">
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
                                    <p class="text-red-700 dark:text-red-300 font-medium mb-2">Please fix the following errors:</p>
                                    <ul class="list-disc list-inside space-y-1">
                                        @foreach($errors->all() as $error)
                                            <li class="text-red-600 dark:text-red-400 text-sm">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('admin.blogs.store') }}" method="POST" id="blogForm" class="space-y-8">
                        @csrf

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
                                value="{{ old('title') }}">
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
                                placeholder="Write a brief summary that will appear in listings">{{ old('excerpt') }}</textarea>
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
                            <input type="hidden" name="content" id="content" required>
                        </div>

                        <!-- Image Upload Section -->
                        <div class="space-y-2">
                            <label for="image_upload" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Featured Image <span class="text-red-500">*</span>
                            </label>
                            <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-6 bg-gray-50 dark:bg-gray-700/50 hover:border-green-400 dark:hover:border-green-500 transition-all duration-200">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500 mb-3" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <label for="image_upload" class="cursor-pointer">
                                        <span class="text-green-600 dark:text-green-400 font-medium hover:text-green-700 dark:hover:text-green-300">Choose a file</span>
                                        <span class="text-gray-500 dark:text-gray-400"> or drag and drop</span>
                                    </label>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">PNG, JPG, GIF up to 10MB</p>
                                </div>
                                <input type="file" id="image_upload" class="hidden" accept="image/*">
                            </div>
                            
                            <button type="button" id="upload_btn"
                                class="mt-3 w-full sm:w-auto px-6 py-3 bg-green-600 hover:bg-green-700 dark:bg-green-600 dark:hover:bg-green-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30">
                                <span class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                    </svg>
                                    Upload Image
                                </span>
                            </button>

                            <div id="preview" class="mt-4"></div>
                            <input type="hidden" name="uploaded_image_url" id="image_url">
                            <input type="hidden" name="public_id" id="public_id">
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
                                        {{ old('published') ? 'checked' : '' }}
                                        class="w-5 h-5 text-green-600 bg-white dark:bg-gray-700 border-2 border-gray-300 dark:border-gray-600 rounded focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200">
                                </div>
                                <div class="ml-3">
                                    <label for="published" class="font-medium text-gray-700 dark:text-gray-300 cursor-pointer">
                                        Publish immediately
                                    </label>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Make this post visible to the public right away</p>
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
                                    value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}"
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
                                    Create Post
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
        // Initialize Quill Editor
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

        // Get the hidden input
        const contentField = document.getElementById('content');

        // Update hidden input whenever Quill content changes
        quill.on('text-change', () => {
            contentField.value = quill.root.innerHTML;
        });

        // Form submission handler
        const form = document.getElementById('blogForm');
        form.addEventListener('submit', (e) => {
            contentField.value = quill.root.innerHTML;
            
            // Validate content is not empty
            if (quill.getText().trim().length === 0) {
                e.preventDefault();
                alert('Please add some content to your blog post.');
                return false;
            }
        });

        // Cloudinary Upload (keeping original Ajax logic)
        $(document).ready(function() {
            $('#upload_btn').click(function() {
                const file = $('#image_upload')[0].files[0];
                if (!file) {
                    alert('Please select an image first.');
                    return;
                }

                // File size validation (10MB)
                if (file.size > 10 * 1024 * 1024) {
                    alert('File size must be less than 10MB.');
                    return;
                }

                // File type validation
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                if (!validTypes.includes(file.type)) {
                    alert('Please upload a valid image file (JPG, PNG, or GIF).');
                    return;
                }

                const formData = new FormData();
                formData.append('file', file);
                formData.append('upload_preset', 'unsigned_preset_here');

                $('#upload_btn').html(`
                    <span class="flex items-center justify-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Uploading...
                    </span>
                `).prop('disabled', true);

                $.ajax({
                    url: 'https://api.cloudinary.com/v1_1/dgivliz15/image/upload',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        console.log(res);

                        $('#preview').html(`
                            <div class="p-4 bg-green-50 dark:bg-green-900/20 rounded-xl border border-green-200 dark:border-green-800">
                                <p class="text-sm font-medium text-green-700 dark:text-green-300 mb-3">✓ Upload Successful</p>
                                <img src="${res.secure_url}" class="w-full max-w-md rounded-lg shadow-md mx-auto mb-3">
                                <p class="text-xs text-gray-600 dark:text-gray-400 break-all">
                                    <strong>URL:</strong> 
                                    <a href="${res.secure_url}" target="_blank" class="text-green-600 dark:text-green-400 hover:underline">
                                        ${res.secure_url}
                                    </a>
                                </p>
                            </div>
                        `);

                        $('#image_url').val(res.secure_url);
                        $('#public_id').val(res.public_id);

                        $('#upload_btn').html(`
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Upload Complete ✓
                            </span>
                        `).prop('disabled', false).removeClass('bg-green-600 hover:bg-green-700').addClass('bg-green-500');
                    },
                    error: function(err) {
                        console.error(err);
                        alert('⚠️ Upload failed. Please try again.');
                        $('#upload_btn').html(`
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                                Upload Image
                            </span>
                        `).prop('disabled', false);
                    }
                });
            });
        });
    </script>
    @endpush
</x-app-layout>