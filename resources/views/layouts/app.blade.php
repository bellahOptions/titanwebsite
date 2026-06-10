<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('dark_mode') ? 'dark' : '' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SEO Meta Tags -->
    <meta name="title" content="Titan Resources - Real Estate & Property in Nigeria">
    <meta name="description" content="Shortlet Apartments, Find your dream property in Nigeria. Titan Resources offers prime real estate, land, and properties for sale and rent across Lagos, Abuja, and beyond.">
    <meta name="keywords" content="shortlet apartment, airbnb in lagos, real estate Nigeria, property for sale Nigeria, land for sale Lagos, houses for rent Abuja, Nigerian property">

    <!-- Theme Colors -->
    <meta name="theme-color" content="#22c55e" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#15803d" media="(prefers-color-scheme: dark)">
    <meta name="msapplication-navbutton-color" content="#22c55e">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://titanresources.com/">
    <meta property="og:title" content="Titan Resources - Real Estate & Property in Nigeria">
    <meta property="og:description" content="Find your dream property in Nigeria. Prime real estate, land, and properties for sale and rent.">
    <meta property="og:image" content="https://titanresources.com/images/og-image.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://titanresources.com/">
    <meta property="twitter:title" content="Titan Resources - Real Estate & Property in Nigeria">
    <meta property="twitter:description" content="Find your dream property in Nigeria. Prime real estate, land, and properties for sale and rent.">
    <meta property="twitter:image" content="https://titanresources.com/images/twitter-image.jpg">

    <!-- External Libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        .swiper-pagination-bullet { background-color: #22c55e; opacity: 0.6; }
        .swiper-pagination-bullet-active { background-color: #22c55e; opacity: 1; }
        .swiper-button-next, .swiper-button-prev { color: #22c55e; }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Montserrat:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Title -->
    <title>@hasSection('title')
            @yield('title') | Titan and Equity Resources Limited
        @else
            Titan and Equity Resources Limited - Real Estate & Property in Nigeria
        @endif
    </title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon.jpg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3P1STD8EXB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-3P1STD8EXB');
    </script>

    @stack('styles')
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 transition-colors duration-300">
    <div class="min-h-screen flex flex-col">
        @include('layouts.navigation')
        
        <!-- Page Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>
        
        @include('layouts.footer')
    </div>
    
    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="fixed bottom-24 right-6 bg-primary-600 hover:bg-primary-700 text-white p-3 rounded-full shadow-lg transition-all duration-300 opacity-0 invisible hover:scale-110 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-800 z-40">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- WhatsApp Widget -->
    <script>
        var url = 'https://cdn.waplus.io/waplus-crm/settings/ossembed.js';
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url;
        var options = {
            "enabled": true,
            "chatButtonSetting": {
                "backgroundColor": "#16BE45",
                "ctaText": "Message Us",
                "borderRadius": "12",
                "marginLeft": "20",
                "marginBottom": "20",
                "marginRight": "20",
                "position": "right",
                "textColor": "#ffffff",
                "phoneNumber": "+2349115008562",
                "messageText": "👋🏻 Hello, I am from your website.",
                "trackClick": true
            }
        }
        s.onload = function() {
            CreateWhatsappBtn(options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    </script>

    <!-- Scroll to Top Functionality -->
    <script>
        const scrollToTopBtn = document.getElementById('scrollToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.remove('opacity-0', 'invisible');
                scrollToTopBtn.classList.add('opacity-100', 'visible');
            } else {
                scrollToTopBtn.classList.add('opacity-0', 'invisible');
                scrollToTopBtn.classList.remove('opacity-100', 'visible');
            }
        });
        
        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

    @stack('scripts')
    @livewireScripts
</body>
</html>