@extends('layouts.default')

@section('maincontent')
  <!---Hero/Slide-->
  <div class="hero py-15 text-center h-100 pt-50">
    <div class="container">
      <h1 class="text-2xl">Find Your Perfect Property with Titan & Equity Resources Limited</h1>
      <p class="lead">Your trusted partner for real estate sales, rentals, and investment opportunities.</p>
      <a href="#properties" class="btn btn-success text-white btn-lg m-2"> Browse Properties</a> | <a href="#properties"
        class="btn btn-outline-success    btn-lg m-2"> Get in Touch </a>
      <p class="text-muted">From premium short-let apartments to verified land and property sales, we help you secure real
        estate that works for you.</p>
    </div>
  </div>

  <!--Featured Listings-->
  <section class="py-10">
    <div class="container mx-auto px-4">
      <h2 class="text-2xl font-bold mb-6 text-center">Featured Properties</h2>

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

@endsection