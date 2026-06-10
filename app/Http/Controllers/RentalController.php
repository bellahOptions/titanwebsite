<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Order;
use App\Mail\InvoiceEmail;
use App\Mail\AdminOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; // Add this import
use Illuminate\Support\Str;

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

                // Create order
        $order = Order::create([
            'order_number' => 'RENT-' . Str::upper(Str::random(10)),
            'property_id' => $property->id,
            'user_id' => Auth::id(),
            'type' => 'rental',
            'amount' => $totalCost,
            'status' => 'pending',
            'details' => [
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'guests' => $request->guests,
                'days' => $days,
                'special_requests' => $request->special_requests,
            ]
        ]);

        // Send emails
        //Mail::to(Auth::user()->email)->send(new InvoiceEmail($order));
        //Mail::to(config('mail.admin_email'))->send(new AdminOrderNotification($order));

        // Here you would save the rental booking and process payment

        return redirect()->route('rentals.confirmation', $order)
            ->with('success', 'Rental booking completed successfully!');
    }

    public function confirmation(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        $property = $order->property;
        return view('rentals.confirmation', compact('order', 'property'));
    }
}