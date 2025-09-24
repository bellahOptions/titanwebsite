<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function showRentalForm(Property $property)
    {
        if (!$property->canBeRented()) {
            return redirect()->back()->with('error', 'This property is not available for rent.');
        }

        return view('rentals.form', compact('property'));
    }

    public function processRental(Request $request, Property $property)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (!$property->canBeRented()) {
            return redirect()->back()->with('error', 'This property is no longer available for rent.');
        }

        $request->validate([
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1|max:' . ($property->bedrooms * 2),
            'special_requests' => 'nullable|string|max:500',
            'agree_terms' => 'required|accepted',
        ]);

        // Calculate total cost based on days and property price
        $checkIn = new \Carbon\Carbon($request->check_in);
        $checkOut = new \Carbon\Carbon($request->check_out);
        $days = $checkIn->diffInDays($checkOut);
        $totalCost = $days * $property->price;

        // Here you would save the rental booking and process payment
        // For now, we'll just show a confirmation

        return redirect()->route('rentals.confirmation', $property)
            ->with('success', 'Rental booking completed successfully!')
            ->with('booking_details', [
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'guests' => $request->guests,
                'days' => $days,
                'total_cost' => $totalCost,
            ]);
    }

    public function confirmation(Property $property)
    {
        return view('rentals.confirmation', compact('property'));
    }
}