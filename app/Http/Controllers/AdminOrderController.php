<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\InvoiceEmail;
use Illuminate\Support\Facades\Mail;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['property', 'user'])
            ->latest()
            ->paginate(20);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['property', 'user']);
        return view('admin.orders.show', compact('order'));
    }

    public function markAsPaid(Order $order)
    {
        $order->markAsPaid();

        // Send updated invoice to customer
        Mail::to($order->user->email)->send(new InvoiceEmail($order));

        return redirect()->back()->with('success', 'Order marked as paid and customer notified.');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,cancelled,completed'
        ]);

        $order->update(['status' => $request->status]);

        if ($request->status === 'paid') {
            $order->update(['paid_at' => now()]);
            Mail::to($order->user->email)->send(new InvoiceEmail($order));
        }

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}