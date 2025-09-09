@extends('layouts.default')
@section('title', 'About')
@section('maincontent')
<!-- Hero Section -->
<section class="bg-green-600 py-20 text-center text-white">
  <div class="max-w-4xl mx-auto px-6">
    <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up">
      About Titan & Equity Resources Limited
    </h1>
    <p class="text-lg opacity-90" data-aos="fade-up" data-aos-delay="200">
      Architects of opportunity. Builders of legacy. Shaping the future of real estate in West Africa.
    </p>
  </div>
</section>

<!-- Who We Are -->
<section class="py-16 bg-white">
  <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 px-6 lg:px-12 items-center">
    <div data-aos="fade-right">
      <h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-6">Who We Are</h2>
      <p class="text-gray-700 leading-relaxed mb-6">
        We are a full-service real estate company providing end-to-end solutions including luxury short-let apartments, sustainable land investments, property sales, annual leasing, and real estate banking.
      </p>
      <p class="text-gray-700 leading-relaxed">
        Backed by a team of seasoned professionals in real estate, finance, and marketing, Titan delivers seamless, profitable, and future-focused transactions — making us your trusted partner in every property journey.
      </p>
    </div>
    <div class="rounded-xl overflow-hidden shadow-lg" data-aos="fade-left">
      <img src="https://placehold.co/600x400" alt="Titan Properties" class="w-full h-full object-cover">
    </div>
  </div>
</section>

<!-- Vision & Mission -->
<section class="py-20 bg-green-50">
  <div class="max-w-6xl mx-auto px-6 lg:px-12 grid md:grid-cols-2 gap-12">
    <div data-aos="fade-up">
      <h3 class="text-2xl font-bold text-green-700 mb-4">Our Vision</h3>
      <p class="text-gray-700">
        To become West Africa’s most trusted and innovative real estate company, creating sustainable opportunities and leaving a legacy of generational wealth and empowered communities.
      </p>
    </div>
    <div data-aos="fade-up" data-aos-delay="200">
      <h3 class="text-2xl font-bold text-green-700 mb-4">Our Mission</h3>
      <p class="text-gray-700">
        To deliver cutting-edge real estate solutions with integrity, innovation, and customer excellence — making ownership seamless and rewarding.
      </p>
    </div>
  </div>
</section>

<!-- Core Values -->
<section class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-green-700 mb-12" data-aos="fade-up">Our Core Values – TITAN</h2>
    <div class="grid sm:grid-cols-2 md:grid-cols-5 gap-6">
      <div class="p-6 bg-green-50 rounded-xl shadow hover:shadow-lg transition" data-aos="zoom-in">
        <h4 class="text-lg font-bold text-green-700 mb-2">Trust</h4>
        <p class="text-gray-600 text-sm">Building lasting relationships through honesty and transparency.</p>
      </div>
      <div class="p-6 bg-green-50 rounded-xl shadow hover:shadow-lg transition" data-aos="zoom-in" data-aos-delay="100">
        <h4 class="text-lg font-bold text-green-700 mb-2">Innovation</h4>
        <p class="text-gray-600 text-sm">Embracing creativity and technology to stay ahead.</p>
      </div>
      <div class="p-6 bg-green-50 rounded-xl shadow hover:shadow-lg transition" data-aos="zoom-in" data-aos-delay="200">
        <h4 class="text-lg font-bold text-green-700 mb-2">Tenacity</h4>
        <p class="text-gray-600 text-sm">Relentlessly pursuing excellence in every project.</p>
      </div>
      <div class="p-6 bg-green-50 rounded-xl shadow hover:shadow-lg transition" data-aos="zoom-in" data-aos-delay="300">
        <h4 class="text-lg font-bold text-green-700 mb-2">Accountability</h4>
        <p class="text-gray-600 text-sm">Taking responsibility for long-term value creation.</p>
      </div>
      <div class="p-6 bg-green-50 rounded-xl shadow hover:shadow-lg transition" data-aos="zoom-in" data-aos-delay="400">
        <h4 class="text-lg font-bold text-green-700 mb-2">Nurturing</h4>
        <p class="text-gray-600 text-sm">Empowering people and strengthening communities.</p>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Us -->
<section class="py-20 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center mb-12 text-green-700" data-aos="fade-up">Why Choose Titan & Equity</h2>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition" data-aos="fade-up">
        <h3 class="font-semibold text-lg mb-2">Proven Expertise</h3>
        <p class="text-gray-600">A multidisciplinary team with deep knowledge in real estate, finance, and property management.</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="200">
        <h3 class="font-semibold text-lg mb-2">Comprehensive Services</h3>
        <p class="text-gray-600">From short-lets to investments, we cover every stage of the property journey.</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="400">
        <h3 class="font-semibold text-lg mb-2">Future-Ready Systems</h3>
        <p class="text-gray-600">Technology-driven processes that ensure seamless transactions and transparency.</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="600">
        <h3 class="font-semibold text-lg mb-2">Customer-Centric Approach</h3>
        <p class="text-gray-600">Solutions designed to fit your goals, lifestyle, and investment ambitions.</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="800">
        <h3 class="font-semibold text-lg mb-2">Legacy Building</h3>
        <p class="text-gray-600">Helping you build generational wealth, not just own property.</p>
      </div>
    </div>
  </div>
</section>

<!-- Final CTA -->
<section class="w-full bg-green-600 py-16 text-white text-center">
  <div class="max-w-4xl mx-auto px-4">
    <h2 class="text-3xl md:text-4xl font-bold mb-4" data-aos="fade-up">
      Your Future, Our Commitment
    </h2>
    <p class="text-lg mb-8" data-aos="fade-up" data-aos-delay="200">
      Every home, every plot, every transaction is part of a bigger picture — transforming lives and communities through real estate.
    </p>
    <a href="#contact" 
       class="px-8 py-3 bg-white text-green-600 font-semibold rounded-xl shadow-md hover:bg-gray-100 transition"
       data-aos="zoom-in" data-aos-delay="400">
      Contact Us Today
    </a>
  </div>
</section>
@endsection