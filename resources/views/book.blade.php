@extends('layouts.default')

@section('title', 'Book an appointment')

@section('maincontent')
<section class="relative bg-gray-50 py-20">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-8">
            <h2 class="text-3xl font-bold text-green-700 mb-6 text-center">Book an Appointment</h2>
            <p class="text-gray-600 mb-8 text-center">Fill in your details and our team will reach out to confirm your appointment.</p>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
            <span class="font-medium">✅ Success!</span> {{ session('success') }}
        </div>
    @endif

            <!-- Laravel form -->
            <form action="{{ route('book.submit') }}" method="POST" class="space-y-6">
                @csrf

                <!-- First Name -->
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="first_name" id="first_name" 
                           class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-600 focus:border-green-600" 
                           required>
                            @error('first_name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
                </div>

                <!-- Last Name -->
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" name="last_name" id="last_name" 
                           class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-600 focus:border-green-600" 
                           required>
                             @error('last_name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" name="phone" id="phone" 
                           class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-600 focus:border-green-600" 
                           required>
                            @error('phone')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" id="email" 
                           class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-600 focus:border-green-600" 
                           required>
                            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" 
                            class="w-full py-3 px-6 bg-green-700 text-white font-medium rounded-lg shadow-md hover:bg-green-800 transition">
                        Submit Appointment
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection