<?php

namespace App\Http\Controllers;

use App\Models\InspectionDay;
use Illuminate\Http\Request;

class AdminInspectionController extends Controller
{
    public function index()
    {
        $inspectionDays = InspectionDay::all();
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        return view('admin.inspection-days.index', compact('inspectionDays', 'daysOfWeek'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'day_name' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'max_bookings_per_slot' => 'required|integer|min:1|max:20'
        ]);

        InspectionDay::create([
            'day_name' => $request->day_name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'max_bookings_per_slot' => $request->max_bookings_per_slot,
            'is_available' => $request->has('is_available')
        ]);

        return redirect()->back()->with('success', 'Inspection day added successfully.');
    }

    public function update(Request $request, InspectionDay $inspectionDay)
    {
        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'max_bookings_per_slot' => 'required|integer|min:1|max:20'
        ]);

        $inspectionDay->update([
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'max_bookings_per_slot' => $request->max_bookings_per_slot,
            'is_available' => $request->has('is_available')
        ]);

        return redirect()->back()->with('success', 'Inspection day updated successfully.');
    }

    public function destroy(InspectionDay $inspectionDay)
    {
        $inspectionDay->delete();
        return redirect()->back()->with('success', 'Inspection day deleted successfully.');
    }
}