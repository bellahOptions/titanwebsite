<x-app-layout>
    <x-slot name="title">Contact Us | Titan & Equity Resources Ltd.</x-slot>

    <x-slot name="meta">
        <meta name="description" content="Contact Us — Property Sales, Shortlet Apartments, Land Investments, and Property Management across Nigeria.">
        <meta name="keywords" content="real estate, property sales, shortlet apartments, land investments, property management, titan resources, nigeria properties">
        <meta property="og:title" content="Contact Us | Titan & Equity Resources Ltd.">
        <meta property="og:description" content="Get in touch with our professional real estate team in Nigeria.">
        <meta property="og:image" content="{{ asset('images/titan-contact-banner.jpg') }}">
        <meta property="og:type" content="website">
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-green-600 to-green-800 dark:from-green-800 dark:to-green-950 text-white py-16">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative container mx-auto text-center px-6">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Get In Touch</h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto text-green-50">
                Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
            </p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <div class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                <!-- Success Message -->
                @if (session('success'))
                    <div x-data="{show: true}" x-show="show" x-transition
                        x-init="setTimeout(() => show = false, 5000)"
                        class="m-6 p-4 rounded-xl bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <p class="text-green-700 dark:text-green-300 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="m-6 p-4 rounded-xl bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <div class="flex-1">
                                <p class="text-red-700 dark:text-red-300 font-medium mb-2">Please correct the following errors:</p>
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li class="text-red-600 dark:text-red-400 text-sm">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('contact.submit') }}" method="POST" id="contactForm" class="p-8 space-y-6">
                    @csrf

                    <!-- Full Name -->
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </span>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                value="{{ old('name') }}"
                                required
                                maxlength="255"
                                class="w-full pl-12 pr-4 py-3.5 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none @error('name') border-red-500 @enderror"
                                placeholder="John Doe">
                        </div>
                        @error('name')
                            <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                value="{{ old('email') }}"
                                required
                                maxlength="255"
                                class="w-full pl-12 pr-4 py-3.5 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none @error('email') border-red-500 @enderror"
                                placeholder="john@example.com">
                        </div>
                        @error('email')
                            <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subject -->
                    <div class="space-y-2">
                        <label for="subject" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Subject
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                </svg>
                            </span>
                            <input 
                                type="text" 
                                name="subject" 
                                id="subject" 
                                value="{{ old('subject') }}"
                                maxlength="255"
                                class="w-full pl-12 pr-4 py-3.5 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none @error('subject') border-red-500 @enderror"
                                placeholder="Property Inquiry">
                        </div>
                        @error('subject')
                            <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Message with Quill Editor -->
                    <div class="space-y-2">
                        <label for="message" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Message <span class="text-red-500">*</span>
                        </label>
                        <div class="rounded-xl overflow-hidden border-2 border-gray-200 dark:border-gray-600 focus-within:border-green-500 dark:focus-within:border-green-400 focus-within:ring-4 focus-within:ring-green-100 dark:focus-within:ring-green-900/30 transition-all duration-200 @error('message') border-red-500 @enderror">
                            <div id="quill-editor" style="min-height: 200px;" class="bg-white dark:bg-gray-700"></div>
                        </div>
                        <textarea name="message" id="message" class="hidden" required>{{ old('message') }}</textarea>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Minimum 10 characters required</p>
                        @error('message')
                            <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">
                        <a href="{{ route('home') }}" 
                            class="px-6 py-3.5 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl transition-all duration-200 text-center">
                            Cancel
                        </a>
                        <button 
                            type="submit" 
                            class="px-8 py-3.5 bg-green-600 hover:bg-green-700 dark:bg-green-600 dark:hover:bg-green-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30">
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                Send Message
                            </span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Contact Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 text-center">
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Phone</h3>
                    <p class="text-gray-600 dark:text-gray-400">+234 911 500 8562</p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 text-center">
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Email</h3>
                    <p class="text-gray-600 dark:text-gray-400">titanrealtyltd@gmail.com</p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 text-center">
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Office</h3>
                    <p class="text-gray-600 dark:text-gray-400">9 Olaoye Segun Str, Ibeju-Lekki, Lagos</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quill Editor -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <style>
        /* Dark mode Quill customization */
        .dark .ql-toolbar {
            background: rgb(55 65 81);
            border-color: rgb(75 85 99) !important;
        }
        .dark .ql-container {
            background: rgb(55 65 81);
            border-color: rgb(75 85 99) !important;
        }
        .dark .ql-editor {
            color: rgb(243 244 246);
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
        .ql-editor.ql-blank::before {
            color: rgb(156 163 175);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Quill Editor
            const quill = new Quill('#quill-editor', {
                theme: 'snow',
                placeholder: 'Tell us about your inquiry...',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['clean']
                    ]
                }
            });

            // Sync Quill content with hidden textarea
            const messageInput = document.getElementById('message');
            
            // Set initial content if exists
            if (messageInput.value) {
                quill.root.innerHTML = messageInput.value;
            }

            // Update hidden textarea on text change
            quill.on('text-change', function() {
                messageInput.value = quill.root.innerHTML;
            });

            // Form validation
            const form = document.getElementById('contactForm');
            form.addEventListener('submit', function(e) {
                const text = quill.getText().trim();

                if (text.length < 10) {
                    e.preventDefault();
                    let banner = document.getElementById('message-error-banner');
                    if (!banner) {
                        banner = document.createElement('p');
                        banner.id = 'message-error-banner';
                        banner.className = 'text-sm text-red-600 dark:text-red-400 mt-1';
                        document.getElementById('quill-editor').parentElement.after(banner);
                    }
                    banner.textContent = 'Message must be at least 10 characters long.';
                    document.getElementById('quill-editor').parentElement.classList.add('border-red-500');
                    return false;
                }

                // Update hidden textarea before submit
                messageInput.value = quill.root.innerHTML;
            });

            // Inline email validation on blur
            const emailInput = document.getElementById('email');
            emailInput.addEventListener('blur', function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                let errEl = this.parentElement.nextElementSibling;
                if (this.value && !emailRegex.test(this.value)) {
                    this.classList.add('border-red-500');
                    if (!errEl || !errEl.dataset.inline) {
                        const p = document.createElement('p');
                        p.className = 'text-sm text-red-600 dark:text-red-400 mt-1';
                        p.dataset.inline = 'true';
                        p.textContent = 'Please enter a valid email address.';
                        this.parentElement.after(p);
                    }
                } else {
                    this.classList.remove('border-red-500');
                    if (errEl && errEl.dataset.inline) errEl.remove();
                }
            });
        });
    </script>
</x-app-layout>