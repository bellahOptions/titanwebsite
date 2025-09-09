@extends('layouts.default')

@section('maincontent')
<section class="bg-white py-20">
  <div class="max-w-6xl mx-auto px-6 lg:px-12 grid md:grid-cols-2 gap-12 items-center">

    <!-- Left Image -->
    <div>
      <img src="https://placehold.co/600x400" alt="Shortlet Apartments" class="rounded-xl shadow-lg">
    </div>

    <!-- Right Content -->
    <div>
      <h1 class="text-4xl md:text-5xl font-bold text-green-700 mb-6">Shortlet Apartments</h1>
      <p class="text-gray-700 mb-6 leading-relaxed">
        Discover comfort, convenience, and luxury with our short-let apartment services. Whether you’re traveling for business, leisure, or relocation, 
        Titan & Equity offers fully furnished apartments designed for modern living and hospitality.
      </p>
      <ul class="space-y-3 text-gray-700">
        <li>✔ Prime city locations</li>
        <li>✔ Fully furnished & serviced</li>
        <li>✔ Flexible stays (daily, weekly, monthly)</li>
        <li>✔ 24/7 customer support</li>
      </ul>
      <a href="{{ route('book') }}" class="inline-block mt-6 px-6 py-3 bg-green-700 text-white rounded-lg shadow hover:bg-green-800 transition">
        Book a Stay
      </a>
    </div>
  </div>
</section>
@endsection
