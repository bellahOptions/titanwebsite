@section('title', 'About us')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot> 

    <!-- Hero Section -->
    <section class="relative py-20 bg-green-700 dark:bg-primary-800">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">About Titan & Equity Resources</h1>
            <p class="text-xl text-white max-w-3xl mx-auto">Architects of opportunity and builders of legacy</p>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-8">
                    At Titan & Equity Resources Limited, we are more than a real estate company — we are architects of opportunity and builders of legacy.
                </p>
                <p class="text-lg text-gray-600 dark:text-gray-300">
                    Founded with a bold vision, we exist to transform the way people live, invest, and prosper across West Africa. Our goal is simple yet powerful: to redefine real estate through trust, innovation, and community empowerment, leaving behind a footprint of generational wealth and thriving communities.
                </p>
            </div>
        </div>
    </section>

    <!-- Who We Are Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Who We Are</h2>
                    <div class="space-y-4 text-gray-600 dark:text-gray-300">
                        <p>We are a full-service real estate company committed to delivering exceptional value through a diverse range of services. From luxury short-let apartments to property sales, sustainable land investments, annual leasing, and real estate banking, we provide end-to-end solutions for individuals, families, and investors.</p>
                        <p>Our team of passionate professionals brings deep expertise in real estate, finance, and marketing, ensuring that every transaction is seamless, profitable, and future-focused. Whether you are looking to own your first property, expand your portfolio, or generate income through rentals, Titan is your trusted partner every step of the way.</p>
                    </div>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" 
                         alt="Team Meeting" class="rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="bg-primary-50 dark:bg-primary-900 p-8 rounded-lg">
                    <div class="w-16 h-16 bg-primary-100 dark:bg-primary-800 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Our Vision</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        To build West Africa's most trusted and innovative real estate company, creating sustainable opportunities for people to live, invest, and prosper, while leaving a legacy of generational wealth, empowered communities, and timeless impact.
                    </p>
                </div>
                
                <div class="bg-primary-50 dark:bg-primary-900 p-8 rounded-lg">
                    <div class="w-16 h-16 bg-primary-100 dark:bg-primary-800 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Our Mission</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        To deliver cutting-edge real estate solutions through integrity, innovation, and customer excellence — providing quality short-let apartments, sustainable land and property investments, leasing, and real estate banking services that make ownership seamless and rewarding.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Our Core Values – TITAN</h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">At the heart of our business is TITAN, a set of values that define who we are and how we serve</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md text-center">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-xl font-bold text-primary-600 dark:text-primary-400">T</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Trust</h3>
                    <p class="text-gray-600 dark:text-gray-300">We build lasting relationships through honesty and transparency.</p>
                </div>
                
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md text-center">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-xl font-bold text-primary-600 dark:text-primary-400">I</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Innovation</h3>
                    <p class="text-gray-600 dark:text-gray-300">We embrace creativity and technology to stay ahead of the market.</p>
                </div>
                
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md text-center">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-xl font-bold text-primary-600 dark:text-primary-400">T</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Tenacity</h3>
                    <p class="text-gray-600 dark:text-gray-300">We relentlessly pursue excellence in every project and service.</p>
                </div>
                
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md text-center">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-xl font-bold text-primary-600 dark:text-primary-400">A</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Accountability</h3>
                    <p class="text-gray-600 dark:text-gray-300">We take responsibility for creating sustainable, long-term value.</p>
                </div>
                
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md text-center">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-xl font-bold text-primary-600 dark:text-primary-400">N</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Nurturing</h3>
                    <p class="text-gray-600 dark:text-gray-300">We empower people and strengthen communities for generational impact.</p>
                </div>
            </div>
        </div>
    </section>

        <!-- Team Section -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Meet Our Leadership Team</h2>
                <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    The visionaries driving Titan & Equity's mission to transform real estate across West Africa
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                <!-- Team Member 1: Managing Director -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:-translate-y-2 border border-gray-200 dark:border-gray-700 group">
                    <div class="relative h-80 overflow-hidden">
                        <img src="{{ asset('images/tobi.jpeg') }}"
                             alt="Adeoye Tobiloba"
                             class="w-full h-full object-cover object-top transition duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="w-12 h-12 bg-green-600 dark:bg-green-500 rounded-lg flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 md:p-8">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Adeoye Tobiloba</h3>
                        <p class="text-green-600 dark:text-green-400 font-semibold mb-4 text-lg">MD / CEO</p>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            With 5 years of solid finance experience, Tobi leads Titan with vision, clarity and data-driven approach, ensuring every decision strengthens our growth, integrity, and long-term value for clients.
                        </p>
                    </div>
                </div>

                <!-- Team Member 2: Chief Operating Officer -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:-translate-y-2 border border-gray-200 dark:border-gray-700 group">
                    <div class="relative h-80 overflow-hidden">
                        <img src="{{ asset('images/ade.jpeg') }}"
                             alt="Ajayi Mojeed"
                             class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                             onerror="this.style.display='none';document.getElementById('ade-fallback').style.display='flex'">
                        <div id="ade-fallback" style="display:none" class="w-full h-full bg-primary-700 items-center justify-center">
                            <span class="text-white font-bold" style="font-size:5rem">AM</span>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="w-12 h-12 bg-green-600 dark:bg-green-500 rounded-lg flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 md:p-8">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Ajayi Mojeed</h3>
                        <p class="text-green-600 dark:text-green-400 font-semibold mb-4 text-lg">Chief Operating Officer</p>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Mojeed has coordinated over 50 end-to-end operations workflows, improving efficiency and ensuring every client gets a smooth, professional experience.
                        </p>
                    </div>
                </div>

                <!-- Team Member 3: Chief Marketing Officer -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:-translate-y-2 border border-gray-200 dark:border-gray-700 md:col-span-2 lg:col-span-1 group">
                    <div class="relative h-80 overflow-hidden">
                        <img src="{{ asset('images/fola.jpeg') }}"
                             alt="Ajayi Folahanmi"
                             class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                             onerror="this.style.display='none';document.getElementById('fola-fallback').style.display='flex'">
                        <div id="fola-fallback" style="display:none" class="w-full h-full bg-primary-800 items-center justify-center">
                            <span class="text-white font-bold" style="font-size:5rem">AF</span>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="w-12 h-12 bg-green-600 dark:bg-green-500 rounded-lg flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 md:p-8">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Ajayi Folahanmi</h3>
                        <p class="text-green-600 dark:text-green-400 font-semibold mb-4 text-lg">Chief Marketing Officer</p>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Folahanmi has acquired over 45 clients through strategic marketing campaigns, strengthening Titan's visibility, credibility, and connection with both local and international audiences.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Why Choose Titan & Equity</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Proven Expertise</h3>
                    <p class="text-gray-600 dark:text-gray-300">A team with strong backgrounds in real estate, finance, and property management.</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Comprehensive Services</h3>
                    <p class="text-gray-600 dark:text-gray-300">From short-lets to investments, we cover every stage of the property journey.</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Customer-Centric Approach</h3>
                    <p class="text-gray-600 dark:text-gray-300">Tailored solutions designed around your goals and lifestyle.</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Future-Ready Systems</h3>
                    <p class="text-gray-600 dark:text-gray-300">Technology-driven processes for seamless transactions and transparency.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-green-700 dark:bg-green-800">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-white mb-6">Your Future, Our Commitment</h2>
            <p class="text-xl text-white mb-8 max-w-3xl mx-auto">
                At Titan & Equity, every home, every plot, and every transaction is part of a bigger picture — a future where real estate is not just about buildings but about transforming lives and communities.
            </p>
            <a href="{{ route('contact') }}" class="bg-white text-green-700 hover:bg-gray-100 font-medium py-3 px-8 rounded-lg transition duration-300 inline-flex items-center mx-auto">
                Get In Touch
                <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </section>
</x-app-layout>