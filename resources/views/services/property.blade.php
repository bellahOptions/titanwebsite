@extends('layouts.default')

@section('title', 'Property Management | Titan & Equity')

@section('maincontent')
<section class="relative bg-green-50 py-20">
  <div class="container mx-auto px-6 lg:px-12 text-center">
    <h1 class="text-4xl md:text-5xl font-bold text-green-800 mb-4">Seamless Property Management</h1>
    <p class="text-lg md:text-xl text-gray-700 max-w-2xl mx-auto">
      At Titan & Equity, we manage your properties with integrity, innovation, and care — ensuring peace of mind and profitable returns.
    </p>
  </div>
</section>

<section class="py-16 bg-white">
  <div class="container mx-auto px-6 lg:px-12 grid md:grid-cols-2 gap-12 items-center">
    <div>
      <img src="https://african.land/book-a-zoom-meeting" alt="Property Management" class="rounded-2xl shadow-lg">
    </div>
    <div>
      <h2 class="text-3xl font-bold text-green-800 mb-6">Why Choose Our Property Management?</h2>
      <p class="text-gray-700 mb-6">
        We provide complete property management solutions that ensure your investment is well-protected, tenants are satisfied, and your returns are optimized. From rent collection to maintenance and reporting, we handle everything on your behalf.
      </p>
      <ul class="space-y-3">
        <li class="flex items-start">
          <span class="w-6 h-6 bg-green-100 text-green-700 flex items-center justify-center rounded-full mr-3">✓</span>
          Tenant acquisition and screening
        </li>
        <li class="flex items-start">
          <span class="w-6 h-6 bg-green-100 text-green-700 flex items-center justify-center rounded-full mr-3">✓</span>
          Rent collection and financial reporting
        </li>
        <li class="flex items-start">
          <span class="w-6 h-6 bg-green-100 text-green-700 flex items-center justify-center rounded-full mr-3">✓</span>
          Regular property maintenance and inspections
        </li>
        <li class="flex items-start">
          <span class="w-6 h-6 bg-green-100 text-green-700 flex items-center justify-center rounded-full mr-3">✓</span>
          Legal and compliance support
        </li>
      </ul>
    </div>
  </div>
</section>

<section class="py-16 bg-green-50 text-center">
  <h2 class="text-3xl font-bold text-green-800 mb-4">Ready to Maximize Your Property Returns?</h2>
  <p class="text-gray-700 mb-6">Partner with Titan & Equity today and let us handle your property the professional way.</p>
  <a href="{{ route('book') }}"
     class="px-6 py-3 bg-green-700 text-white rounded-lg shadow hover:bg-green-800 transition">
    Book a Consultation
  </a>
</section>
@endsection
