<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use App\Models\InspectionDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create(Property $property)
    {
        // Check if property is available for inspection
        if (!$property->availableForInspection()) {
            return redirect()->back()->with('error', 'This property is not available for inspection.');
        }

        $availableDays = InspectionDay::where('is_available', true)->get();
        $existingBooking = Booking::where('property_id', $property->id)
            ->where('user_id', Auth::id())
            ->first();

           // Get current booking counts for the next 30 days
    $bookingData = [];
    $startDate = now()->addDay();
    $endDate = now()->addDays(30);
    
    $existingBookings = Booking::where('day_name', '>=', $startDate)
        ->where('day_name', '<=', $endDate)
        ->get()
        ->groupBy(['day_name', 'inspection_time']);
    
    foreach ($existingBookings as $date => $times) {
        foreach ($times as $time => $bookings) {
            $bookingData[$date][$time] = $bookings->count();
        }
    }

    return view('bookings.create', compact('property', 'availableDays', 'existingBooking', 'bookingData'));
    }

    public function store(Request $request, Property $property)
    {
        // Check if property is available for inspection
        if (!$property->availableForInspection()) {
            return redirect()->back()->with('error', 'This property is not available for inspection.');
        }

        // Prevent property owner from booking their own property
        if ($property->user_id === Auth::id()) {
            return redirect()->back()->with('error', 'You cannot book an inspection for your own property.');
        }

        // Check if user already has a booking for this property
        $existingBooking = Booking::where('property_id', $property->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingBooking) {
            return redirect()->back()->with('error', 'You already have a booking for this property.');
        }

        $request->validate([
            'inspection_date' => 'required|date|after:today',
            'inspection_time' => 'required',
            'notes' => 'nullable|string|max:500'
        ]);

        // Check if the selected day is available
        $selectedDay = strtolower(\Carbon\Carbon::parse($request->inspection_date)->englishDayOfWeek);
        $inspectionDay = InspectionDay::where('day_name', 'like', "%$selectedDay%")
            ->where('is_available', true)
            ->first();

        if (!$inspectionDay) {
            return redirect()->back()->with('error', 'Inspections are not available on the selected day.');
        }

        // Check time slot availability
        $timeSlotCount = Booking::where('inspection_date', $request->inspection_date)
            ->where('inspection_time', $request->inspection_time)
            ->count();

        if ($timeSlotCount >= $inspectionDay->max_bookings_per_slot) {
            return redirect()->back()->with('error', 'This time slot is fully booked. Please choose another time.');
        }

        Booking::create([
            'property_id' => $property->id,
            'user_id' => Auth::id(),
            'inspection_date' => $request->inspection_date,
            'inspection_time' => $request->inspection_time,
            'notes' => $request->notes,
            'status' => 'pending'
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'Inspection booking request submitted successfully!');
    }

    public function index()
    {
        $bookings = Booking::with('property')
            ->where('user_id', Auth::id())
            ->orderBy('inspection_date', 'desc')
            ->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    public function destroy(Booking $booking)
    {
        $this->authorize('delete', $booking);
        
        $booking->delete();

        return redirect()->back()->with('success', 'Booking cancelled successfully.');
    }
}