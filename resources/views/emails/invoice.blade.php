<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->order_number }}</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid #4F46E5; padding-bottom: 20px; margin-bottom: 30px; }
        .details { margin-bottom: 30px; }
        .detail-row { display: flex; justify-content: space-between; margin-bottom: 10px; }
        .total { font-size: 1.2em; font-weight: bold; border-top: 2px solid #4F46E5; padding-top: 10px; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; text-align: center; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>INVOICE</h1>
            <p>Order #{{ $order->order_number }}</p>
            <p>Date: {{ $order->created_at->format('F d, Y') }}</p>
        </div>
        
        <div class="details">
            <h2>Property Details</h2>
            <div class="detail-row">
                <span>Property:</span>
                <span>{{ $order->property->title }}</span>
            </div>
            <div class="detail-row">
                <span>Location:</span>
                <span>{{ $order->property->location }}</span>
            </div>
            <div class="detail-row">
                <span>Type:</span>
                <span>{{ ucfirst($order->type) }}</span>
            </div>
            @if($order->type === 'rental')
            <div class="detail-row">
                <span>Rental Period:</span>
                <span>{{ $order->details_summary }}</span>
            </div>
            @endif
        </div>
        
        <div class="details">
            <h2>Payment Details</h2>
            <div class="detail-row">
                <span>Amount:</span>
                <span>{{ $order->formatted_amount }}</span>
            </div>
            <div class="detail-row">
                <span>Status:</span>
                <span style="color: {{ $order->status === 'paid' ? 'green' : 'orange' }}; text-transform: capitalize;">
                    {{ $order->status }}
                </span>
            </div>
            @if($order->paid_at)
            <div class="detail-row">
                <span>Paid Date:</span>
                <span>{{ $order->paid_at->format('F d, Y') }}</span>
            </div>
            @endif
        </div>
        
        <div class="total">
            <div class="detail-row">
                <span>TOTAL:</span>
                <span>{{ $order->formatted_amount }}</span>
            </div>
        </div>
        
        <div class="footer">
            <p>Thank you for your business!</p>
            <p>If you have any questions, please contact our support team.</p>
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>