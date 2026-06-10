@section('title', 'Purchase Confirmation')
<x-app-layout>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 lg:py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                
                @if (session('success'))
                    <div class="mb-6 p-4 bg-primary-50 dark:bg-primary-900/20 border border-primary-200 dark:border-primary-800 rounded-xl">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-primary-800 dark:text-primary-300 font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Success Card -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
                    
                    <!-- Header with Animation -->
                    <div class="relative bg-gradient-to-br from-primary-500 via-primary-600 to-primary-700 dark:from-primary-600 dark:via-primary-700 dark:to-primary-800 px-6 py-12 text-center overflow-hidden">
                        <!-- Decorative circles -->
                        <div class="absolute top-0 left-0 w-40 h-40 bg-white/10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
                        <div class="absolute bottom-0 right-0 w-32 h-32 bg-white/10 rounded-full translate-x-1/2 translate-y-1/2"></div>
                        
                        <div class="relative">
                            <!-- Animated Checkmark -->
                            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg animate-bounce">
                                <svg class="w-10 h-10 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            
                            <h1 class="font-display text-2xl lg:text-3xl font-bold text-white mb-3">
                                Thank You for Your Purchase!
                            </h1>
                            <p class="text-primary-100 text-lg">
                                Your order has been received successfully
                            </p>
                        </div>
                    </div>

                    <div class="p-6 lg:p-8">
                        <!-- Important Notification Banner -->
                        <div class="mb-8 p-5 bg-gradient-to-r from-yellow-50 to-amber-50 dark:from-yellow-900/20 dark:to-amber-900/20 rounded-xl border-2 border-yellow-300 dark:border-yellow-700">
                            <div class="flex gap-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-yellow-400 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-yellow-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-bold text-yellow-900 dark:text-yellow-300 text-lg mb-2">
                                        Payment Verification in Progress
                                    </h3>
                                    <p class="text-yellow-800 dark:text-yellow-400 leading-relaxed">
                                        <strong>Titan & Equity Resources Limited</strong> team will contact you shortly to verify your payment status. Please ensure your phone is reachable and check your email for updates.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Order Details Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <!-- Order Information -->
                            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-xl p-5 border border-gray-100 dark:border-gray-700">
                                <h3 class="font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    Order Details
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600 dark:text-gray-400">Order Number</span>
                                        <span class="font-mono font-bold text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-700 px-3 py-1 rounded-lg">{{ $order->order_number }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600 dark:text-gray-400">Date</span>
                                        <span class="font-medium text-gray-900 dark:text-white">{{ $order->created_at->format('M d, Y H:i') }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600 dark:text-gray-400">Payment Method</span>
                                        <span class="font-medium text-gray-900 dark:text-white">Bank Transfer</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600 dark:text-gray-400">Status</span>
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-sm font-semibold
                                            {{ $order->status === 'paid' ? 'bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-400' : 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400' }}">
                                            <span class="w-2 h-2 rounded-full {{ $order->status === 'paid' ? 'bg-primary-500' : 'bg-yellow-500' }} animate-pulse"></span>
                                            {{ $order->status === 'paid' ? 'Verified' : 'Pending Verification' }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Property Information -->
                            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-xl p-5 border border-gray-100 dark:border-gray-700">
                                <h3 class="font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    Property Details
                                </h3>
                                <div class="space-y-3">
                                    <div>
                                        <span class="text-gray-600 dark:text-gray-400 text-sm">Property</span>
                                        <p class="font-bold text-gray-900 dark:text-white">{{ $order->property->title }}</p>
                                    </div>
                                    <div>
                                        <span class="text-gray-600 dark:text-gray-400 text-sm">Location</span>
                                        <p class="font-medium text-gray-900 dark:text-white flex items-center gap-1">
                                            <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            </svg>
                                            {{ $order->property->location }}
                                        </p>
                                    </div>
                                    <div class="pt-3 border-t border-gray-200 dark:border-gray-700">
                                        <span class="text-gray-600 dark:text-gray-400 text-sm">Total Amount</span>
                                        <p class="font-bold text-2xl text-primary-600 dark:text-primary-400">{{ $order->formatted_amount }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bank Details Reminder -->
                        <div class="mb-8 p-5 bg-primary-50 dark:bg-primary-900/20 rounded-xl border border-primary-200 dark:border-primary-800">
                            <h4 class="font-bold text-primary-900 dark:text-primary-300 mb-3 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                </svg>
                                Bank Transfer Details
                            </h4>
                            <p class="text-primary-700 dark:text-primary-400 text-sm mb-4">If you haven't made the transfer yet, please use the following details:</p>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <div class="bg-white dark:bg-gray-800 p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase">Bank</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">GTBank</p>
                                </div>
                                <div class="bg-white dark:bg-gray-800 p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase">Account Name</p>
                                    <p class="font-semibold text-gray-900 dark:text-white text-sm">Titan & Equity Resources Ltd</p>
                                </div>
                                <div class="bg-white dark:bg-gray-800 p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase">Account No. (₦)</p>
                                    <p class="font-bold text-primary-600 dark:text-primary-400 text-lg">0857959420</p>
                                </div>
                            </div>
                        </div>

                        <!-- Next Steps -->
                        <div class="mb-8 p-5 bg-blue-50 dark:bg-blue-900/20 rounded-xl border border-blue-200 dark:border-blue-800">
                            <h4 class="font-bold text-blue-900 dark:text-blue-300 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                What Happens Next?
                            </h4>
                            <div class="space-y-4">
                                <div class="flex gap-4">
                                    <div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-sm">1</div>
                                    <div>
                                        <p class="font-semibold text-blue-900 dark:text-blue-300">Payment Verification</p>
                                        <p class="text-sm text-blue-700 dark:text-blue-400">Our team will verify your bank transfer within 24 hours</p>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-sm">2</div>
                                    <div>
                                        <p class="font-semibold text-blue-900 dark:text-blue-300">Confirmation Call</p>
                                        <p class="text-sm text-blue-700 dark:text-blue-400">You'll receive a call from Titan & Equity Resources Limited team</p>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-sm">3</div>
                                    <div>
                                        <p class="font-semibold text-blue-900 dark:text-blue-300">Documentation</p>
                                        <p class="text-sm text-blue-700 dark:text-blue-400">Property documents will be prepared and sent to you</p>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-sm">4</div>
                                    <div>
                                        <p class="font-semibold text-blue-900 dark:text-blue-300">Property Handover</p>
                                        <p class="text-sm text-blue-700 dark:text-blue-400">Schedule your property inspection and handover</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Support -->
                        <div class="mb-8 p-5 bg-gray-100 dark:bg-gray-900/50 rounded-xl border border-gray-200 dark:border-gray-700">
                            <h4 class="font-bold text-gray-900 dark:text-white mb-3">Need Help?</h4>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">If you have any questions about your order, please contact us:</p>
                            <div class="flex flex-wrap gap-4">
                                <a href="tel:+2349115008562" class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-primary-50 dark:hover:bg-primary-900/20 hover:border-primary-300 dark:hover:border-primary-700 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    +234 911 500 8562
                                </a>
                                <a href="mailto:titanrealtyltd@gmail.com" class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-primary-50 dark:hover:bg-primary-900/20 hover:border-primary-300 dark:hover:border-primary-700 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Email Us
                                </a>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row justify-center gap-4">
                            <a href="{{ route('properties.show', $order->property) }}" 
                               class="inline-flex items-center justify-center gap-2 bg-primary-600 hover:bg-primary-700 text-white font-bold py-3 px-8 rounded-xl transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                View Property
                            </a>
                            <a href="{{ route('dashboard') }}" 
                               class="inline-flex items-center justify-center gap-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-semibold py-3 px-8 rounded-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Go to Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>