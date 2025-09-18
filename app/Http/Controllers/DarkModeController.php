<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DarkModeController extends Controller
{
    /**
     * Toggle dark mode.
     */
    public function toggle(Request $request)
    {
        $darkMode = $request->input('dark_mode');
        session(['dark_mode' => $darkMode]);
        
        return response()->json(['success' => true]);
    }
}