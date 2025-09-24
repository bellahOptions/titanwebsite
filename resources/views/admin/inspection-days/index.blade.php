<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inspection Days Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-8 bg-green-50 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-green-800 mb-2">Setup Instructions</h3>
                        <p class="text-green-700">Add inspection days and time slots when your team is available for property inspections. Users will only be able to book inspections during these available times.</p>
                    </div>

                    <h3 class="text-lg font-semibold mb-4">Add New Inspection Day</h3>
                    <form action="{{ route('admin.inspection-days.store') }}" method="POST" class="mb-8">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <x-input-label for="day_name" :value="__('Day Name')" />
                                <select id="day_name" name="day_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    <option value="">Select Day</option>
                                    @foreach($daysOfWeek as $day)
                                        <option value="{{ $day }}">{{ $day }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('day_name')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="start_time" :value="__('Start Time')" />
                                <x-text-input id="start_time" name="start_time" type="time" class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="end_time" :value="__('End Time')" />
                                <x-text-input id="end_time" name="end_time" type="time" class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('end_time')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="max_bookings_per_slot" :value="__('Max per Slot')" />
                                <x-text-input id="max_bookings_per_slot" name="max_bookings_per_slot" type="number" 
                                             value="5" min="1" max="20" class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('max_bookings_per_slot')" class="mt-2" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_available" value="1" checked class="rounded border-gray-300">
                                <span class="ml-2 text-sm text-gray-600">Available for bookings</span>
                            </label>
                        </div>
                        <div class="mt-4">
                            <x-primary-button>Add Inspection Day</x-primary-button>
                        </div>
                    </form>

                    <h3 class="text-lg font-semibold mb-4">Current Inspection Days</h3>
                    
                    @if($inspectionDays->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Day</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Time Slot</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Max per Slot</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($inspectionDays as $day)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $day->day_name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $day->start_time }} - {{ $day->end_time }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $day->max_bookings_per_slot }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                                    {{ $day->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $day->is_available ? 'Available' : 'Unavailable' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <form action="{{ route('admin.inspection-days.destroy', $day) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="text-red-600 hover:text-red-900 text-sm"
                                                            onclick="return confirm('Are you sure you want to delete this inspection day?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8 bg-gray-50 rounded-lg">
                            <p class="text-gray-500 text-lg">No inspection days configured yet.</p>
                            <p class="text-gray-400 mt-2">Add inspection days above to enable booking functionality.</p>
                        </div>
                    @endif

                    @if($inspectionDays->count() > 0)
                        <div class="mt-6 bg-yellow-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-yellow-800 mb-2">Important Notes:</h4>
                            <ul class="text-yellow-700 text-sm list-disc list-inside">
                                <li>Users can only book inspections on days marked as "Available"</li>
                                <li>Time slots are automatically generated in 30-minute intervals</li>
                                <li>"Max per Slot" limits how many inspections can be booked for each time slot</li>
                                <li>Bookings can only be made for future dates</li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>