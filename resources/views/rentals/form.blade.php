@section('title', 'Rent - ' . $property->title)
<x-app-layout>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 lg:py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-sm mb-8">
                <a href="{{ route('home') }}" class="text-gray-500 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Home</a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="{{ route('properties.index') }}" class="text-gray-500 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Properties</a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-primary-600 dark:text-primary-400 font-semibold">Rent Property</span>
            </nav>

            <!-- Page Header -->
            <div class="text-center mb-10">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400 text-sm font-semibold rounded-full mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Short-Let Booking
                </span>
                <h1 class="font-display text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-3">
                    Book Your Stay
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-300">
                    Complete your rental booking for {{ $property->title }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
                <!-- Property Summary - Left Column -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Property Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-100 dark:border-gray-700">
                        <div class="relative">
                            <img src="{{ $property->image_url ?? 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800' }}" 
                                 alt="{{ $property->title }}" 
                                 class="w-full h-48 object-cover">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1.5 bg-primary-600 text-white text-xs font-bold rounded-lg shadow-lg">
                                    Short-Let
                                </span>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="font-display text-xl font-bold text-gray-900 dark:text-white mb-2">
                                {{ $property->title }}
                            </h3>
                            <p class="flex items-center gap-2 text-gray-600 dark:text-gray-400 mb-4">
                                <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                </svg>
                                {{ $property->location }}
                            </p>
                            
                            <!-- Property Features -->
                            <div class="grid grid-cols-3 gap-4 py-4 border-t border-b border-gray-100 dark:border-gray-700">
                                <div class="text-center">
                                    <div class="w-10 h-10 bg-primary-50 dark:bg-primary-900/20 rounded-lg flex items-center justify-center mx-auto mb-2">
                                        <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $property->bedrooms }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Beds</p>
                                </div>
                                <div class="text-center">
                                    <div class="w-10 h-10 bg-primary-50 dark:bg-primary-900/20 rounded-lg flex items-center justify-center mx-auto mb-2">
                                        <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $property->bathrooms }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Baths</p>
                                </div>
                                <div class="text-center">
                                    <div class="w-10 h-10 bg-primary-50 dark:bg-primary-900/20 rounded-lg flex items-center justify-center mx-auto mb-2">
                                        <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $property->bedrooms * 2 }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Max Guests</p>
                                </div>
                            </div>
                            
                            <div class="pt-4">
                                <p class="text-sm text-gray-600 dark:text-gray-400">Nightly Rate</p>
                                <p class="text-2xl font-bold text-primary-600 dark:text-primary-400">
                                    ₦{{ number_format($property->price / 30, 2) }}
                                    <span class="text-sm font-normal text-gray-500">/night</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Rental Estimate Card -->
                    <div id="estimate-card" class="bg-gradient-to-br from-primary-600 to-primary-700 dark:from-primary-700 dark:to-primary-800 rounded-2xl shadow-lg p-6 text-white">
                        <h4 class="font-semibold mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                            Rental Estimate
                        </h4>
                        <div id="rental-estimate" class="text-primary-100">
                            Select dates to see rental estimate
                        </div>
                    </div>
                </div>

                <!-- Checkout Form - Right Column -->
                <div class="lg:col-span-3">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden">
                        <div class="p-6 lg:p-8">
                            <h3 class="font-display text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Booking Details
                            </h3>
                            
                            <form action="{{ route('rentals.process', $property) }}" method="POST" id="rental-form">
                                @csrf
                                
                                <!-- Date Selection -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label for="check_in" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                            Check-in Date <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <input type="date" id="check_in" name="check_in" required
                                                   min="{{ now()->addDay()->format('Y-m-d') }}"
                                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all">
                                            <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <x-input-error :messages="$errors->get('check_in')" class="mt-2" />
                                    </div>
                                    
                                    <div>
                                        <label for="check_out" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                            Check-out Date <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <input type="date" id="check_out" name="check_out" required
                                                   min="{{ now()->addDays(2)->format('Y-m-d') }}"
                                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all">
                                            <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <x-input-error :messages="$errors->get('check_out')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Guests Selection -->
                                <div class="mb-6">
                                    <label for="guests" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                        Number of Guests <span class="text-red-500">*</span>
                                    </label>
                                    <select id="guests" name="guests" required
                                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all">
                                        <option value="">Select number of guests</option>
                                        @for($i = 1; $i <= ($property->bedrooms * 2); $i++)
                                            <option value="{{ $i }}">{{ $i }} guest{{ $i > 1 ? 's' : '' }}</option>
                                        @endfor
                                    </select>
                                    <x-input-error :messages="$errors->get('guests')" class="mt-2" />
                                </div>

                                <!-- Special Requests -->
                                <div class="mb-8">
                                    <label for="special_requests" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                        Special Requests (Optional)
                                    </label>
                                    <textarea id="special_requests" name="special_requests" rows="4"
                                              placeholder="Any special requirements such as airport pickup, early check-in, dietary needs..."
                                              class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all resize-none"></textarea>
                                    <x-input-error :messages="$errors->get('special_requests')" class="mt-2" />
                                </div>

                                <!-- Bank Account Details -->
                                <div class="mb-8 p-6 bg-gradient-to-r from-yellow-50 to-amber-50 dark:from-yellow-900/20 dark:to-amber-900/20 rounded-xl border border-yellow-200 dark:border-yellow-800">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-12 h-12 bg-yellow-400 rounded-xl flex items-center justify-center">
                                            <svg class="w-6 h-6 text-yellow-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-gray-900 dark:text-white mb-3">Payment via Bank Transfer</h4>
                                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Transfer the rental amount to:</p>
                                            
                                            <div class="space-y-3">
                                                <div class="flex items-center justify-between p-3 bg-white dark:bg-gray-800 rounded-lg">
                                                    <div>
                                                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Bank Name</p>
                                                        <p class="font-semibold text-gray-900 dark:text-white">GTBank (Guaranty Trust Bank)</p>
                                                    </div>
                                                    <button type="button" onclick="copyToClipboard('GTBank (Guaranty Trust Bank)')" class="p-2 text-primary-600 hover:bg-primary-50 dark:hover:bg-primary-900/20 rounded-lg transition-colors">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                
                                                <div class="flex items-center justify-between p-3 bg-white dark:bg-gray-800 rounded-lg">
                                                    <div>
                                                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Account Name</p>
                                                        <p class="font-semibold text-gray-900 dark:text-white">Titan & Equity Resources Ltd</p>
                                                    </div>
                                                    <button type="button" onclick="copyToClipboard('Titan & Equity Resources Ltd')" class="p-2 text-primary-600 hover:bg-primary-50 dark:hover:bg-primary-900/20 rounded-lg transition-colors">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                
                                                <div class="flex items-center justify-between p-3 bg-white dark:bg-gray-800 rounded-lg">
                                                    <div>
                                                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Account Number (Naira ₦)</p>
                                                        <p class="font-bold text-xl text-primary-600 dark:text-primary-400 tracking-wider">0857959420</p>
                                                    </div>
                                                    <button type="button" onclick="copyToClipboard('0857959420')" class="p-2 text-primary-600 hover:bg-primary-50 dark:hover:bg-primary-900/20 rounded-lg transition-colors">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Terms Agreement -->
                                <div class="mb-8">
                                    <label class="flex items-start gap-3 cursor-pointer group">
                                        <input type="checkbox" name="agree_terms" required
                                               class="mt-1 w-5 h-5 rounded border-gray-300 dark:border-gray-600 text-primary-600 focus:ring-primary-500 dark:bg-gray-700 transition-colors">
                                        <span class="text-sm text-gray-600 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-gray-200 transition-colors">
                                            I agree to the <a href="{{ route('terms') }}" class="text-primary-600 dark:text-primary-400 hover:underline font-medium">Rental Agreement</a> and <a href="{{ route('terms') }}" class="text-primary-600 dark:text-primary-400 hover:underline font-medium">House Rules</a>. I understand that my booking will be confirmed after payment verification.
                                        </span>
                                    </label>
                                    <x-input-error :messages="$errors->get('agree_terms')" class="mt-2" />
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex flex-col sm:flex-row gap-4">
                                    <button type="submit" id="submit-button" disabled
                                            class="flex-1 inline-flex items-center justify-center gap-2 bg-primary-600 hover:bg-primary-700 disabled:bg-gray-400 disabled:cursor-not-allowed text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 disabled:hover:scale-100 shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        Book Rental
                                    </button>
                                    <a href="{{ route('properties.show', $property) }}" 
                                       class="inline-flex items-center justify-center gap-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-semibold py-4 px-8 rounded-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copy to Clipboard Toast -->
    <div id="copy-toast" class="fixed bottom-8 left-1/2 transform -translate-x-1/2 px-6 py-3 bg-gray-900 dark:bg-gray-100 text-white dark:text-gray-900 rounded-xl shadow-lg transition-all duration-300 opacity-0 invisible z-50">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span>Copied to clipboard!</span>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                const toast = document.getElementById('copy-toast');
                toast.classList.remove('opacity-0', 'invisible');
                toast.classList.add('opacity-100', 'visible');
                setTimeout(() => {
                    toast.classList.add('opacity-0', 'invisible');
                    toast.classList.remove('opacity-100', 'visible');
                }, 2000);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const checkInInput = document.getElementById('check_in');
            const checkOutInput = document.getElementById('check_out');
            const estimateDiv = document.getElementById('rental-estimate');
            const submitButton = document.getElementById('submit-button');
            const dailyRate = {{ $property->price }} / 30;

            function updateEstimate() {
                const checkIn = new Date(checkInInput.value);
                const checkOut = new Date(checkOutInput.value);
                
                if (checkIn && checkOut && checkOut > checkIn) {
                    const days = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));
                    const totalCost = days * dailyRate;
                    
                    estimateDiv.innerHTML = `
                        <div class="space-y-3">
                            <div class="flex justify-between text-primary-100">
                                <span>${days} night${days > 1 ? 's' : ''} × ₦${dailyRate.toLocaleString('en-NG', {minimumFractionDigits: 2})}</span>
                                <span>₦${(days * dailyRate).toLocaleString('en-NG', {minimumFractionDigits: 2})}</span>
                            </div>
                            <div class="flex justify-between text-primary-100">
                                <span>Service Fee</span>
                                <span>₦0.00</span>
                            </div>
                            <div class="border-t border-primary-500 pt-3 mt-3">
                                <div class="flex justify-between items-center">
                                    <span class="font-semibold text-lg">Total Amount</span>
                                    <span class="text-2xl font-bold">₦${totalCost.toLocaleString('en-NG', {minimumFractionDigits: 2})}</span>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    submitButton.disabled = false;
                } else {
                    estimateDiv.textContent = 'Select dates to see rental estimate';
                    submitButton.disabled = true;
                }
            }

            checkInInput.addEventListener('change', function() {
                if (checkInInput.value) {
                    const minCheckOut = new Date(checkInInput.value);
                    minCheckOut.setDate(minCheckOut.getDate() + 1);
                    checkOutInput.min = minCheckOut.toISOString().split('T')[0];
                    
                    if (checkOutInput.value && new Date(checkOutInput.value) <= minCheckOut) {
                        checkOutInput.value = '';
                    }
                }
                updateEstimate();
            });

            checkOutInput.addEventListener('change', updateEstimate);
        });
    </script>
</x-app-layout>