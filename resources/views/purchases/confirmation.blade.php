<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Purchase Confirmation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">Thank You for Your Purchase!</h1>
                        <p class="text-gray-600">Your order has been received and is being processed.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold mb-2">Order Details</h3>
                            <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
                            <p><strong>Date:</strong> {{ $order->created_at->format('F d, Y H:i') }}</p>
                            <p><strong>Status:</strong> 
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $order->status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold mb-2">Property Details</h3>
                            <p><strong>Property:</strong> {{ $order->property->title }}</p>
                            <p><strong>Location:</strong> {{ $order->property->location }}</p>
                            <p><strong>Amount:</strong> <span class="text-xl font-bold text-green-600">{{ $order->formatted_amount }}</span></p>
                        </div>
                    </div>

                    <div class="bg-blue-50 p-4 rounded-lg mb-6">
                        <h3 class="font-semibold mb-2">What's Next?</h3>
                        <ul class="list-disc list-inside text-sm text-gray-600 space-y-1">
                            <li>An invoice has been sent to your email address</li>
                            <li>Our team will contact you within 24 hours to proceed with the purchase</li>
                            <li>You can track your order status in your account dashboard</li>
                        </ul>
                    </div>

                    <div class="flex justify-center space-x-4">
                        <x-primary-button>
                            <a href="{{ route('properties.show', $order->property) }}">View Property</a>
                        </x-primary-button>
                        <x-secondary-button>
                            <a href="{{ route('dashboard') }}">Go to Dashboard</a>
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>