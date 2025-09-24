<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Purchase') }} - {{ $property->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Property Summary -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Property Details</h3>
                    <div class="space-y-3">
                        <p><strong>Title:</strong> {{ $property->title }}</p>
                        <p><strong>Location:</strong> {{ $property->location }}</p>
                        <p><strong>Type:</strong> {{ ucfirst($property->type) }}</p>
                        <p><strong>Bedrooms:</strong> {{ $property->bedrooms }}</p>
                        <p><strong>Bathrooms:</strong> {{ $property->bathrooms }}</p>
                        <p><strong>Area:</strong> {{ $property->area }} sq ft</p>
                    </div>
                    
                    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                        <h4 class="font-semibold mb-2">Purchase Summary</h4>
                        <div class="flex justify-between items-center">
                            <span>Property Price:</span>
                            <span class="text-xl font-bold text-green-600">${{ number_format($property->price) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Checkout Form -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Complete Your Purchase</h3>
                    
                    <form action="{{ route('purchases.process', $property) }}" method="POST">
                        @csrf
                        
                        <div class="mb-6">
                            <h4 class="font-semibold mb-3">Payment Method</h4>
                            <div class="space-y-2">
                                <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer">
                                    <input type="radio" name="payment_method" value="card" class="mr-3" required>
                                    <div>
                                        <span class="font-medium">Credit/Debit Card</span>
                                        <p class="text-sm text-gray-500">Pay securely with your card</p>
                                    </div>
                                </label>
                                
                                <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer">
                                    <input type="radio" name="payment_method" value="bank_transfer" class="mr-3">
                                    <div>
                                        <span class="font-medium">Bank Transfer</span>
                                        <p class="text-sm text-gray-500">Transfer funds directly</p>
                                    </div>
                                </label>
                                
                                <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer">
                                    <input type="radio" name="payment_method" value="crypto" class="mr-3">
                                    <div>
                                        <span class="font-medium">Cryptocurrency</span>
                                        <p class="text-sm text-gray-500">Pay with Bitcoin or Ethereum</p>
                                    </div>
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('payment_method')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="agree_terms" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" required>
                                <span class="ml-2 text-sm text-gray-600">
                                    I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-800">Terms of Service</a> and <a href="#" class="text-indigo-600 hover:text-indigo-800">Privacy Policy</a>
                                </span>
                            </label>
                            <x-input-error :messages="$errors->get('agree_terms')" class="mt-2" />
                        </div>

                        <div class="flex space-x-4">
                            <x-primary-button class="w-full py-3">
                                <i class="fas fa-lock mr-2"></i>Complete Purchase
                            </x-primary-button>
                            <x-secondary-button>
                                <a href="{{ route('properties.show', $property) }}">Cancel</a>
                            </x-secondary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>