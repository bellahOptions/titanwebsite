@section('title', 'Purchase - ' . $property->title)
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
                <span class="text-primary-600 dark:text-primary-400 font-semibold">Purchase</span>
            </nav>

            <!-- Page Header -->
            <div class="text-center mb-10">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400 text-sm font-semibold rounded-full mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    Secure Checkout
                </span>
                <h1 class="font-display text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-3">
                    Complete Your Purchase
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-300">
                    Review your property details and complete payment via bank transfer
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
                                    {{ ucfirst($property->type) }}
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
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ number_format($property->area) }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Sq Ft</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Price Summary -->
                    <div class="bg-gradient-to-br from-primary-600 to-primary-700 dark:from-primary-700 dark:to-primary-800 rounded-2xl shadow-lg p-6 text-white">
                        <h4 class="font-semibold mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                            Purchase Summary
                        </h4>
                        <div class="space-y-3">
                            <div class="flex justify-between text-primary-100">
                                <span>Property Price</span>
                                <span>₦{{ number_format($property->price) }}</span>
                            </div>
                            <div class="flex justify-between text-primary-100">
                                <span>Processing Fee</span>
                                <span>₦0.00</span>
                            </div>
                            <div class="border-t border-primary-500 pt-3 mt-3">
                                <div class="flex justify-between items-center">
                                    <span class="font-semibold text-lg">Total Amount</span>
                                    <span class="text-2xl font-bold">₦{{ number_format($property->price) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Checkout Form - Right Column -->
                <div class="lg:col-span-3">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden">
                        <div class="p-6 lg:p-8">
                            <h3 class="font-display text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                                Payment Method
                            </h3>
                            
                            <form action="{{ route('purchases.process', $property) }}" method="POST" id="checkout-form">
                                @csrf
                                
                                <!-- Bank Transfer Option -->
                                <div class="mb-8">
                                    <label class="relative flex cursor-pointer rounded-xl border-2 border-primary-500 bg-primary-50 dark:bg-primary-900/20 p-5 transition-all">
                                        <input type="radio" name="payment_method" value="bank_transfer" class="sr-only" checked required>
                                        <div class="flex items-start gap-4 w-full">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary-600 rounded-xl flex items-center justify-center">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <div class="flex items-center justify-between">
                                                    <span class="font-bold text-gray-900 dark:text-white">Bank Transfer</span>
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-100 dark:bg-primary-900/50 text-primary-800 dark:text-primary-300">
                                                        Recommended
                                                    </span>
                                                </div>
                                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Transfer funds directly to our bank account</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="w-6 h-6 bg-primary-600 rounded-full flex items-center justify-center">
                                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                    <x-input-error :messages="$errors->get('payment_method')" class="mt-2" />
                                </div>

                                <!-- Bank Account Details -->
                                <div class="mb-8 p-6 bg-gradient-to-r from-yellow-50 to-amber-50 dark:from-yellow-900/20 dark:to-amber-900/20 rounded-xl border border-yellow-200 dark:border-yellow-800">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-12 h-12 bg-yellow-400 rounded-xl flex items-center justify-center">
                                            <svg class="w-6 h-6 text-yellow-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-gray-900 dark:text-white mb-3">Bank Account Details</h4>
                                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Please transfer the exact amount to the following account:</p>
                                            
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
                                                
                                                <div class="flex items-center justify-between p-3 bg-primary-100 dark:bg-primary-900/30 rounded-lg border-2 border-primary-300 dark:border-primary-700">
                                                    <div>
                                                        <p class="text-xs text-primary-700 dark:text-primary-300 uppercase tracking-wide">Amount to Pay</p>
                                                        <p class="font-bold text-2xl text-primary-700 dark:text-primary-300">₦{{ number_format($property->price) }}</p>
                                                    </div>
                                                    <button type="button" onclick="copyToClipboard('{{ $property->price }}')" class="p-2 text-primary-600 hover:bg-primary-200 dark:hover:bg-primary-800 rounded-lg transition-colors">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Important Notice -->
                                <div class="mb-8 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl border border-blue-200 dark:border-blue-800">
                                    <div class="flex gap-3">
                                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div>
                                            <p class="font-semibold text-blue-900 dark:text-blue-300 mb-1">Important</p>
                                            <p class="text-sm text-blue-700 dark:text-blue-400">After making the transfer, click the button below to submit your order. Our team will verify your payment and contact you within 24 hours.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Terms Agreement -->
                                <div class="mb-8">
                                    <label class="flex items-start gap-3 cursor-pointer group">
                                        <input type="checkbox" name="agree_terms" required
                                               class="mt-1 w-5 h-5 rounded border-gray-300 dark:border-gray-600 text-primary-600 focus:ring-primary-500 dark:bg-gray-700 transition-colors">
                                        <span class="text-sm text-gray-600 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-gray-200 transition-colors">
                                            I agree to the <a href="{{ route('terms') }}" class="text-primary-600 dark:text-primary-400 hover:underline font-medium">Terms of Service</a> and <a href="{{ route('terms') }}" class="text-primary-600 dark:text-primary-400 hover:underline font-medium">Privacy Policy</a>. I understand that my payment will be verified before the property purchase is confirmed.
                                        </span>
                                    </label>
                                    <x-input-error :messages="$errors->get('agree_terms')" class="mt-2" />
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex flex-col sm:flex-row gap-4">
                                    <button type="submit" 
                                            class="flex-1 inline-flex items-center justify-center gap-2 bg-primary-600 hover:bg-primary-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                        Complete Purchase
                                    </button>
                                    <a href="{{ route('properties.show', $property) }}" 
                                       class="inline-flex items-center justify-center gap-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-semibold py-4 px-8 rounded-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Security Badge -->
                    <div class="mt-6 flex items-center justify-center gap-6 text-sm text-gray-500 dark:text-gray-400">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            <span>Secure Transaction</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            <span>SSL Encrypted</span>
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
    </script>
</x-app-layout>