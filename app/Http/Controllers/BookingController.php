<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; // ✅ Import the Appointment model

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'phone'      => 'required|string|max:20',
            'email'      => 'required|email|max:255',
        ]);

        Appointment::create($validated); // ✅ Now it will find the model

        return back()->with('success', 'Your appointment has been booked successfully!');
    }
}
