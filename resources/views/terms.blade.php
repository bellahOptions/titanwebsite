<x-app-layout>
    <x-slot name="title">Terms of Service | Titan & Equity Resources Ltd.</x-slot>

    <x-slot name="meta">
        <meta name="description" content="Terms of Service — Property Sales, Shortlet Apartments, Land Investments, and Property Management across Nigeria.">
        <meta name="keywords" content="real estate, property sales, shortlet apartments, land investments, property management, titan resources, nigeria properties, terms, privacy">
        <meta property="og:title" content="Terms of Service | Titan & Equity Resources Ltd.">
        <meta property="og:description" content="Read our terms of service, privacy policy, and legal disclaimers.">
        <meta property="og:image" content="{{ asset('images/titan-services-banner.jpg') }}">
        <meta property="og:type" content="website">
    </x-slot>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-green-600 to-green-800 dark:from-green-800 dark:to-green-950 text-white py-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://cdn.businessday.ng/wp-content/uploads/2025/02/Real-Estate.png" 
                 alt="Titan Services Banner" 
                 class="w-full h-full object-cover opacity-20">
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
        
        <div class="relative container mx-auto text-center px-6">
            <div class="inline-block mb-4">
                <span class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm font-medium border border-white/20">
                    Legal Information
                </span>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-4 animate__animated animate__fadeInDown">
                Terms of Service
            </h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto text-green-50 mb-6 animate__animated animate__fadeInUp">
                Terms of Service, Privacy Policy, and Disclaimer
            </p>
            
            @if ($terms && $terms->updated_at)
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-lg border border-white/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-sm">
                        <strong class="font-semibold">Last Updated:</strong>
                        {{ $terms->updated_at->format('F j, Y') }}
                    </span>
                </div>
            @endif
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                
                @if ($terms && !empty($terms->content))
                    <!-- Navigation Sidebar for Desktop -->
                    <div class="lg:grid lg:grid-cols-4 lg:gap-12">
                        <!-- Sidebar -->
                        <div class="hidden lg:block lg:col-span-1">
                            <div class="sticky top-8 space-y-2">
                                <h3 class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider mb-4">
                                    On This Page
                                </h3>
                                <nav class="space-y-1" id="tableOfContents">
                                    <!-- Will be populated by JavaScript -->
                                </nav>
                            </div>
                        </div>

                        <!-- Main Content -->
                        <div class="lg:col-span-3">
                            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                                <!-- Content Header -->
                                <div class="bg-gradient-to-r from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 px-8 py-6 border-b border-green-200 dark:border-green-800">
                                    <div class="flex items-start gap-4">
                                        <div class="w-12 h-12 bg-green-600 dark:bg-green-500 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                                                Legal Documentation
                                            </h2>
                                            <p class="text-gray-600 dark:text-gray-400">
                                                Please read these terms carefully before using our services
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Content Body -->
                                <div class="px-8 py-10">
                                    <div class="prose prose-lg prose-green dark:prose-invert max-w-none" id="termsContent">
                                        <!-- Render HTML content from Quill editor -->
                                        <div class="space-y-6 text-gray-700 dark:text-gray-300 leading-relaxed">
                                            {!! $terms->content !!}
                                        </div>
                                    </div>

                                    <!-- Important Notice -->
                                    <div class="mt-10 p-6 bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-500 dark:border-yellow-400 rounded-r-xl">
                                        <div class="flex items-start">
                                            <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                            </svg>
                                            <div>
                                                <h4 class="font-semibold text-yellow-800 dark:text-yellow-300 mb-2">
                                                    Important Notice
                                                </h4>
                                                <p class="text-sm text-yellow-700 dark:text-yellow-400">
                                                    By using our website and services, you acknowledge that you have read, understood, and agree to be bound by these Terms of Service. If you do not agree to these terms, please do not use our services.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Quick Links -->
                                    <div class="mt-10 pt-8 border-t border-gray-200 dark:border-gray-700">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                            Quick Actions
                                        </h3>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                            <a href="{{ route('contact') }}" class="flex items-center gap-3 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-green-50 dark:hover:bg-green-900/20 border border-gray-200 dark:border-gray-600 hover:border-green-300 dark:hover:border-green-600 transition-all group">
                                                <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center group-hover:bg-green-200 dark:group-hover:bg-green-800/50 transition-colors">
                                                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                                    </svg>
                                                </div>
                                                <div class="flex-1">
                                                    <p class="font-medium text-gray-900 dark:text-white">Have Questions?</p>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400">Contact our team</p>
                                                </div>
                                                <svg class="w-5 h-5 text-gray-400 group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </a>

                                            <button onclick="window.print()" class="flex items-center gap-3 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-green-50 dark:hover:bg-green-900/20 border border-gray-200 dark:border-gray-600 hover:border-green-300 dark:hover:border-green-600 transition-all group">
                                                <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center group-hover:bg-green-200 dark:group-hover:bg-green-800/50 transition-colors">
                                                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                                    </svg>
                                                </div>
                                                <div class="flex-1">
                                                    <p class="font-medium text-gray-900 dark:text-white">Print Document</p>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400">Save for reference</p>
                                                </div>
                                                <svg class="w-5 h-5 text-gray-400 group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @else
                    <!-- Empty State -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-16 text-center">
                        <div class="max-w-md mx-auto">
                            <div class="w-20 h-20 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                                Terms Not Available
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-6">
                                Our Terms of Service are currently being updated. Please check back soon or contact us for more information.
                            </p>
                            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                Contact Us
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-gradient-to-br from-green-600 to-green-800 dark:from-green-800 dark:to-green-950 py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                Need Clarification?
            </h2>
            <p class="text-lg text-green-50 mb-8 max-w-2xl mx-auto">
                Our team is here to help you understand our terms and answer any questions you may have.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-white text-green-700 hover:bg-gray-100 font-semibold rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Contact Support
                </a>
                <a href="{{ route('properties.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-transparent border-2 border-white text-white hover:bg-white hover:text-green-700 font-semibold rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Browse Properties
                </a>
            </div>
        </div>
    </section>

    <!-- Custom Styles for Content -->
    <style>
        /* Prose styling for better readability */
        .prose h1, .prose-lg h1 { 
            @apply text-3xl font-bold text-gray-900 dark:text-white mt-8 mb-4; 
        }
        .prose h2, .prose-lg h2 { 
            @apply text-2xl font-bold text-gray-900 dark:text-white mt-6 mb-3; 
        }
        .prose h3, .prose-lg h3 { 
            @apply text-xl font-semibold text-gray-900 dark:text-white mt-5 mb-2; 
        }
        .prose h4, .prose-lg h4 { 
            @apply text-lg font-semibold text-gray-900 dark:text-white mt-4 mb-2; 
        }
        .prose p, .prose-lg p { 
            @apply mb-4 leading-relaxed; 
        }
        .prose ul, .prose-lg ul { 
            @apply list-disc list-inside mb-4 space-y-2; 
        }
        .prose ol, .prose-lg ol { 
            @apply list-decimal list-inside mb-4 space-y-2; 
        }
        .prose li, .prose-lg li { 
            @apply mb-1; 
        }
        .prose strong, .prose-lg strong { 
            @apply font-bold text-gray-900 dark:text-white; 
        }
        .prose em, .prose-lg em { 
            @apply italic; 
        }
        .prose a, .prose-lg a { 
            @apply text-green-600 dark:text-green-400 hover:text-green-700 dark:hover:text-green-300 underline; 
        }
        .prose blockquote, .prose-lg blockquote { 
            @apply border-l-4 border-green-500 pl-4 italic my-4 text-gray-600 dark:text-gray-400; 
        }
        .prose code, .prose-lg code { 
            @apply bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded text-sm font-mono; 
        }
        
        @media print {
            nav, header, footer, .no-print, button {
                display: none !important;
            }
            .prose, .prose-lg {
                max-width: 100% !important;
            }
        }
    </style>

    <!-- JavaScript for Table of Contents -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const content = document.getElementById('termsContent');
            const toc = document.getElementById('tableOfContents');
            
            if (content && toc) {
                const headings = content.querySelectorAll('h1, h2, h3');
                
                headings.forEach((heading, index) => {
                    // Add ID to heading for linking
                    const id = `section-${index}`;
                    heading.id = id;
                    
                    // Create TOC link
                    const link = document.createElement('a');
                    link.href = `#${id}`;
                    link.className = 'block px-3 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-green-600 dark:hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-900/20 rounded-lg transition-colors';
                    link.textContent = heading.textContent;
                    
                    // Indent based on heading level
                    if (heading.tagName === 'H2') {
                        link.style.paddingLeft = '1rem';
                    } else if (heading.tagName === 'H3') {
                        link.style.paddingLeft = '1.5rem';
                    }
                    
                    toc.appendChild(link);
                    
                    // Smooth scroll
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        heading.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        
                        // Update active state
                        document.querySelectorAll('#tableOfContents a').forEach(a => {
                            a.classList.remove('text-green-600', 'dark:text-green-400', 'bg-green-50', 'dark:bg-green-900/20', 'font-semibold');
                        });
                        link.classList.add('text-green-600', 'dark:text-green-400', 'bg-green-50', 'dark:bg-green-900/20', 'font-semibold');
                    });
                });
            }
        });
    </script>
</x-app-layout>