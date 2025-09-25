<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Order;
use App\Mail\InvoiceEmail;
use App\Mail\AdminOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class PurchaseController extends Controller
{
    public function checkout(Property $property)
    {
        if (!$property->canBePurchased()) {
            return redirect()->back()->with('error', 'This property is not available for purchase.');
        }

        return view('purchases.checkout', compact('property'));
    }

    public function processPurchase(Request $request, Property $property)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (!$property->canBePurchased()) {
            return redirect()->back()->with('error', 'This property is no longer available for purchase.');
        }

        $request->validate([
            'payment_method' => 'required|string|in:card,bank_transfer,crypto',
            'agree_terms' => 'required|accepted',
        ]);

        // Here you would integrate with your payment gateway
        // For now, we'll just create a purchase record

        return redirect()->route('purchases.confirmation', $property)
            ->with('success', 'Purchase completed successfully!');
    }

        public function processPurchase(Request $request, Property $property)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (!$property->canBePurchased()) {
            return redirect()->back()->with('error', 'This property is no longer available for purchase.');
        }

        $request->validate([
            'payment_method' => 'required|string|in:card,bank_transfer,crypto',
            'agree_terms' => 'required|accepted',
        ]);

        // Create order
        $order = Order::create([
            'order_number' => 'ORD-' . Str::upper(Str::random(10)),
            'property_id' => $property->id,
            'user_id' => Auth::id(),
            'type' => 'purchase',
            'amount' => $property->price,
            'status' => 'pending',
            'details' => [
                'payment_method' => $request->payment_method,
            ]
        ]);

        // Send emails
        Mail::to(Auth::user()->email)->send(new InvoiceEmail($order));
        Mail::to(config('mail.admin_email'))->send(new AdminOrderNotification($order));

        return redirect()->route('purchases.confirmation', $order)
            ->with('success', 'Purchase completed successfully!');
    }

    public function confirmation(Property $property)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        return view('purchases.confirmation', compact('property'));
    }
}