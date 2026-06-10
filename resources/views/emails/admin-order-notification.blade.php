<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Order Notification</title>
</head>
<body>
    <h2>New Order Received</h2>
    
    <p>A new order has been placed on your platform:</p>
    
    <ul>
        <li><strong>Order #:</strong> {{ $order->order_number }}</li>
        <li><strong>Customer:</strong> {{ $order->user->name }} ({{ $order->user->email }})</li>
        <li><strong>Property:</strong> {{ $order->property->title }}</li>
        <li><strong>Type:</strong> {{ ucfirst($order->type) }}</li>
        <li><strong>Amount:</strong> ${{ number_format($order->amount, 2) }}</li>
        <li><strong>Date:</strong> {{ $order->created_at->format('F d, Y H:i') }}</li>
    </ul>
    
    <p>Please log in to the admin panel to view and manage this order.</p>
    
    <p>Best regards,<br>{{ config('app.name') }}</p>
</body>
</html>