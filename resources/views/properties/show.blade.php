@extends('layouts.default')

@section('maincontent')
<div class="container mx-auto px-4 py-10">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <img src="{{ $property->image }}" alt="{{ $property->name }}" class="w-full h-96 object-cover">
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-4">{{ $property->name }}</h1>
            <p class="text-gray-600 mb-2">{{ $property->address }}</p>
            <p class="text-green-700 font-bold mb-4">₦{{ number_format($property->listing_price, 0) }}</p>
            
            <h2 class="font-semibold text-xl mb-2">Description</h2>
            <p class="text-gray-700 mb-4">{{ $property->description }}</p>

            <h2 class="font-semibold text-xl mb-2">Features</h2>
            <ul class="list-disc list-inside mb-4">
                @foreach(explode(',', $property->features) as $feature)
                    <li>{{ trim($feature) }}</li>
                @endforeach
            </ul>

            <h2 class="font-semibold text-xl mb-2">Property Details</h2>
            <p>Type: {{ $property->type }}</p>
            <p>Sale Price: ₦{{ number_format($property->sale_price, 0) }}</p>
            <p>Lease Term: {{ $property->lease_term }}</p>
        </div>
        <!-- WhatsApp Button -->
            <<!-- Floating WhatsApp Button with Pulse Animation -->
<a 
    href="https://wa.me/23490115008562?text={{ urlencode('I am interested in this property: ' . url()->current()) }}" 
    target="_blank"
    class="fixed bottom-6 right-6 bg-green-600 text-white font-semibold py-3 px-6 rounded-full shadow-lg hover:bg-green-700 transition z-50 animate-pulse"
>
    Make Payment
</a>

    </div>
</div>
@endsection
