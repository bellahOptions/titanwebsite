@extends('layouts.default')

@section('maincontent')
<section class="bg-green-50 py-20">
  <div class="max-w-6xl mx-auto px-6 lg:px-12 grid md:grid-cols-2 gap-12 items-center">

    <!-- Left Content -->
    <div>
      <h1 class="text-4xl md:text-5xl font-bold text-green-700 mb-6">Land Sales & Investments</h1>
      <p class="text-gray-700 mb-6 leading-relaxed">
        Secure your future with Titan & Equity’s verified land sales. We provide access to carefully selected plots across prime and emerging locations in Nigeria and West Africa. 
        Our goal is to help you build generational wealth through safe, sustainable land investments.
      </p>
      <ul class="space-y-3 text-gray-700">
        <li>✔ Verified & documented plots</li>
        <li>✔ Strategic urban & suburban locations</li>
        <li>✔ Flexible payment plans</li>
        <li>✔ Guaranteed returns on investment</li>
      </ul>
      <a href="{{ route('book') }}" class="inline-block mt-6 px-6 py-3 bg-green-700 text-white rounded-lg shadow hover:bg-green-800 transition">
        Get Started
      </a>
    </div>

    <!-- Right Image -->
    <div>
      <img src="https://placehold.co/600x400" alt="Land Investments" class="rounded-xl shadow-lg">
    </div>
  </div>
</section>
@endsection
