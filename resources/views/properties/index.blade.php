@extends('layouts.default')

@section('maincontent')
<div class="max-w-7xl mx-auto py-12 px-6">
    <h1 class="text-4xl font-bold text-green-900 mb-6">Available Properties</h1>
    <p class="text-gray-600 mb-10">
        Browse our curated collection of properties across different categories. 
        Whether you’re buying, renting, or investing, Titan & Equity has trusted options for you.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Categories Sidebar -->
        <aside class="md:col-span-1 bg-gray-50 rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-green-900 mb-4">Categories</h2>
            <ul class="space-y-3">
                <li><a href="#" class="block text-gray-700 hover:text-green-700 font-medium">Land</a></li>
                <li><a href="#" class="block text-gray-700 hover:text-green-700 font-medium">Shortlet Apartments</a></li>
                <li><a href="#" class="block text-gray-700 hover:text-green-700 font-medium">Houses for Sale</a></li>
                <li><a href="#" class="block text-gray-700 hover:text-green-700 font-medium">Houses for Rent</a></li>
            </ul>
        </aside>

        <!-- Property Listings -->
        <main class="md:col-span-3">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach ($properties as $property)
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <img src="{{ $property->image }}" alt="Property" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="font-semibold text-lg">{{ $property->name }}</h3>
                <p class="text-gray-600 text-sm">{{ $property->address }}</p>
                <p class="text-green-700 font-bold mt-2">₦{{ number_format($property->listing_price) }}</p>
                <a href="{{ route('properties.show', $property->id) }}" class="text-blue-500 mt-2 inline-block">View Details</a>
            </div>
        </div>
    @endforeach
</div>

<!-- Pagination -->
<div class="mt-6">
    {{ $properties->links() }}
</div>

        </main>
    </div>
</div>
@endsection
