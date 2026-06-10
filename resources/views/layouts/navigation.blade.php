<nav x-data="{ open: false, scrolled: false }"
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
     :class="scrolled ? 'shadow-lg' : 'shadow-sm'"
     class="bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-800 sticky top-0 z-50 transition-all duration-300">

    <!-- Top Contact Bar -->
    <div class="hidden lg:block bg-gradient-to-r from-primary-900 via-primary-800 to-primary-900 dark:from-primary-950 dark:via-primary-900 dark:to-primary-950 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-2.5">
                <!-- Contact Information -->
                <div class="flex items-center space-x-6 text-sm">
                    <a href="mailto:titanrealtyltd@gmail.com" 
                       class="flex items-center gap-2 hover:text-yellow-400 transition-colors duration-200 group">
                        <i class="fas fa-envelope text-yellow-400 group-hover:scale-110 transition-transform"></i>
                        <span class="hidden xl:inline text-white">titanrealtyltd@gmail.com</span>
                    </a>
                    <span class="flex items-center gap-2 hover:text-yellow-400 transition-colors duration-200 group">
                        <i class="fas fa-map-marker-alt text-yellow-400 group-hover:scale-110 transition-transform"></i>
                        <span class="hidden xl:inline">9 Olaoye Segun Str, Ibeju-Lekki, Lagos</span>
                    </span>
                    <a href="tel:+2349115008562" 
                       class="flex items-center text-white gap-2 hover:text-yellow-400 transition-colors duration-200 group">
                        <i class="fas fa-phone text-yellow-400 group-hover:scale-110 transition-transform"></i>
                        <span>+234 911 500 8562</span>
                    </a>
                </div>

                <!-- Social Media Links -->
                <div class="flex items-center space-x-3">
                    <a href="https://web.facebook.com/people/Titan-Equity-Resources-Ltd/100089332275933/" 
                       target="_blank"
                       rel="noopener noreferrer"
                       class="w-8 h-8 flex items-center justify-center rounded-full bg-primary-800 hover:bg-yellow-400 text-white hover:text-primary-900 transition-all duration-300 hover:scale-110"
                       aria-label="Facebook">
                        <i class="fab fa-facebook-f text-sm"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/titan-and-equity-resources-ltd/" 
                       target="_blank"
                       rel="noopener noreferrer"
                       class="w-8 h-8 flex items-center justify-center rounded-full bg-primary-800 hover:bg-yellow-400 text-white hover:text-primary-900 transition-all duration-300 hover:scale-110"
                       aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in text-sm"></i>
                    </a>
                    <a href="https://x.com/titanequityltd?s=21" 
                       target="_blank"
                       rel="noopener noreferrer"
                       class="w-8 h-8 flex items-center justify-center rounded-full bg-primary-800 hover:bg-yellow-400 text-white hover:text-primary-900 transition-all duration-300 hover:scale-110"
                       aria-label="Twitter">
                        <i class="fab fa-twitter text-sm"></i>
                    </a>
                    <a href="https://snapchat.com/t/ImzmHHXN" 
                       target="_blank"
                       rel="noopener noreferrer"
                       class="w-8 h-8 flex items-center justify-center rounded-full bg-primary-800 hover:bg-yellow-400 text-white hover:text-primary-900 transition-all duration-300 hover:scale-110"
                       aria-label="Snapchat">
                        <i class="fab fa-snapchat text-sm"></i>
                    </a>
                    <a href="https://youtube.com/@titanequityresourcesltd?si=yRhfLi4QcHwLs8Q9" 
                       target="_blank"
                       rel="noopener noreferrer"
                       class="w-8 h-8 flex items-center justify-center rounded-full bg-primary-800 hover:bg-yellow-400 text-white hover:text-primary-900 transition-all duration-300 hover:scale-110"
                       aria-label="YouTube">
                        <i class="fab fa-youtube text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('images/titan-color.svg') }}" 
                         alt="Titan & Equity Resources Limited" 
                         class="h-9 w-auto block dark:hidden transition-transform duration-300 group-hover:scale-105">
                    <img src="{{ asset('images/log-col.svg') }}" 
                         alt="Titan & Equity Resources Limited" 
                         class="h-12 w-auto hidden dark:block transition-transform duration-300 group-hover:scale-105">
                </a>
            </div>

            <!-- Desktop Navigation Links -->
            <div class="hidden lg:flex items-center space-x-1">
                <a href="{{ route('home') }}" 
                   class="px-4 py-2 text-sm font-semibold rounded-lg {{ request()->routeIs('home') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20' : 'text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} transition-all duration-200">
                    Home
                </a>
                <a href="{{ route('about') }}" 
                   class="px-4 py-2 text-sm font-semibold rounded-lg {{ request()->routeIs('about') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20' : 'text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} transition-all duration-200">
                    About
                </a>
                <a href="{{ route('services') }}" 
                   class="px-4 py-2 text-sm font-semibold rounded-lg {{ request()->routeIs('services') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20' : 'text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} transition-all duration-200">
                    Services
                </a>
                <a href="{{ route('properties.index') }}" 
                   class="px-4 py-2 text-sm font-semibold rounded-lg {{ request()->routeIs('properties.index') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20' : 'text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} transition-all duration-200">
                    Properties
                </a>
                <a href="{{ route('careers') }}" 
                   class="px-4 py-2 text-sm font-semibold rounded-lg {{ request()->routeIs('careers') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20' : 'text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} transition-all duration-200">
                    Careers
                </a>
                <a href="{{ route('blog.index') }}" 
                   class="px-4 py-2 text-sm font-semibold rounded-lg {{ request()->routeIs('blog.index') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20' : 'text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} transition-all duration-200">
                    Blog
                </a>
                <a href="{{ route('contact') }}" 
                   class="px-4 py-2 text-sm font-semibold rounded-lg {{ request()->routeIs('contact') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20' : 'text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} transition-all duration-200">
                    Contact
                </a>
            </div>

            <!-- Right Side Actions -->
            <div class="hidden lg:flex items-center space-x-3">
                @if(auth()->check() && auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}" 
                       class="px-4 py-2 text-sm font-semibold text-white bg-primary-600 hover:bg-primary-700 rounded-lg transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                        Admin Dashboard
                    </a>
                @endif

                @auth
                    <!-- Email Verification Notice -->
                    @unless (Auth::user()->hasVerifiedEmail())
                        <div x-data="{ show: true }" 
                             x-show="show"
                             class="fixed top-20 right-4 max-w-md bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-400 p-4 rounded-lg shadow-lg z-50">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3 flex-1">
                                    <p class="text-sm text-yellow-800 dark:text-yellow-300">
                                        Please verify your email address. 
                                        <a href="{{ route('verification.notice') }}" 
                                           class="font-semibold underline hover:text-yellow-900 dark:hover:text-yellow-200">
                                            Click here
                                        </a>
                                    </p>
                                </div>
                                <button @click="show = false" 
                                        class="ml-3 flex-shrink-0 text-yellow-600 hover:text-yellow-800">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endunless

                    <!-- User Dropdown -->
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen"
                                class="flex items-center gap-2 px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 transition-transform duration-200" 
                                 :class="dropdownOpen ? 'rotate-180' : ''"
                                 fill="none" 
                                 stroke="currentColor" 
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="dropdownOpen"
                             @click.away="dropdownOpen = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 py-2 z-50">
                            <a href="{{ route('dashboard') }}" 
                               class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-primary-50 dark:hover:bg-primary-900/20 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Dashboard
                            </a>
                            <a href="{{ route('bookings.index') }}"
                               class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-primary-50 dark:hover:bg-primary-900/20 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                My Bookings
                            </a>
                            <div class="border-t border-gray-100 dark:border-gray-700 my-2"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" 
                       class="px-5 py-2.5 text-sm font-semibold text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 border-2 border-primary-300 dark:border-primary-700 hover:bg-primary-50 dark:hover:bg-primary-900/20 rounded-lg transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                        Login
                    </a>
                    <a href="{{ route('register') }}" 
                       class="px-5 py-2.5 text-sm font-semibold text-white bg-primary-600 hover:bg-primary-700 rounded-lg transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 shadow-lg shadow-primary-500/30">
                        Register
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex items-center lg:hidden">
                <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2.5 rounded-lg text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <svg class="h-6 w-6" 
                         :class="{'hidden': open, 'block': !open}"
                         fill="none" 
                         stroke="currentColor" 
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="h-6 w-6" 
                         :class="{'block': open, 'hidden': !open}"
                         fill="none" 
                         stroke="currentColor" 
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="lg:hidden border-t border-gray-100 dark:border-gray-800 bg-white dark:bg-gray-900">
        <div class="px-4 py-6 space-y-2">
            <!-- Navigation Links -->
            <a href="{{ route('home') }}" 
               class="block px-4 py-3 text-base font-semibold rounded-lg {{ request()->routeIs('home') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20' : 'text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} transition-colors">
                Home
            </a>
            <a href="{{ route('about') }}" 
               class="block px-4 py-3 text-base font-semibold rounded-lg {{ request()->routeIs('about') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20' : 'text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} transition-colors">
                About
            </a>
            <a href="{{ route('services') }}" 
               class="block px-4 py-3 text-base font-semibold rounded-lg {{ request()->routeIs('services') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20' : 'text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} transition-colors">
                Services
            </a>
            <a href="{{ route('properties.index') }}" 
               class="block px-4 py-3 text-base font-semibold rounded-lg {{ request()->routeIs('properties.index') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20' : 'text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} transition-colors">
                Properties
            </a>
            <a href="{{ route('careers') }}" 
               class="block px-4 py-3 text-base font-semibold rounded-lg {{ request()->routeIs('careers') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20' : 'text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} transition-colors">
                Careers
            </a>
            <a href="{{ route('blog.index') }}" 
               class="block px-4 py-3 text-base font-semibold rounded-lg {{ request()->routeIs('blog.index') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20' : 'text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} transition-colors">
                Blog
            </a>
            <a href="{{ route('contact') }}" 
               class="block px-4 py-3 text-base font-semibold rounded-lg {{ request()->routeIs('contact') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20' : 'text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} transition-colors">
                Contact
            </a>
        </div>

        <!-- Mobile User Section -->
        <div class="border-t border-gray-200 dark:border-gray-700 px-4 py-6">
            @auth
                <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                    <div class="font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">{{ Auth::user()->email }}</div>
                </div>

                <div class="space-y-2">
                    @if(auth()->check() && auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}"
                           class="block px-4 py-3 text-base font-semibold text-white bg-primary-600 hover:bg-primary-700 rounded-lg transition-colors">
                            Admin Dashboard
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}"
                           class="block px-4 py-3 text-base font-semibold text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg transition-colors">
                            Dashboard
                        </a>
                    @endif
                    <a href="{{ route('bookings.index') }}"
                       class="block px-4 py-3 text-base font-semibold text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg transition-colors">
                        My Bookings
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full px-4 py-3 text-base font-semibold text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors text-left">
                            Log Out
                        </button>
                    </form>
                </div>
            @else
                <div class="space-y-3">
                    <a href="{{ route('login') }}" 
                       class="block w-full px-4 py-3 text-center text-base font-semibold text-primary-600 dark:text-primary-400 border-2 border-primary-300 dark:border-primary-700 hover:bg-primary-50 dark:hover:bg-primary-900/20 rounded-lg transition-colors">
                        Login
                    </a>
                    <a href="{{ route('register') }}" 
                       class="block w-full px-4 py-3 text-center text-base font-semibold text-white bg-primary-600 hover:bg-primary-700 rounded-lg transition-colors shadow-lg shadow-primary-500/30">
                        Register
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>