@extends('layouts.default')
@section('title', 'Home')
@section('maincontent')
  <!-- Hero Section -->
 <div class="bg-white py-20 text-center" data-aos="fade-up">
  <div class="max-w-4xl mx-auto px-4">
    <h1 class="text-3xl md:text-5xl font-bold text-[#007C06]" data-aos="fade-down">
      Find Your Perfect Property with Titan &amp; Equity Resources Limited
    </h1>
    <p class="mt-4 text-lg text-gray-700" data-aos="fade-up" data-aos-delay="200">
      Your trusted partner for real estate sales, rentals, and investment opportunities.
    </p>
       <div class="mt-6 flex justify-center gap-4" data-aos="zoom-in" data-aos-delay="400">
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
    <div class="swiper mySwiper mt-10">
      <div class="swiper-wrapper">
        @foreach(\App\Models\Property::where('featured', 1)->get() as $property)
        <div class="swiper-slide">
          <div class="bg-white rounded-lg shadow overflow-hidden">
            <img src="{{ $property->image }}" alt="{{ $property->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-lg">{{ $property->name }}</h3>
              <p class="text-gray-600 text-sm">{{ $property->address }}</p>
              <p class="text-green-700 font-bold mt-2">₦{{ number_format($property->listing_price, 0) }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Navigation Arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>
</section>
<!-- About Section -->
<section class="bg-green-50 my-20 py-20" data-aos="fade-right">
  <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 px-6 lg:px-12 items-center">
    <div data-aos="fade-right">
      <h2 class="text-4xl md:text-5xl font-bold text-green-700 mb-6">Who We Are</h2>
      <p class="text-gray-700 mb-6 leading-relaxed">
        Titan & Equity Resources Limited is a registered real estate company dedicated to helping you own, lease, or invest in properties with confidence. We combine industry expertise with integrity and innovation to deliver lasting value for our clients.
      </p>

      <!-- Core Values -->
      <h3 class="text-xl font-semibold text-green-700 mb-4">Our Core Values</h3>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        
        <!-- Value Item -->
        <div class="p-5 bg-white rounded-xl shadow hover:shadow-lg transition text-center">
          <div class="mx-auto mb-3 text-green-600">
            <!-- Shield Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
            </svg>
          </div>
          <h4 class="text-lg font-semibold">Trust & Transparency</h4>
        </div>

        <!-- Value Item -->
        <div class="p-5 bg-white rounded-xl shadow hover:shadow-lg transition text-center">
          <div class="mx-auto mb-3 text-green-600">
            <!-- Users Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-3.87M9 20h6M7 10a4 4 0 118 0v2a4 4 0 01-8 0v-2z" />
            </svg>
          </div>
          <h4 class="text-lg font-semibold">Customer Focused</h4>
        </div>

        <!-- Value Item -->
        <div class="p-5 bg-white rounded-xl shadow hover:shadow-lg transition text-center">
          <div class="mx-auto mb-3 text-green-600">
            <!-- Star Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l2.286 7.06h7.42c.969 0 1.371 1.24.588 1.81l-6 4.36 2.285 7.06c.3.922-.755 1.688-1.54 1.11L12 18.27l-6.99 5.057c-.784.578-1.838-.188-1.54-1.11l2.286-7.06-6-4.36c-.783-.57-.38-1.81.588-1.81h7.42l2.285-7.06z" />
            </svg>
          </div>
          <h4 class="text-lg font-semibold">Excellence</h4>
        </div>
      </div>

      <!-- CTA -->
      <a href="#contact" 
         class="inline-block px-6 py-3 border-2 border-green-700 text-green-700 rounded-lg text-lg font-medium hover:bg-green-700 hover:text-white transition">
        Read More About Us
      </a>
    </div>

    <!-- Right Content (Video) -->
    <div class="rounded-xl overflow-hidden shadow-lg" data-aos="fade-left" data-aos-delay="300">
      <iframe width="100%" height="350" class="w-full h-[315px] md:h-[400px]" 
              src="https://www.youtube.com/embed/j-13FuHfvxk?si=Ir0yyEP6o8VO9kv3" 
              title="YouTube video player" frameborder="0" 
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
              referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
      </iframe>
    </div>
  </div>
</section>

<!--How it works-->
<section class="w-full py-12 bg-gray-50" data-aos="fade-up">
  <h2 class="text-3xl font-bold text-center mb-10" data-aos="fade-up">Your Property Journey Made Easy</h2>
  <div class="flex items-center justify-between relative" data-aos="zoom-in">
      
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
<!-- Call to Action Section -->
<section class="w-full bg-green-600 py-16 my-20 text-white text-center" data-aos="zoom-in">
  <div class="max-w-4xl mx-auto px-4">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Find Your Next Property?</h2>
    <p class="text-lg mb-8">
      Let us help you make the right move today. Our team is always ready to assist with property purchases, leases, and inspections.
    </p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="#appointment" 
         class="px-6 py-3 bg-white text-green-600 font-semibold rounded-xl shadow-md hover:bg-gray-100 transition">
        Book Appointment
      </a>
      <a href="#contact" 
         class="px-6 py-3 border-2 border-white font-semibold rounded-xl hover:bg-white hover:text-blue-600 transition">
        Contact Us
      </a>
    </div>
  </div>
</section>

<!-- Trust Section -->
<section class="w-full my-20 bg-gray-50 py-16">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center mb-10">Why Choose Titan & Equity?</h2>
    <div class="grid gap-8 md:grid-cols-3">
      
      <!-- Trust Item -->
      <div class="bg-white p-6 rounded-2xl shadow-md text-center hover:shadow-lg transition">
        <div class="w-12 h-12 mx-auto flex items-center justify-center bg-blue-100 text-green-600 rounded-full mb-4">
          <!-- Shield Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
          </svg>
        </div>
        <h3 class="font-semibold text-lg mb-2">Registered & Compliant</h3>
        <p class="text-gray-600">We operate under full compliance with Nigerian real estate regulations.</p>
      </div>

      <!-- Trust Item -->
      <div class="bg-white p-6 rounded-2xl shadow-md text-center hover:shadow-lg transition">
        <div class="w-12 h-12 mx-auto flex items-center justify-center bg-blue-100 text-green-600 rounded-full mb-4">
          <!-- Home Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75L12 4l9 5.75V20a1 1 0 01-1 1h-6a1 1 0 01-1-1v-5H11v5a1 1 0 01-1 1H4a1 1 0 01-1-1V9.75z" />
          </svg>
        </div>
        <h3 class="font-semibold text-lg mb-2">Prime Properties</h3>
        <p class="text-gray-600">Choose from a wide range of properties across prime locations.</p>
      </div>

      <!-- Trust Item -->
      <div class="bg-white p-6 rounded-2xl shadow-md text-center hover:shadow-lg transition">
        <div class="w-12 h-12 mx-auto flex items-center justify-center bg-blue-100 text-green-600 rounded-full mb-4">
          <!-- Support Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636a9 9 0 11-12.728 0M12 3v9" />
          </svg>
        </div>
        <h3 class="font-semibold text-lg mb-2">Professional Support</h3>
        <p class="text-gray-600">From search to ownership, our team provides full guidance and assistance.</p>
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