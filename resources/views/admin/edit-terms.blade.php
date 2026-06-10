<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Terms of Service Editor') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    Manage and update your website's legal documentation
                </p>
            </div>
            <a href="{{ route('admin.dashboard') }}" 
                class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-xl font-medium transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Success Message -->
            @if (session('success'))
                <div x-data="{show: true}" x-show="show" x-transition
                    x-init="setTimeout(() => show = false, 5000)"
                    class="mb-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg border-l-4 border-green-500 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="text-lg font-bold text-green-800 dark:text-green-300 mb-1">
                                    Success!
                                </h3>
                                <p class="text-green-700 dark:text-green-400">{{ session('success') }}</p>
                            </div>
                            <button @click="show = false" class="flex-shrink-0 ml-4 text-green-400 hover:text-green-600 dark:hover:text-green-200 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg border-l-4 border-red-500 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="text-lg font-bold text-red-800 dark:text-red-300 mb-2">
                                    Please correct the following errors:
                                </h3>
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li class="text-red-600 dark:text-red-400">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Main Editor Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 px-8 py-6 border-b border-green-200 dark:border-green-800">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-green-600 dark:bg-green-500 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                                Edit Terms of Service
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                                Use the rich text editor below to update your website's terms of service, privacy policy, and legal disclaimers. 
                                Changes will be visible to all users immediately after saving.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form action="{{ route('admin.terms.update') }}" method="POST" id="termsForm" class="p-8">
                    @csrf

                    <!-- Info Alert -->
                    <div class="mb-6 p-4 bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 dark:border-blue-400 rounded-r-xl">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <div>
                                <h4 class="font-semibold text-blue-800 dark:text-blue-300 mb-1">
                                    Editor Tips
                                </h4>
                                <ul class="text-sm text-blue-700 dark:text-blue-400 space-y-1">
                                    <li>• Use the toolbar to format text with bold, italic, lists, and more</li>
                                    <li>• Include clear section headings for better readability</li>
                                    <li>• Remember to save your changes before leaving the page</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Editor Label -->
                    <div class="mb-3">
                        <label for="content" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Content <span class="text-red-500">*</span>
                        </label>
                    </div>

                    <!-- Quill Editor Container -->
                    <div class="mb-6">
                        <div class="rounded-xl overflow-hidden border-2 border-gray-200 dark:border-gray-600 focus-within:border-green-500 dark:focus-within:border-green-400 focus-within:ring-4 focus-within:ring-green-100 dark:focus-within:ring-green-900/30 transition-all duration-200">
                            <div id="quill-editor" style="min-height: 500px;" class="bg-white dark:bg-gray-700"></div>
                        </div>
                        <textarea name="content" id="content" class="hidden" required>{{ old('content', $terms->content ?? '') }}</textarea>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Character count will be calculated automatically
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.dashboard') }}" 
                                class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Cancel
                            </a>
                            <a href="{{ route('terms') }}" target="_blank"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900/30 dark:hover:bg-blue-800/50 text-blue-700 dark:text-blue-300 font-semibold rounded-xl transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Preview Live
                            </a>
                        </div>

                        <button 
                            type="submit" 
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-green-600 hover:bg-green-700 dark:bg-green-600 dark:hover:bg-green-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Update Terms of Service</span>
                        </button>
                    </div>
                </form>

                <!-- Help Section -->
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700 px-8 py-6 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Need Help?</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Contact support if you need assistance with editing your terms
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('contact') }}" 
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            Contact Support
                        </a>
                    </div>
                </div>
            </div>

            <!-- Additional Info Card -->
            <div class="mt-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900/30 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white mb-2">Important Legal Notice</h4>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                            These terms constitute a legal agreement between your company and your users. 
                            We recommend consulting with a legal professional before making significant changes. 
                            All modifications are logged with timestamps for compliance purposes.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quill Editor CSS & JS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <style>
        /* Dark mode Quill customization */
        .dark .ql-toolbar {
            background: rgb(55 65 81);
            border-color: rgb(75 85 99) !important;
            border-bottom: 1px solid rgb(75 85 99);
        }
        .dark .ql-container {
            background: rgb(55 65 81);
            border-color: rgb(75 85 99) !important;
            color: rgb(243 244 246);
        }
        .dark .ql-editor {
            color: rgb(243 244 246);
        }
        .dark .ql-editor.ql-blank::before {
            color: rgb(156 163 175);
        }
        .dark .ql-stroke {
            stroke: rgb(156 163 175);
        }
        .dark .ql-fill {
            fill: rgb(156 163 175);
        }
        .dark .ql-picker-label {
            color: rgb(156 163 175);
        }
        .dark .ql-picker-options {
            background: rgb(55 65 81);
            border-color: rgb(75 85 99);
        }
        .dark .ql-picker-item:hover {
            color: rgb(34 197 94);
        }
        
        /* Quill editor enhancements */
        .ql-editor {
            min-height: 500px;
            font-size: 15px;
            line-height: 1.8;
        }
        .ql-toolbar {
            background: rgb(249 250 251);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Quill Editor with comprehensive toolbar
            const quill = new Quill('#quill-editor', {
                theme: 'snow',
                placeholder: 'Enter your Terms of Service content here...\n\nYou can use the toolbar above to format your text with headings, bold, italic, lists, and more.',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        [{ 'font': [] }],
                        [{ 'size': ['small', false, 'large', 'huge'] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'color': [] }, { 'background': [] }],
                        [{ 'script': 'sub'}, { 'script': 'super' }],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'indent': '-1'}, { 'indent': '+1' }],
                        [{ 'align': [] }],
                        ['blockquote', 'code-block'],
                        ['link'],
                        ['clean']
                    ]
                }
            });

            // Set initial content from textarea
            const contentInput = document.getElementById('content');
            if (contentInput.value) {
                quill.root.innerHTML = contentInput.value;
            }

            // Sync Quill content with hidden textarea
            quill.on('text-change', function() {
                contentInput.value = quill.root.innerHTML;
            });

            // Form validation before submit
            const form = document.getElementById('termsForm');
            form.addEventListener('submit', function(e) {
                const text = quill.getText().trim();
                
                if (text.length < 50) {
                    e.preventDefault();
                    alert('Terms of Service content must be at least 50 characters long.');
                    return false;
                }

                // Update hidden textarea before submit
                contentInput.value = quill.root.innerHTML;
                
                // Show loading state
                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Saving Changes...</span>
                `;
            });

            // Warn before leaving if content changed
            let originalContent = quill.root.innerHTML;
            window.addEventListener('beforeunload', function(e) {
                if (quill.root.innerHTML !== originalContent) {
                    e.preventDefault();
                    e.returnValue = 'You have unsaved changes. Are you sure you want to leave?';
                    return e.returnValue;
                }
            });

            // Update original content after successful save
            form.addEventListener('submit', function() {
                originalContent = quill.root.innerHTML;
            });
        });
    </script>
</x-app-layout>