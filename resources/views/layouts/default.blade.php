<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> @hasSection('title')
            @yield('title') | Titan and Equity Resources Limited
        @else
            Bellah Options
        @endif</title>
  @vite(['resources/css/app.css', 'resources/css/app.css'])
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="icon" type="icon" href="{{ asset('images/icon.jpg') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style type="text/css">
  *{
    font-family: 'Montserrat', ui-sans-serif, system-ui, apple-system, BlinkMacSystemFont;
  }
</style>
<body>

  <!-- Navbar -->
<header class="bg-white shadow">
    <div class="container mx-auto flex items-center justify-between px-4 py-4">
        <!-- Logo -->


        <!-- Desktop Menu -->
        <nav class="hidden md:flex items-center space-x-6">
            <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-700 {{ request()->routeIs('home') ? 'font-bold text-green-700' : '' }}">
                Home
            </a>
            <a href="{{ route('about') }}" class="text-gray-700 hover:text-green-700 {{ request()->routeIs('about') ? 'font-bold text-green-700' : '' }}">
                About Us
            </a>
              <!-- Properties -->
    <a href="{{ route('properties.index') }}" class="text-gray-700 hover:text-green-700 {{ request()->routeIs('properties.index') ? 'font-bold text-green-700' : '' }}">
        Properties
    </a>

<!-- Dropdown (Click to Toggle) -->
<div x-data="{ open: false }" class="relative z-50"> <!-- Added z-50 -->
    <button 
        @click="open = !open" 
        class="text-gray-700 hover:text-green-700 flex items-center"
        id="drop-button" 
    >
        Our Services 
        <i class="bi bi-chevron-down ml-1 text-sm"></i>
    </button>

    <div 
        x-show="open" 
        @click.away="open = false" 
        x-transition 
        class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md z-50"
        id="drop-menu" 
    >
        <a href="{{ route('services.property') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Property Management</a>
        <a href="{{ route('services.shortlet') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Shortlet</a>
        <a href="{{ route('services.land') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Land Sales</a>
        <a href="{{ route('services.propertysales') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Property Sales</a>
    </div>
</div>
<a href="{{ route('blog') }}" class="text-gray-700 hover:text-green-700 {{ request()->routeIs('about') ? 'font-bold text-green-700' : '' }}">
                Blog & News
            </a>

            <!-- CTA -->
            <a href="{{ route('book') }}" class="px-4 py-2 bg-green-700 text-white rounded-lg shadow hover:bg-green-800 transition">
                Book Now
            </a>
        </nav>

        <!-- Mobile Menu Button -->
        <button id="menuBtn" class="md:hidden text-gray-700">
            <i class="bi bi-list text-2xl"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-gray-100 px-4 py-3 space-y-2">
        <a href="{{ route('home') }}" class="block text-gray-700 hover:text-green-700">Home</a>
        <a href="{{ route('about') }}" class="block text-gray-700 hover:text-green-700">About Us</a>
        <a href="{{ route('properties.index') }}" class="block text-gray-700 hover:text-green-700">Properties</a>
        <!-- Mobile Dropdown (flat links for simplicity) -->
        <div>
            <span class="block text-gray-800 font-semibold mt-2">Services</span>
            <a href="{{ route('services.property') }}" class="block pl-4 text-gray-700 hover:text-green-700">Property Management</a>
            <a href="{{ route('services.shortlet') }}" class="block pl-4 text-gray-700 hover:text-green-700">Shortlet</a>
            <a href="{{ route('services.land') }}" class="block pl-4 text-gray-700 hover:text-green-700">Land Sales</a>
            <a href="{{ route('services.propertysales') }}" class="block pl-4 text-gray-700 hover:text-green-700">Property Sales</a>
        </div>

        <a href="{{ route('book') }}" class="block px-4 py-2 bg-green-700 text-white rounded-lg shadow hover:bg-green-800 transition">
            Book Now
        </a>
    </div>
</header>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#drop-menu").hide();
      $("#drop-button").click(function(){        
      $("#drop-menu").show();
      });
      $("#drop-button").mouseleave(function(){        
      $("#drop-menu").hide();
      });
    })
  </script>

  <main role="main">
    @yield("maincontent")
  </main>
  <!-- Footer -->
  <footer class="text-white pt-10" style="background-color: #003207ff;">
    <div class="container mx-auto px-4">
      <div class="grid md:grid-cols-4 gap-8">

        <!-- Company Info -->
        <div>
          <h5 class="text-lg font-bold mb-3">TITAN</h5>
          <p class="mb-4 text-gray-200">
            Trusted real estate company in Ibeju-Lekki, Lagos.
            We specialize in short-let apartments, verified land sales,
            property management, and real estate investment solutions.
          </p>
          <div class="flex space-x-4">
            <a href="#"><i class="bi bi-facebook text-xl"></i></a>
            <a href="#"><i class="bi bi-instagram text-xl"></i></a>
            <a href="#"><i class="bi bi-linkedin text-xl"></i></a>
            <a href="#"><i class="bi bi-twitter text-xl"></i></a>
            <a href="#"><i class="bi bi-youtube text-xl"></i></a>
            <a href="#"><i class="bi bi-tiktok text-xl"></i></a>
          </div>
        </div>

        <!-- Home Links -->
        <div>
          <h6 class="text-lg font-bold mb-3">Home</h6>
          <ul class="space-y-2">
            <li><a href="#" class="hover:text-green-300">Home</a></li>
            <li><a href="#" class="hover:text-green-300">About Us</a></li>
            <li><a href="#" class="hover:text-green-300">Services</a></li>
            <li><a href="#" class="hover:text-green-300">Contact</a></li>
          </ul>
        </div>

        <!-- About Links -->
        <div>
          <h6 class="text-lg font-bold mb-3">About Us</h6>
          <ul class="space-y-2">
            <li><a href="#" class="hover:text-green-300">Story</a></li>
            <li><a href="#" class="hover:text-green-300">Creative Team</a></li>
            <li><a href="#" class="hover:text-green-300">Founders</a></li>
            <li><a href="#" class="hover:text-green-300">Careers</a></li>
          </ul>
        </div>

        <!-- Legal Links -->
        <div>
          <h6 class="text-lg font-bold mb-3">Links</h6>
          <ul class="space-y-2">
            <li><a href="#" class="hover:text-green-300">Terms of Use</a></li>
            <li><a href="#" class="hover:text-green-300">Privacy Policy</a></li>
            <li><a href="#" class="hover:text-green-300">Cookie Policy</a></li>
            <li><a href="#" class="hover:text-green-300">Terms & Conditions</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="text-center py-4 mt-6" style="background-color: #007C06;">
      <small>© 2025. <span class="font-bold">Titan Real Estate</span> All rights reserved</small>
    </div>
  </footer>

<!-- Mobile Toggle Script -->
<script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

  <!-- SwiperJS Script -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    const swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        640: { slidesPerView: 2 },
        1024: { slidesPerView: 4 }
      }
    });
  </script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000, // animation duration (ms)
      once: true      // run only once
    });
  </script>
</body>

</html>