<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Inspection') }} - {{ $property->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if($availableDays->count() == 0)
                        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-6">
                            <p class="font-semibold">Inspections Currently Unavailable</p>
                            <p class="mt-1">No inspection days have been configured by the administrator yet.</p>
                            <p class="mt-2">Please check back later or contact support for assistance.</p>
                        </div>
                    @endif

                    @if($existingBooking)
                        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-6">
                            <p>You already have a booking for this property scheduled on 
                                <strong>{{ $existingBooking->inspection_date->format('M d, Y') }}</strong> 
                                at <strong>{{ $existingBooking->inspection_time }}</strong>
                            </p>
                            <p class="mt-2">Status: <span class="capitalize">{{ $existingBooking->status }}</span></p>
                        </div>
                    @endif

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Property Details</h3>
                        <p><strong>Title:</strong> {{ $property->title }}</p>
                        <p><strong>Location:</strong> {{ $property->location }}</p>
                        <p><strong>Price:</strong> ${{ number_format($property->price) }}</p>
                    </div>

                    @if($availableDays->count() > 0)
                        <form action="{{ route('bookings.store', $property) }}" method="POST" id="booking-form">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <x-input-label for="inspection_day" :value="__('Inspection Day *')" />
                                    <select id="inspection_day" name="inspection_day" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                        <option value="">Choose Inspection Day</option>
                                        @foreach($availableDays as $day)
                                            <option value="{{ $day->day_name }}" 
                                                    data-slots="{{ json_encode($day->time_slots) }}"
                                                    data-max-bookings="{{ $day->max_bookings_per_slot }}">
                                                {{ $day->day_name }} ({{ $day->start_time }} - {{ $day->end_time }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('inspection_day')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="inspection_date" :value="__('Inspection Date *')" />
                                    <x-text-input id="inspection_date" name="inspection_date" type="date" 
                                                 class="mt-1 block w-full" 
                                                 min="{{ now()->addDay()->format('Y-m-d') }}"
                                                 required />
                                    <x-input-error :messages="$errors->get('inspection_date')" class="mt-2" />
                                </div>
                            </div>

                            <div class="mb-6">
                                <x-input-label for="inspection_time" :value="__('Inspection Time *')" />
                                <select id="inspection_time" name="inspection_time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required disabled>
                                    <option value="">First select a day</option>
                                </select>
                                <div id="time-slots-info" class="text-sm text-gray-500 mt-1 hidden">
                                    Available time slots will appear here after selecting a day
                                </div>
                                <x-input-error :messages="$errors->get('inspection_time')" class="mt-2" />
                            </div>

                            <div class="mb-6">
                                <x-input-label for="notes" :value="__('Additional Notes')" />
                                <textarea id="notes" name="notes" rows="3" 
                                         class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                         placeholder="Any special requirements or questions..."></textarea>
                                <x-input-error :messages="$errors->get('notes')" class="mt-2" />
                            </div>

                            <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold mb-2">Available Inspection Days & Times</h4>
                                <ul class="text-sm text-gray-600">
                                    @foreach($availableDays as $day)
                                        <li>{{ $day->day_name }}: {{ $day->start_time }} - {{ $day->end_time }} (Max {{ $day->max_bookings_per_slot }} bookings per slot)</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button :disabled="$existingBooking" id="submit-button">
                                    {{ __('Book Inspection') }}
                                </x-primary-button>
                                <x-secondary-button>
                                    <a href="{{ route('properties.show', $property) }}">{{ __('Cancel') }}</a>
                                </x-secondary-button>
                            </div>
                        </form>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500">Inspection booking is currently unavailable.</p>
                            <a href="{{ route('properties.show', $property) }}" class="text-indigo-600 hover:text-indigo-800 mt-4 inline-block">
                                Back to Property
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const daySelect = document.getElementById('inspection_day');
            const timeSelect = document.getElementById('inspection_time');
            const dateInput = document.getElementById('inspection_date');
            const timeSlotsInfo = document.getElementById('time-slots-info');
            const submitButton = document.getElementById('submit-button');
            const bookingForm = document.getElementById('booking-form');

            // Store booking data for checking limits
            let bookingData = {!! json_encode($bookingData ?? []) !!};

            // Function to update time slots based on selected day
            function updateTimeSlots() {
                const selectedDay = daySelect.options[daySelect.selectedIndex];
                
                if (!selectedDay.value) {
                    timeSelect.innerHTML = '<option value="">First select a day</option>';
                    timeSelect.disabled = true;
                    timeSlotsInfo.classList.add('hidden');
                    return;
                }

                const timeSlots = JSON.parse(selectedDay.getAttribute('data-slots'));
                const maxBookings = parseInt(selectedDay.getAttribute('data-max-bookings'));
                
                timeSelect.innerHTML = '<option value="">Select Time</option>';
                
                timeSlots.forEach(slot => {
                    const option = document.createElement('option');
                    option.value = slot;
                    option.textContent = slot;
                    
                    // Check if this time slot is at or near capacity
                    const selectedDate = dateInput.value;
                    if (selectedDate) {
                        const slotBookings = getBookingsForSlot(selectedDate, slot);
                        if (slotBookings >= maxBookings) {
                            option.textContent += ' (FULL)';
                            option.disabled = true;
                            option.classList.add('text-red-500');
                        } else if (slotBookings >= maxBookings - 1) {
                            option.textContent += ` (${maxBookings - slotBookings} left)`;
                            option.classList.add('text-orange-500');
                        }
                    }
                    
                    timeSelect.appendChild(option);
                });
                
                timeSelect.disabled = false;
                timeSlotsInfo.classList.remove('hidden');
            }

            // Function to get number of bookings for a specific date and time slot
            function getBookingsForSlot(date, time) {
                if (!bookingData[date]) return 0;
                return bookingData[date][time] || 0;
            }

            // Function to check if a time slot is available
            function isTimeSlotAvailable(day, date, time) {
                const selectedDay = Array.from(daySelect.options).find(opt => opt.value === day);
                if (!selectedDay) return false;

                const maxBookings = parseInt(selectedDay.getAttribute('data-max-bookings'));
                const currentBookings = getBookingsForSlot(date, time);
                
                return currentBookings < maxBookings;
            }

            // Function to show booking limit alert
            function showBookingLimitAlert(day, date, time) {
                const selectedDay = Array.from(daySelect.options).find(opt => opt.value === day);
                const maxBookings = parseInt(selectedDay.getAttribute('data-max-bookings'));
                const currentBookings = getBookingsForSlot(date, time);
                
                if (currentBookings >= maxBookings) {
                    alert(`❌ This time slot is fully booked for ${date}. Please choose another time.`);
                    return false;
                } else if (currentBookings >= maxBookings - 1) {
                    const remaining = maxBookings - currentBookings;
                    alert(`⚠️ Only ${remaining} spot${remaining > 1 ? 's' : ''} remaining for this time slot!`);
                }
                
                return true;
            }

            // Event listeners
            daySelect.addEventListener('change', function() {
                updateTimeSlots();
                validateForm();
            });

            dateInput.addEventListener('change', function() {
                updateTimeSlots();
                validateForm();
            });

            timeSelect.addEventListener('change', function() {
                validateForm();
            });

            // Form submission handler
            bookingForm.addEventListener('submit', function(e) {
                const selectedDay = daySelect.value;
                const selectedDate = dateInput.value;
                const selectedTime = timeSelect.value;
                
                if (selectedDay && selectedDate && selectedTime) {
                    if (!isTimeSlotAvailable(selectedDay, selectedDate, selectedTime)) {
                        e.preventDefault();
                        showBookingLimitAlert(selectedDay, selectedDate, selectedTime);
                        return false;
                    }
                    
                    // Additional validation
                    const selectedDateObj = new Date(selectedDate);
                    const tomorrow = new Date();
                    tomorrow.setDate(tomorrow.getDate() + 1);
                    tomorrow.setHours(0, 0, 0, 0);
                    
                    if (selectedDateObj < tomorrow) {
                        e.preventDefault();
                        alert('❌ Please select a future date for inspection.');
                        return false;
                    }
                }
            });

            // Function to validate form and enable/disable submit button
            function validateForm() {
                const isDaySelected = daySelect.value !== '';
                const isDateSelected = dateInput.value !== '';
                const isTimeSelected = timeSelect.value !== '';
                
                if (isDaySelected && isDateSelected && isTimeSelected) {
                    submitButton.disabled = false;
                } else {
                    submitButton.disabled = true;
                }
            }

            // Initialize form validation
            validateForm();

            // Add real-time booking data update (optional - for dynamic updates)
            function updateBookingData() {
                // This could be extended to fetch real-time data from an API
                console.log('Booking data would be updated here from server...');
            }

            // Simulate initial booking data (replace with actual data from controller)
            if (Object.keys(bookingData).length === 0) {
                bookingData = {
                    // Example data structure
                    // "2024-01-15": {
                    //     "09:00": 2,
                    //     "09:30": 5, // Full
                    //     "10:00": 1
                    // }
                };
            }
        });
    </script>

    <style>
        option:disabled {
            color: #ef4444;
            font-style: italic;
        }
        
        option.text-red-500 {
            color: #ef4444;
        }
        
        option.text-orange-500 {
            color: #f97316;
        }
        
        .hidden {
            display: none;
        }
    </style>
</x-app-layout>