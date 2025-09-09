@extends('layouts.default')

@section('maincontent')
  <!-- Hero Section -->
  <div class="bg-white py-20 text-center">
    <div class="max-w-4xl mx-auto px-4">
      <h1 class="text-3xl md:text-5xl font-bold text-[#007C06]">
        Find Your Perfect Property with Titan &amp; Equity Resources Limited
      </h1>
      <p class="mt-4 text-lg text-gray-700">
        Your trusted partner for real estate sales, rentals, and investment opportunities.
      </p>

      <div class="mt-6 flex justify-center gap-4">
        <a href="#properties"
          class="px-6 py-3 bg-[#007C06] text-white rounded-lg text-lg font-medium hover:bg-green-700 transition">
          Browse Properties
        </a>
        <a href="#contact"
          class="px-6 py-3 border-2 border-[#007C06] text-[#007C06] rounded-lg text-lg font-medium hover:bg-[#007C06] hover:text-white transition">
          Book an Inspection
        </a>
      </div>

      <p class="mt-6 text-gray-500 max-w-2xl mx-auto">
        From premium short-let apartments to verified land and property sales, we help you secure
        real estate that works for you.
      </p>
    </div>
  </div>


  <!--Featured Listings-->
  <section class="py-15">
    <div class="container mx-auto px-4">
      <h2 class="text-2xl font-bold mb-6 text-center">Featured Properties</h2>
      <p class="text-center">Browse our latest listings for residential, commercial, and investment opportunities.</p>
      <!-- Slider Container -->
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <!-- Property Card 1 -->
          <div class="swiper-slide">
            <div class="bg-white rounded-lg shadow overflow-hidden">
              <img src="https://placehold.co/400x250" alt="Property" class="w-full h-48 object-cover">
              <div class="p-4">
                <h3 class="font-semibold text-lg">Luxury Apartment</h3>
                <p class="text-gray-600 text-sm">Ibeju-Lekki, Lagos</p>
                <p class="text-green-700 font-bold mt-2">₦15,000,000</p>
              </div>
            </div>
          </div>

          <!-- Property Card 2 -->
          <div class="swiper-slide">
            <div class="bg-white rounded-lg shadow overflow-hidden">
              <img src="https://placehold.co/400x250" alt="Property" class="w-full h-48 object-cover">
              <div class="p-4">
                <h3 class="font-semibold text-lg">Modern Duplex</h3>
                <p class="text-gray-600 text-sm">Lekki Phase 1</p>
                <p class="text-green-700 font-bold mt-2">₦65,000,000</p>
              </div>
            </div>
          </div>

          <!-- Property Card 3 -->
          <div class="swiper-slide">
            <div class="bg-white rounded-lg shadow overflow-hidden">
              <img src="https://placehold.co/400x250" alt="Property" class="w-full h-48 object-cover">
              <div class="p-4">
                <h3 class="font-semibold text-lg">Beachfront Plot</h3>
                <p class="text-gray-600 text-sm">Victoria Island</p>
                <p class="text-green-700 font-bold mt-2">₦120,000,000</p>
              </div>
            </div>
          </div>

          <!-- Property Card 4 -->
          <div class="swiper-slide">
            <div class="bg-white rounded-lg shadow overflow-hidden">
              <img src="https://placehold.co/400x250" alt="Property" class="w-full h-48 object-cover">
              <div class="p-4">
                <h3 class="font-semibold text-lg">Serviced Apartment</h3>
                <p class="text-gray-600 text-sm">Ajah, Lagos</p>
                <p class="text-green-700 font-bold mt-2">₦9,500,000</p>
              </div>
            </div>
          </div>

          <!-- Property Card 5 -->
          <div class="swiper-slide">
            <div class="bg-white rounded-lg shadow overflow-hidden">
              <img src="https://placehold.co/400x250" alt="Property" class="w-full h-48 object-cover">
              <div class="p-4">
                <h3 class="font-semibold text-lg">Penthouse Suite</h3>
                <p class="text-gray-600 text-sm">Ikoyi, Lagos</p>
                <p class="text-green-700 font-bold mt-2">₦250,000,000</p>
              </div>
            </div>
          </div>

          <!-- Property Card 6 -->
          <div class="swiper-slide">
            <div class="bg-white rounded-lg shadow overflow-hidden">
              <img src="https://placehold.co/400x250" alt="Property" class="w-full h-48 object-cover">
              <div class="p-4">
                <h3 class="font-semibold text-lg">Cozy Bungalow</h3>
                <p class="text-gray-600 text-sm">Sangotedo</p>
                <p class="text-green-700 font-bold mt-2">₦7,000,000</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Navigation Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </section>
