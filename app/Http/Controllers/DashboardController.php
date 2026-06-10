<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $bookings = $user->bookings()
            ->with('property')
            ->latest()
            ->take(5)
            ->get();

        $orders = $user->orders()
            ->with('property')
            ->latest()
            ->take(5)
            ->get();

        $stats = [
            'total_bookings'  => $user->bookings()->count(),
            'active_bookings' => $user->bookings()->whereIn('status', ['pending','confirmed'])->count(),
            'total_orders'    => $user->orders()->count(),
            'pending_orders'  => $user->orders()->where('status','pending')->count(),
        ];

        return view('dashboard', compact('bookings', 'orders', 'stats'));
    }
}
