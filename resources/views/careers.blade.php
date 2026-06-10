@section('title', 'Build a Career in Real Estate')
<x-app-layout>
    <x-slot name="title">Work with Us | Titan & Equity Resources Ltd.</x-slot>
    <x-slot name="meta">
        <meta name="description" content="Explore career opportunities at Titan & Equity Resources Ltd. — Join our team and build a rewarding career in real estate.">
        <meta name="keywords" content="real estate careers, property sales jobs, NYSC jobs Lagos, real estate internship, titan resources careers, nigeria jobs">
        <meta property="og:title" content="Work with Us | Titan & Equity Resources Ltd.">
        <meta property="og:description" content="Join our team and build a rewarding career in real estate with Titan & Equity Resources Ltd.">
        <meta property="og:image" content="{{ asset('images/titan-services-banner.jpg') }}">
        <meta property="og:type" content="website">
    </x-slot>

    {{-- Hero Section --}}
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0">
            <img src="https://cdn.businessday.ng/wp-content/uploads/2025/02/Real-Estate.png" 
                 alt="Titan Careers Banner" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-primary-900/90 via-primary-800/85 to-primary-900/90 dark:from-gray-900/95 dark:via-gray-800/90 dark:to-gray-900/95"></div>
        </div>
        
        <!-- Decorative Elements -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-primary-500/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-yellow-500/10 rounded-full blur-3xl"></div>
        
        <!-- Content -->
        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 text-center py-20">
            <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm text-white text-sm font-semibold rounded-full mb-6 border border-white/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Career Opportunities
            </span>
            
            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                Build Your Career<br>
                <span class="text-yellow-400">With Us</span>
            </h1>
            
            <p class="text-lg sm:text-xl text-gray-200 max-w-3xl mx-auto mb-10 leading-relaxed">
                We provide premium real estate solutions — connecting clients to dream homes, 
                lucrative land investments, and trusted property management. Join our growing team!
            </p>
            
            <a href="#openings" class="inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-primary-900 font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 shadow-xl hover:shadow-2xl">
                View Open Positions
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </a>
        </div>
    </section>

    {{-- Why Join Us Section --}}
    <section class="py-16 lg:py-24 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 lg:mb-16">
                <span class="inline-block px-4 py-2 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400 text-sm font-semibold rounded-full mb-4">
                    Why Titan?
                </span>
                <h2 class="font-display text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Why Work With Us?
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Join a team that values growth, innovation, and success
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="group text-center p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-primary-100 dark:bg-primary-900/30 group-hover:bg-primary-600 rounded-2xl flex items-center justify-center mx-auto mb-6 transition-all duration-300">
                        <svg class="w-8 h-8 text-primary-600 dark:text-primary-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl font-bold text-gray-900 dark:text-white mb-3">Competitive Earnings</h3>
                    <p class="text-gray-600 dark:text-gray-400">Attractive commissions and bonuses on every successful deal you close</p>
                </div>
                
                <div class="group text-center p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-primary-100 dark:bg-primary-900/30 group-hover:bg-primary-600 rounded-2xl flex items-center justify-center mx-auto mb-6 transition-all duration-300">
                        <svg class="w-8 h-8 text-primary-600 dark:text-primary-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl font-bold text-gray-900 dark:text-white mb-3">Career Growth</h3>
                    <p class="text-gray-600 dark:text-gray-400">Clear paths for advancement and leadership opportunities within the company</p>
                </div>
                
                <div class="group text-center p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-primary-100 dark:bg-primary-900/30 group-hover:bg-primary-600 rounded-2xl flex items-center justify-center mx-auto mb-6 transition-all duration-300">
                        <svg class="w-8 h-8 text-primary-600 dark:text-primary-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl font-bold text-gray-900 dark:text-white mb-3">Training & Mentorship</h3>
                    <p class="text-gray-600 dark:text-gray-400">Comprehensive training programs and guidance from industry experts</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Job Opening Section --}}
    <section id="openings" class="py-16 lg:py-24 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400 text-sm font-semibold rounded-full mb-4">
                    Open Positions
                </span>
                <h2 class="font-display text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Current Openings
                </h2>
            </div>

            <!-- Job Card -->
            <div class="max-w-5xl mx-auto">
                <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700">
                    <div class="grid grid-cols-1 lg:grid-cols-5 gap-0">
                        <!-- Job Details -->
                        <div class="lg:col-span-3 p-8 lg:p-10">
                            <!-- Job Header -->
                            <div class="flex flex-wrap items-center gap-3 mb-6">
                                <span class="px-3 py-1.5 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400 text-sm font-semibold rounded-lg">
                                    Now Hiring
                                </span>
                                <span class="px-3 py-1.5 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400 text-sm font-semibold rounded-lg">
                                    NYSC Friendly
                                </span>
                            </div>
                            
                            <h3 class="font-display text-2xl lg:text-3xl font-bold text-gray-900 dark:text-white mb-4">
                                Sales Associate
                            </h3>
                            
                            <p class="text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">
                                Are you a prospective or serving corps member looking to gain real-world experience and earn income during your service year? Join Titan & Equity Resources Limited, a trusted name in real estate.
                            </p>
                            
                            <!-- Job Meta -->
                            <div class="flex flex-wrap gap-4 mb-8">
                                <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                    <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    </svg>
                                    <span>Lagos, Nigeria</span>
                                </div>
                                <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                    <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Full-time / Part-time</span>
                                </div>
                            </div>
                            
                            <!-- What You'll Do -->
                            <div class="mb-8">
                                <h4 class="font-display text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                        </svg>
                                    </span>
                                    What You'll Do
                                </h4>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-primary-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-gray-600 dark:text-gray-400">Market our short-let apartments, lands, and properties</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-primary-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-gray-600 dark:text-gray-400">Attend site inspections and client meetings</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-primary-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-gray-600 dark:text-gray-400">Represent Titan professionally online and offline</span>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- Who Can Apply -->
                            <div class="mb-8">
                                <h4 class="font-display text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </span>
                                    Who Can Apply
                                </h4>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3">
                                        <span class="text-primary-500 font-bold">✓</span>
                                        <span class="text-gray-600 dark:text-gray-400">Prospective and serving NYSC members</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="text-primary-500 font-bold">✓</span>
                                        <span class="text-gray-600 dark:text-gray-400">Passionate about real estate, marketing, or sales</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="text-primary-500 font-bold">✓</span>
                                        <span class="text-gray-600 dark:text-gray-400">Outspoken and result-oriented individuals</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="text-primary-500 font-bold">✓</span>
                                        <span class="text-gray-600 dark:text-gray-400">Willing to learn and grow professionally</span>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- What You'll Gain -->
                            <div>
                                <h4 class="font-display text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                                        </svg>
                                    </span>
                                    What You'll Gain
                                </h4>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    <div class="p-4 bg-primary-50 dark:bg-primary-900/20 rounded-xl text-center">
                                        <span class="text-2xl mb-2 block">💸</span>
                                        <p class="text-sm font-semibold text-gray-900 dark:text-white">Attractive Commissions</p>
                                    </div>
                                    <div class="p-4 bg-primary-50 dark:bg-primary-900/20 rounded-xl text-center">
                                        <span class="text-2xl mb-2 block">🎓</span>
                                        <p class="text-sm font-semibold text-gray-900 dark:text-white">Training & Mentorship</p>
                                    </div>
                                    <div class="p-4 bg-primary-50 dark:bg-primary-900/20 rounded-xl text-center">
                                        <span class="text-2xl mb-2 block">📈</span>
                                        <p class="text-sm font-semibold text-gray-900 dark:text-white">Career Growth</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Image Side -->
                        <div class="lg:col-span-2 relative min-h-[300px] lg:min-h-full">
                            <img src="{{ asset('images/affilitae.png') }}" 
                                 alt="Join Titan Team" 
                                 class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t lg:bg-gradient-to-l from-primary-900/60 to-transparent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- How to Apply CTA Section --}}
    <section class="relative py-20 lg:py-28 overflow-hidden">
        <!-- Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-primary-900 to-gray-900"></div>
        <div class="absolute inset-0 opacity-20">
            <img src="{{ asset('images/cta-bg.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
        
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-primary-500/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-yellow-500/20 rounded-full blur-3xl"></div>
        
        <!-- Content -->
        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="max-w-3xl mx-auto">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm text-white text-sm font-semibold rounded-full mb-6 border border-white/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Apply Now
                </span>
                
                <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-6">
                    Ready to Join Our Team?
                </h2>
                
                <p class="text-lg text-gray-300 mb-8 leading-relaxed">
                    Send your CV or a short introduction about yourself to start your journey with Titan & Equity Resources Limited
                </p>
                
                <!-- Email Card -->
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 border border-white/20 mb-8">
                    <p class="text-gray-300 mb-4">Send your application to:</p>
                    <a href="mailto:careers@titansresources.com" 
                       class="inline-flex items-center gap-3 text-2xl lg:text-3xl font-bold text-yellow-400 hover:text-yellow-300 transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        careers@titansresources.com
                    </a>
                    
                    <div class="mt-6 p-4 bg-white/5 rounded-xl">
                        <p class="text-gray-400 text-sm">Use this subject line:</p>
                        <p class="text-white font-mono font-semibold mt-1">"NYSC Sales Associate – [Your Name]"</p>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="mailto:careers@titansresources.com?subject=NYSC Sales Associate – [Your Name]" 
                       class="inline-flex items-center justify-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-primary-900 font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 shadow-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Apply via Email
                    </a>
                    <a href="https://wa.me/2349115008562?text=Hello, I'm interested in the Sales Associate position at Titan & Equity Resources" 
                       target="_blank"
                       class="inline-flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 shadow-xl">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                        </svg>
                        Apply via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="py-16 lg:py-24 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400 text-sm font-semibold rounded-full mb-4">
                    FAQs
                </span>
                <h2 class="font-display text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Frequently Asked Questions
                </h2>
            </div>
            
            <div class="max-w-3xl mx-auto space-y-4" x-data="{ openFaq: null }">
                <!-- FAQ Item 1 -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl overflow-hidden">
                    <button @click="openFaq = openFaq === 1 ? null : 1" 
                            class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 focus:outline-none">
                        <span class="font-semibold text-gray-900 dark:text-white">Do I need prior real estate experience?</span>
                        <svg class="w-5 h-5 text-primary-600 transition-transform duration-300" 
                             :class="openFaq === 1 ? 'rotate-180' : ''" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 1" x-collapse class="px-6 pb-4">
                        <p class="text-gray-600 dark:text-gray-400">No prior experience is required! We provide comprehensive training and mentorship to help you succeed in the real estate industry.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl overflow-hidden">
                    <button @click="openFaq = openFaq === 2 ? null : 2" 
                            class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 focus:outline-none">
                        <span class="font-semibold text-gray-900 dark:text-white">How much can I earn as a Sales Associate?</span>
                        <svg class="w-5 h-5 text-primary-600 transition-transform duration-300" 
                             :class="openFaq === 2 ? 'rotate-180' : ''" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 2" x-collapse class="px-6 pb-4">
                        <p class="text-gray-600 dark:text-gray-400">Your earnings are commission-based and depend on your performance. Top performers earn substantial commissions on property sales, rentals, and land investments.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl overflow-hidden">
                    <button @click="openFaq = openFaq === 3 ? null : 3" 
                            class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 focus:outline-none">
                        <span class="font-semibold text-gray-900 dark:text-white">Can I work part-time during my NYSC?</span>
                        <svg class="w-5 h-5 text-primary-600 transition-transform duration-300" 
                             :class="openFaq === 3 ? 'rotate-180' : ''" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 3" x-collapse class="px-6 pb-4">
                        <p class="text-gray-600 dark:text-gray-400">Yes! We offer flexible arrangements that accommodate your NYSC schedule. Many of our associates successfully balance their service year commitments with their work at Titan.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl overflow-hidden">
                    <button @click="openFaq = openFaq === 4 ? null : 4" 
                            class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 focus:outline-none">
                        <span class="font-semibold text-gray-900 dark:text-white">What happens after my NYSC?</span>
                        <svg class="w-5 h-5 text-primary-600 transition-transform duration-300" 
                             :class="openFaq === 4 ? 'rotate-180' : ''" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 4" x-collapse class="px-6 pb-4">
                        <p class="text-gray-600 dark:text-gray-400">Outstanding performers have the opportunity for full-time employment and career advancement within Titan & Equity Resources Limited. We believe in promoting from within!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>