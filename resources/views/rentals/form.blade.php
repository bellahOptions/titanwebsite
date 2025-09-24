<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rent Property') }} - {{ $property->title }}
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
                        <p><strong>Monthly Rent:</strong> ${{ number_format($property->price) }}</p>
                    </div>
                </div>

                <!-- Rental Form -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Rental Information</h3>
                    
                    <form action="{{ route('rentals.process', $property) }}" method="POST">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <x-input-label for="check_in" :value="__('Check-in Date *')" />
                                <x-text-input id="check_in" name="check_in" type="date" 
                                             class="mt-1 block w-full" 
                                             min="{{ now()->addDay()->format('Y-m-d') }}"
                                             required />
                                <x-input-error :messages="$errors->get('check_in')" class="mt-2" />
                            </div>
                            
                            <div>
                                <x-input-label for="check_out" :value="__('Check-out Date *')" />
                                <x-text-input id="check_out" name="check_out" type="date" 
                                             class="mt-1 block w-full" 
                                             min="{{ now()->addDays(2)->format('Y-m-d') }}"
                                             required />
                                <x-input-error :messages="$errors->get('check_out')" class="mt-2" />
                            </div>
                        </div>

                        <div class="mb-6">
                            <x-input-label for="guests" :value="__('Number of Guests *')" />
                            <select id="guests" name="guests" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">Select number of guests</option>
                                @for($i = 1; $i <= ($property->bedrooms * 2); $i++)
                                    <option value="{{ $i }}">{{ $i }} guest{{ $i > 1 ? 's' : '' }}</option>
                                @endfor
                            </select>
                            <x-input-error :messages="$errors->get('guests')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="special_requests" :value="__('Special Requests')" />
                            <textarea id="special_requests" name="special_requests" rows="3" 
                                     class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                     placeholder="Any special requirements or requests..."></textarea>
                            <x-input-error :messages="$errors->get('special_requests')" class="mt-2" />
                        </div>

                        <div class="mb-6 p-4 bg-blue-50 rounded-lg">
                            <h4 class="font-semibold mb-2">Rental Estimate</h4>
                            <div id="rental-estimate" class="text-sm text-gray-600">
                                Select dates to see rental estimate
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="agree_terms" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" required>
                                <span class="ml-2 text-sm text-gray-600">
                                    I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-800">Rental Agreement</a> and <a href="#" class="text-indigo-600 hover:text-indigo-800">House Rules</a>
                                </span>
                            </label>
                            <x-input-error :messages="$errors->get('agree_terms')" class="mt-2" />
                        </div>

                        <div class="flex space-x-4">
                            <x-primary-button class="w-full py-3" id="submit-button">
                                <i class="fas fa-calendar-check mr-2"></i>Book Rental
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkInInput = document.getElementById('check_in');
            const checkOutInput = document.getElementById('check_out');
            const estimateDiv = document.getElementById('rental-estimate');
            const submitButton = document.getElementById('submit-button');
            const dailyRate = {{ $property->price }} / 30; // Convert monthly to daily rate

            function updateEstimate() {
                const checkIn = new Date(checkInInput.value);
                const checkOut = new Date(checkOutInput.value);
                
                if (checkIn && checkOut && checkOut > checkIn) {
                    const days = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));
                    const totalCost = days * dailyRate;
                    
                    estimateDiv.innerHTML = `
                        <div class="flex justify-between">
                            <span>${days} night${days > 1 ? 's' : ''}:</span>
                            <span>$${dailyRate.toFixed(2)} × ${days}</span>
                        </div>
                        <div class="flex justify-between font-semibold mt-2 border-t pt-2">
                            <span>Total estimate:</span>
                            <span>$${totalCost.toFixed(2)}</span>
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