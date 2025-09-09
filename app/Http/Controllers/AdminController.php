<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show admin login form
    public function loginForm()
    {
        return view('admin.login'); // points to resources/views/admin/login.blade.php
    }

    // Handle admin login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password,
            'is_admin' => 1
        ])) {
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }

    // Admin dashboard
    public function dashboard()
    {
        return view('admin.dashboard'); // points to resources/views/admin/dashboard.blade.php
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
