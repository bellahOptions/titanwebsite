@section('title', 'Home')
<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-display font-bold text-2xl lg:text-3xl text-gray-900 dark:text-white leading-tight">
                {{ __('Welcome to Titan & Equity Resources') }}
            </h1>
        </div>
    </x-slot>

    <!-- Hero Section with Enhanced Slider -->
    <section class="relative overflow-hidden">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent z-10"></div>
                    <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1973&q=80" 
                         alt="Luxury Home" 
                         class="w-full h-[75vh] lg:h-[85vh] object-cover"
                         loading="eager">
                    <div class="absolute inset-0 flex items-center z-20">
                        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="max-w-2xl animate-fade-in">
                                <span class="inline-block px-4 py-2 bg-primary-500/90 backdrop-blur-sm text-white text-sm font-semibold rounded-full mb-4 shadow-lg">
                                    Premium Properties
                                </span>
                                <h2 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                                    Find Your Dream Property
                                </h2>
                                <p class="text-xl lg:text-2xl text-gray-100 mb-8 leading-relaxed">
                                    Discover premium real estate opportunities with Titan & Equity Resources
                                </p>
                                <a href="{{ route('properties.index') }}" 
                                   class="inline-flex items-center gap-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 shadow-xl hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-800">
                                    Explore Properties
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 2 -->
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent z-10"></div>
                    <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=2076&q=80" 
                         alt="Modern Interior" 
                         class="w-full h-[75vh] lg:h-[85vh] object-cover">
                    <div class="absolute inset-0 flex items-center z-20">
                        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="max-w-2xl animate-fade-in">
                                <span class="inline-block px-4 py-2 bg-primary-500/90 backdrop-blur-sm text-white text-sm font-semibold rounded-full mb-4 shadow-lg">
                                    Luxury Living
                                </span>
                                <h2 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                                    Luxury Living Spaces
                                </h2>
                                <p class="text-xl lg:text-2xl text-gray-100 mb-8 leading-relaxed">
                                    Experience the finest in comfort and design with our premium properties
                                </p>
                                <a href="{{ route('services') }}" 
                                   class="inline-flex items-center gap-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 shadow-xl hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-800">
                                    Our Services
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 3 -->
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent z-10"></div>
                    <img src="https://images.unsplash.com/photo-1574362848149-11496d93a7c7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1984&q=80" 
                         alt="Investment Opportunity" 
                         class="w-full h-[75vh] lg:h-[85vh] object-cover">
                    <div class="absolute inset-0 flex items-center z-20">
                        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="max-w-2xl animate-fade-in">
                                <span class="inline-block px-4 py-2 bg-primary-500/90 backdrop-blur-sm text-white text-sm font-semibold rounded-full mb-4 shadow-lg">
                                    Smart Investments
                                </span>
                                <h2 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                                    Smart Real Estate Investments
                                </h2>
                                <p class="text-xl lg:text-2xl text-gray-100 mb-8 leading-relaxed">
                                    Build generational wealth with our strategic property investments
                                </p>
                                <a href="{{ route('about') }}" 
                                   class="inline-flex items-center gap-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 shadow-xl hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-800">
                                    Learn More
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
            <!-- Enhanced Navigation -->
            <div class="swiper-pagination !bottom-8"></div>
            <div class="swiper-button-next !text-white !w-12 !h-12 after:!text-2xl !bg-primary-600/80 backdrop-blur-sm !rounded-full hover:!bg-primary-700 transition-all"></div>
            <div class="swiper-button-prev !text-white !w-12 !h-12 after:!text-2xl !bg-primary-600/80 backdrop-blur-sm !rounded-full hover:!bg-primary-700 transition-all"></div>
        </div>
    </section>

    <!-- Featured Properties -->
    <section class="py-16 lg:py-24 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 lg:mb-16 animate-slide-up">
                <span class="inline-block px-4 py-2 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400 text-sm font-semibold rounded-full mb-4">
                    Featured Listings
                </span>
                <h2 class="font-display text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    Featured Properties
                </h2>
                <p class="text-lg lg:text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Discover our handpicked selection of premium properties
                </p>
            </div>
            
            <div class="swiper mySwiper">
                <div class="swiper-wrapper pb-12">
                    @foreach($featuredProperties as $property)
                        <div class="swiper-slide h-auto">
                            @include('components.property-card')
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-center items-center gap-4 mt-8">
                    <button class="swiper-button-prev-custom p-3 rounded-full bg-primary-100 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400 hover:bg-primary-600 hover:text-white dark:hover:bg-primary-600 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-primary-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <div class="swiper-pagination-custom"></div>
                    <button class="swiper-button-next-custom p-3 rounded-full bg-primary-100 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400 hover:bg-primary-600 hover:text-white dark:hover:bg-primary-600 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-primary-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('properties.index') }}" 
                   class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 border-2 border-primary-300 dark:border-primary-700 hover:bg-primary-50 dark:hover:bg-primary-900/20 py-3 px-8 rounded-xl font-semibold transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-800">
                    View All Properties
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 lg:py-24 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 lg:mb-16 animate-slide-up">
                <span class="inline-block px-4 py-2 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400 text-sm font-semibold rounded-full mb-4">
                    What We Offer
                </span>
                <h2 class="font-display text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    Our Services
                </h2>
                <p class="text-lg lg:text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Comprehensive real estate solutions tailored to your needs
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                <!-- Service Card 1 -->
                <div class="group bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-800">
                    <div class="w-14 h-14 bg-primary-100 dark:bg-primary-900/30 group-hover:bg-primary-600 rounded-xl flex items-center justify-center mb-6 transition-all duration-300">
                        <svg class="w-7 h-7 text-primary-600 dark:text-primary-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl font-bold text-gray-900 dark:text-white mb-3">Property Sales</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Find your dream home from our curated selection of premium properties.</p>
                </div>
                
                <!-- Service Card 2 -->
                <div class="group bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-800">
                    <div class="w-14 h-14 bg-primary-100 dark:bg-primary-900/30 group-hover:bg-primary-600 rounded-xl flex items-center justify-center mb-6 transition-all duration-300">
                        <svg class="w-7 h-7 text-primary-600 dark:text-primary-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl font-bold text-gray-900 dark:text-white mb-3">Short Let Apartments</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Luxury short-term rentals for travelers and business professionals.</p>
                </div>
                
                <!-- Service Card 3 -->
                <div class="group bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-800">
                    <div class="w-14 h-14 bg-primary-100 dark:bg-primary-900/30 group-hover:bg-primary-600 rounded-xl flex items-center justify-center mb-6 transition-all duration-300">
                        <svg class="w-7 h-7 text-primary-600 dark:text-primary-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl font-bold text-gray-900 dark:text-white mb-3">Land Investments</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Strategic land investments with high growth potential in prime locations.</p>
                </div>
                
                <!-- Service Card 4 -->
                <div class="group bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-800">
                    <div class="w-14 h-14 bg-primary-100 dark:bg-primary-900/30 group-hover:bg-primary-600 rounded-xl flex items-center justify-center mb-6 transition-all duration-300">
                        <svg class="w-7 h-7 text-primary-600 dark:text-primary-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819"></path>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl font-bold text-gray-900 dark:text-white mb-3">Property Management</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Whether you are building a house or construction project, We've got you covered.</p>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('services') }}" 
                   class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 border-2 border-primary-300 dark:border-primary-700 hover:bg-primary-50 dark:hover:bg-primary-900/20 py-3 px-8 rounded-xl font-semibold transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-800">
                    Learn More About Our Services
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- About Preview Section -->
    <section class="py-16 lg:py-24 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="order-2 lg:order-1 animate-slide-up">
                    <span class="inline-block px-4 py-2 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400 text-sm font-semibold rounded-full mb-6">
                        About Us
                    </span>
                    <h2 class="font-display text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                        Why Choose Titan & Equity
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                        At Titan & Equity Resources Limited, we are more than a real estate company — we are architects of opportunity and builders of legacy.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            <div class="flex-shrink-0 w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-display text-lg font-bold text-gray-900 dark:text-white mb-2">Trust & Transparency</h3>
                                <p class="text-gray-600 dark:text-gray-300">We build lasting relationships through honesty and transparency.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            <div class="flex-shrink-0 w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-display text-lg font-bold text-gray-900 dark:text-white mb-2">Innovation & Technology</h3>
                                <p class="text-gray-600 dark:text-gray-300">We embrace creativity and technology to stay ahead of the market.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            <div class="flex-shrink-0 w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-display text-lg font-bold text-gray-900 dark:text-white mb-2">Community Focus</h3>
                                <p class="text-gray-600 dark:text-gray-300">We empower people and strengthen communities for generational impact.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-10">
                        <a href="{{ route('about') }}" 
                           class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 border-2 border-primary-300 dark:border-primary-700 hover:bg-primary-50 dark:hover:bg-primary-900/20 py-3 px-8 rounded-xl font-semibold transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-800">
                            Learn More About Us
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div class="order-1 lg:order-2 animate-fade-in">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-r from-primary-500 to-primary-600 rounded-2xl blur-2xl opacity-20"></div>
                        <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2053&q=80" 
                             alt="Modern Building" 
                             class="relative rounded-2xl shadow-2xl w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Preview Section -->
    <section class="py-16 lg:py-24 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 lg:mb-16 animate-slide-up">
                <span class="inline-block px-4 py-2 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400 text-sm font-semibold rounded-full mb-4">
                    Latest News
                </span>
                <h2 class="font-display text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    Latest From Our Blog
                </h2>
                <p class="text-lg lg:text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Insights, tips and news about real estate market
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($latestBlogs as $blog)
                <article class="group bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-800">
                    <div class="relative overflow-hidden">
                        <img
                            src="{{ $blog->image_url ?? 'https://images.unsplash.com/photo-1542435503-956c469947f6?auto=format&fit=crop&w=1974&q=80' }}"
                            alt="{{ $blog->title }}"
                            class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400 text-xs font-semibold rounded-full">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $blog->published_at->format('M d, Y') }}
                            </span>
                        </div>
                        
                        <h3 class="font-display text-xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                            {{ $blog->title }}
                        </h3>
                        
                        <p class="text-gray-600 dark:text-gray-300 mb-5 line-clamp-3 leading-relaxed">
                            {{ Str::limit($blog->excerpt, 120) }}
                        </p>
                        
                        <a href="{{ route('blog.show', $blog) }}" 
                           class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 font-semibold group/link transition-colors">
                            Read More
                            <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('blog.index') }}" 
                   class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 border-2 border-primary-300 dark:border-primary-700 hover:bg-primary-50 dark:hover:bg-primary-900/20 py-3 px-8 rounded-xl font-semibold transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-800">
                    View All Blog Posts
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Google Reviews Section -->
    <section class="py-16 lg:py-24 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 animate-slide-up">
                <span class="inline-block px-4 py-2 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400 text-sm font-semibold rounded-full mb-4">
                    Testimonials
                </span>
                <h2 class="font-display text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    What Our Clients Say
                </h2>
            </div>
            
            <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 shadow-lg">
                <script src="https://elfsightcdn.com/platform.js" async></script>
                <div class="elfsight-app-35cb2781-9aef-4ccc-99a7-8c83e5d816f0" data-elfsight-app-lazy></div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-20 lg:py-28 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 dark:from-primary-700 dark:via-primary-800 dark:to-primary-900"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDM0djItaDJWMzRoLTJ6bTAtNGgtMnYyaDJWMzB6bTAtNGgydi0yaDJWMjJoLTJ2Mmgtdi0yaC0ydjJoLTJ2Mmgydi0yem0tOCA4di0yaCwyVjMyaC0yem04IDBoMnYtMmgtMnYyem0wIDR2LTJoLTJ2Mmgyem0wIDRoLTJ2Mmgydi0yem0wIDRoLTJ2Mmgydi0yem0tOC04aDJ2Mmgtdi0yem0wLTRoMnYtMmgtMnYyem0wLTRoMnYtMmgtMnYyem0wLTRoMnYtMmgtMnYyem04LThoLTJ2MmgyVjI0em0wLTRoLTJ2Mmgydi0yem0wLTRoLTJ2Mmgydi0yeiIvPjwvZz48L2c+PC9zdmc+')] opacity-30"></div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-4xl mx-auto animate-fade-in">
                <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-6 leading-tight">
                    Ready to Find Your Dream Property?
                </h2>
                <p class="text-xl lg:text-2xl text-primary-50 mb-10 leading-relaxed max-w-3xl mx-auto">
                    Get in touch with our experts today and let us help you find the perfect property
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center items-center gap-4 sm:gap-6">
                    <a href="{{ route('properties.index') }}" 
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-primary-700 hover:bg-gray-50 font-bold py-4 px-10 rounded-xl transition-all duration-300 hover:scale-105 shadow-xl hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-white/50">
                        Browse Properties
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </a>
                    <a href="{{ route('contact') }}" 
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-transparent border-2 border-white text-white hover:bg-white hover:text-primary-700 font-bold py-4 px-10 rounded-xl transition-all duration-300 hover:scale-105 shadow-xl hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-white/50">
                        Contact Us
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hero Slider with enhanced animations
            const heroSwiper = new Swiper('.home-slider', {
                direction: 'horizontal',
                loop: true,
                speed: 1000,
                autoplay: {
                    delay: 6000,
                    disableOnInteraction: false,
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + ' !bg-white !w-3 !h-3 !opacity-60 hover:!opacity-100 transition-opacity"></span>';
                    },
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            // Featured Properties Slider
            const propertiesSwiper = new Swiper('.mySwiper', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                speed: 600,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination-custom',
                    clickable: true,
                    dynamicBullets: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next-custom',
                    prevEl: '.swiper-button-prev-custom',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 24,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 32,
                    },
                },
            });

            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        entry.target.classList.remove('opacity-0', 'translate-y-8');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.animate-slide-up').forEach(el => {
                el.classList.add('opacity-0', 'translate-y-8', 'transition-all', 'duration-700');
                observer.observe(el);
            });

            document.querySelectorAll('.animate-fade-in').forEach(el => {
                el.classList.add('opacity-0', 'transition-all', 'duration-700');
                observer.observe(el);
            });
        });
    </script>
    @endpush
</x-app-layout>