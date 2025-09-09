@extends('layouts.default')

@section('maincontent')
<section class="bg-white py-20">
  <div class="max-w-6xl mx-auto px-6 lg:px-12 grid md:grid-cols-2 gap-12 items-center">

    <!-- Left Image -->
    <div>
      <img src="https://placehold.co/600x400" alt="Property Sales" class="rounded-xl shadow-lg">
    </div>

    <!-- Right Content -->
    <div>
      <h1 class="text-4xl md:text-5xl font-bold text-green-700 mb-6">Property Sales</h1>
      <p class="text-gray-700 mb-6 leading-relaxed">
        Titan & Equity connects buyers with premium residential and commercial properties that fit their goals and lifestyle. 
        Whether you’re buying your first home, a vacation property, or a commercial investment, we guide you through a transparent and seamless purchase process.
      </p>
      <ul class="space-y-3 text-gray-700">
        <li>✔ Verified residential & commercial listings</li>
        <li>✔ Transparent documentation & processes</li>
        <li>✔ Flexible financing & mortgage support</li>
        <li>✔ Expert guidance from search to purchase</li>
      </ul>
      <a href="{{ route('book') }}" class="inline-block mt-6 px-6 py-3 bg-green-700 text-white rounded-lg shadow hover:bg-green-800 transition">
        Explore Properties
      </a>
    </div>
  </div>
</section>
@endsection