<!--Aboiut section-->
<section class="grid grid-cols-2 bg-green-100 gap-4 my-10 py-20 p-10 h-full px-10">
      <div class="container mx-auto px-4">
      <h2 class="text-5xl text-green-700 font-bold mb-6">Who we are</h2>
      <p class="mb-6">Titan & Equity Resources Limited is a registered real estate company dedicated to helping you own, lease, or invest in properties with confidence. We combine industry expertise with integrity and innovation to deliver lasting value for our clients.</p>

      <div class="mt-2">
        <h2 class="text-lg font-bold text-green-700">Core Values</h2>
        <div class="flex place-items-center gap-4 mb-6">
      <span class="p-4 rounded-lg text-sm shadow-md opacity-40 text-center">
        <div class="" id="icon"> Icon here</div>
        <h3 class="text-lg font-semibold" id="core-title">Trust & Transparency</h3>
        </span>
        <span class="p-4 rounded-lg shadow-md opacity-40 text-center">
        <div class="" id="icon"> Icon here</div>
        <h3 class="text-lg font-semibold" id="core-title">Customer Focused</h3>
        </span>
        <span class="p-4 rounded-lg shadow-md opacity-40 text-center">
        <div class="" id="icon"> Icon here</div>
        <h3 class="text-lg font-semibold" id="core-title">Excellence</h3>
        </span>
      </div>

      <a href="#contact" class="px-6 py-3 mt-6 border-2 border-[#007C06] text-[#007C06] rounded-lg text-lg font-medium hover:bg-[#007C06] hover:text-white transition">
          Read more about us
        </a>
    </div>
    </div>
    <div class="space-4 px-4">
      <iframe width="560" height="315" class="rounded-lg" src="https://www.youtube.com/embed/j-13FuHfvxk?si=Ir0yyEP6o8VO9kv3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
</section>
<!--How it works-->
<section class="w-full py-12 bg-gray-50">
  <div class="max-w-6xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-10">Your Property Journey Made Easy</h2>

    <div class="flex items-center justify-between relative">
      
      <!-- Step 1 -->
      <div class="flex flex-col items-center w-1/3 text-center">
        <div class="w-16 h-16 flex items-center justify-center bg-green-600 text-white rounded-full text-xl font-bold shadow-lg">
          1
        </div>
        <h3 class="mt-4 font-semibold text-lg">Browse Properties</h3>
        <p class="text-gray-600">Explore our wide selection.</p>
      </div>

      <!-- Arrow -->
      <div class="flex-1 flex justify-center relative">
        <div class="w-20 h-1 bg-green-300 relative overflow-hidden">
          <div class="absolute left-0 top-0 h-full w-full bg-green-600 animate-slide"></div>
        </div>
        <svg class="w-6 h-6 text-green-600 absolute -right-3 top-1/2 -translate-y-1/2" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </div>

      <!-- Step 2 -->
      <div class="flex flex-col items-center w-1/3 text-center">
        <div class="w-16 h-16 flex items-center justify-center bg-green-600 text-white rounded-full text-xl font-bold shadow-lg">
          2
        </div>
        <h3 class="mt-4 font-semibold text-lg">Book an Inspection</h3>
        <p class="text-gray-600">Schedule a visit at your convenience.</p>
      </div>

      <!-- Arrow -->
      <div class="flex-1 flex justify-center relative">
        <div class="w-20 h-1 bg-green-300 relative overflow-hidden">
          <div class="absolute left-0 top-0 h-full w-full bg-green-600 animate-slide"></div>
        </div>
        <svg class="w-6 h-6 text-green-600 absolute -right-3 top-1/2 -translate-y-1/2" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </div>

      <!-- Step 3 -->
      <div class="flex flex-col items-center w-1/3 text-center">
        <div class="w-16 h-16 flex items-center justify-center bg-green-600 text-white rounded-full text-xl font-bold shadow-lg">
          3
        </div>
        <h3 class="mt-4 font-semibold text-lg">Close the Deal</h3>
        <p class="text-gray-600">Secure your property with ease and confidence.</p>
      </div>

    </div>
  </div>
</section>

<!-- Custom Animation -->
<style>
@keyframes slide {
  from { transform: translateX(-100%); }
  to { transform: translateX(100%); }
}
.animate-slide {
  animation: slide 2s linear infinite;
}
</style>

@endsection