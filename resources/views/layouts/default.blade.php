<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Titan Real Estate</title>
  @vite(['resources/css/app.css', 'resources/css/app.css'])
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="icon" type="icon" href="{{ asset('images/icon.jpg') }}">
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
      <a href="#" class="text-xl font-bold text-green-900">Titan Logo</a>

      <!-- Desktop Menu -->
      <nav class="hidden md:flex items-center space-x-6">
        <a href="#" class="text-gray-700 hover:text-green-700">Home</a>
        <a href="#" class="text-gray-700 hover:text-green-700">About Us</a>

        <!-- Dropdown -->
        <div class="relative group">
          <button class="text-gray-700 hover:text-green-700 flex items-center">
            Our Services <i class="bi bi-chevron-down ml-1 text-sm"></i>
          </button>
          <div class="absolute left-0 mt-2 hidden w-40 bg-white shadow-lg rounded-md group-hover:block">
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Property Management</a>
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Shortlet</a>
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Land Sales</a>
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Property Sales</a>
          </div>
        </div>

        <!-- CTA -->
        <a href="#" class="px-4 py-2 bg-green-700 text-white rounded-lg shadow hover:bg-green-800 transition">
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
      <a href="#" class="block text-gray-700 hover:text-green-700">Home</a>
      <a href="#" class="block text-gray-700 hover:text-green-700">About Us</a>
      <a href="#" class="block text-gray-700 hover:text-green-700">Property Management</a>
      <a href="#" class="block text-gray-700 hover:text-green-700">Shortlet</a>
      <a href="#" class="block text-gray-700 hover:text-green-700">Land Sales</a>
      <a href="#" class="block text-gray-700 hover:text-green-700">Property Sales</a>
      <a href="#" class="block px-4 py-2 bg-green-700 text-white rounded-lg shadow hover:bg-green-800 transition">
        Book Now
      </a>
    </div>
  </header>

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

  <!-- Mobile Menu Toggle Script -->
  <script>
    const menuBtn = document.getElementById("menuBtn");
    const mobileMenu = document.getElementById("mobileMenu");

    menuBtn.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden");
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
</body>

</html>