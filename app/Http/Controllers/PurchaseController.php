<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function confirmation(Property $property)
    {
        return view('purchases.confirmation', compact('property'));
    }
}