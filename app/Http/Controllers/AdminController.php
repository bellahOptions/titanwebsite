<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Blog;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller  // <-- Make sure it extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified'); // <-- Add this line to require email verification
        $this->middleware(function ($request, $next) {
            if (!auth()->user()->isAdmin()) {
                abort(403, 'Admin access required');
            }
            return $next($request);
        });
    }


    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        // Check if the is_admin column exists before using it
        $hasIsAdminColumn = Schema::hasColumn('users', 'is_admin');
        
        $stats = [
            'total_properties' => Property::count(),
            'active_properties' => Property::where('status', true)->count(),
            'featured_properties' => Property::where('featured', true)->count(),
            'total_blogs' => Blog::count(),
            'published_blogs' => Blog::where('published', true)->count(),
            'total_users' => $hasIsAdminColumn ? User::where('is_admin', false)->count() : User::count(),
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
        ];

        $recentProperties = Property::latest()->take(5)->get();
        $recentBlogs = Blog::latest()->take(5)->get();
        $recentBookings = Booking::with(['user', 'property'])->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentProperties', 'recentBlogs', 'recentBookings'));
    }
}