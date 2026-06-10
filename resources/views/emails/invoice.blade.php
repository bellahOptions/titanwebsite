<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Invoice #{{ $order->order_number }}</title>
    <style>
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        body { margin:0;padding:0;background-color:#f3f4f6;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif; }
        img { border:0;height:auto;line-height:100%;outline:none;text-decoration:none; }
        @media screen and (max-width:600px) {
            .wrapper { padding: 16px !important; }
            .content { padding: 24px 20px !important; }
            .row-cell { display: block !important; width: 100% !important; }
        }
    </style>
</head>
<body style="margin:0;padding:0;background-color:#f3f4f6;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#f3f4f6;">
<tr><td class="wrapper" style="padding:32px 16px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="max-width:600px;margin:0 auto;">

    <!-- HEADER -->
    <tr>
        <td style="background:linear-gradient(135deg,#15803d 0%,#166534 100%);border-radius:16px 16px 0 0;padding:40px 40px 32px;text-align:center;">
            <div style="font-size:24px;font-weight:800;color:#ffffff;margin-bottom:8px;">Titan &amp; Equity Resources</div>
            <div style="display:inline-block;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.3);border-radius:8px;padding:6px 20px;">
                <span style="font-size:12px;font-weight:700;color:#bbf7d0;text-transform:uppercase;letter-spacing:2px;">Invoice / Receipt</span>
            </div>
        </td>
    </tr>

    <!-- ORDER META BAR -->
    <tr>
        <td style="background:#f0fdf4;border-left:4px solid #16a34a;padding:16px 40px;">
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="row-cell" style="width:50%;padding:4px 0;">
                        <span style="font-size:11px;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:1px;">Order Number</span><br>
                        <span style="font-size:18px;font-weight:800;color:#15803d;">#{{ $order->order_number }}</span>
                    </td>
                    <td class="row-cell" style="width:50%;padding:4px 0;text-align:right;">
                        <span style="font-size:11px;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:1px;">Date</span><br>
                        <span style="font-size:14px;font-weight:600;color:#374151;">{{ $order->created_at->format('F d, Y') }}</span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- BODY -->
    <tr>
        <td class="content" style="background:#ffffff;padding:36px 40px;">

            <!-- Greeting -->
            <p style="margin:0 0 20px;font-size:16px;color:#111827;font-weight:600;">
                Hello{{ isset($order->user) ? ', ' . $order->user->name : '' }},
            </p>
            <p style="margin:0 0 28px;font-size:14px;color:#6b7280;line-height:1.7;">
                @if($order->status === 'paid')
                    Your payment has been received and confirmed. Here are the details of your transaction.
                @else
                    Here is a summary of your order. Payment is pending.
                @endif
            </p>

            <!-- Section: Property Details -->
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-bottom:28px;">
                <tr>
                    <td style="padding-bottom:10px;">
                        <span style="font-size:12px;font-weight:700;color:#15803d;text-transform:uppercase;letter-spacing:1px;">Property Details</span>
                        <hr style="border:none;border-top:2px solid #dcfce7;margin:8px 0 0;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="padding:8px 0;font-size:13px;color:#6b7280;width:40%;">Property</td>
                                <td style="padding:8px 0;font-size:14px;color:#111827;font-weight:600;">{{ $order->property->title }}</td>
                            </tr>
                            <tr>
                                <td style="padding:8px 0;font-size:13px;color:#6b7280;">Location</td>
                                <td style="padding:8px 0;font-size:14px;color:#374151;">{{ $order->property->location }}</td>
                            </tr>
                            <tr>
                                <td style="padding:8px 0;font-size:13px;color:#6b7280;">Transaction Type</td>
                                <td style="padding:8px 0;">
                                    <span style="display:inline-block;background:{{ $order->type === 'purchase' ? '#ede9fe' : '#dbeafe' }};color:{{ $order->type === 'purchase' ? '#7c3aed' : '#1d4ed8' }};font-size:12px;font-weight:700;padding:3px 10px;border-radius:20px;text-transform:capitalize;">
                                        {{ ucfirst($order->type) }}
                                    </span>
                                </td>
                            </tr>
                            @if($order->type === 'rental')
                            <tr>
                                <td style="padding:8px 0;font-size:13px;color:#6b7280;">Rental Period</td>
                                <td style="padding:8px 0;font-size:14px;color:#374151;">{{ $order->details_summary }}</td>
                            </tr>
                            @endif
                        </table>
                    </td>
                </tr>
            </table>

            <!-- Section: Payment -->
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-bottom:28px;">
                <tr>
                    <td style="padding-bottom:10px;">
                        <span style="font-size:12px;font-weight:700;color:#15803d;text-transform:uppercase;letter-spacing:1px;">Payment Details</span>
                        <hr style="border:none;border-top:2px solid #dcfce7;margin:8px 0 0;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            @if($order->paid_at)
                            <tr>
                                <td style="padding:8px 0;font-size:13px;color:#6b7280;width:40%;">Paid On</td>
                                <td style="padding:8px 0;font-size:14px;color:#374151;">{{ $order->paid_at->format('F d, Y') }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td style="padding:8px 0;font-size:13px;color:#6b7280;">Payment Status</td>
                                <td style="padding:8px 0;">
                                    <span style="display:inline-block;background:{{ $order->status === 'paid' ? '#dcfce7' : '#fef9c3' }};color:{{ $order->status === 'paid' ? '#15803d' : '#92400e' }};font-size:12px;font-weight:700;padding:3px 10px;border-radius:20px;text-transform:capitalize;">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <!-- Total block -->
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background:#f0fdf4;border:2px solid #16a34a;border-radius:12px;padding:0;margin-bottom:32px;">
                <tr>
                    <td style="padding:20px 24px;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="font-size:14px;font-weight:700;color:#374151;">Total Amount</td>
                                <td style="text-align:right;font-size:24px;font-weight:800;color:#15803d;">{{ $order->formatted_amount }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <!-- CTA -->
            <div style="text-align:center;margin-bottom:8px;">
                <a href="{{ config('app.url') }}/dashboard"
                    style="display:inline-block;padding:14px 36px;background:#16a34a;color:#ffffff;font-size:15px;font-weight:700;text-decoration:none;border-radius:10px;letter-spacing:0.2px;">
                    View in Dashboard
                </a>
            </div>

        </td>
    </tr>

    <!-- DIVIDER -->
    <tr><td style="background:#ffffff;padding:0 40px;"><hr style="border:none;border-top:1px solid #e5e7eb;margin:0;"></td></tr>

    <!-- FOOTER -->
    <tr>
        <td style="background:#ffffff;border-radius:0 0 16px 16px;padding:28px 40px 36px;text-align:center;">
            <p style="margin:0 0 10px;font-size:13px;color:#6b7280;line-height:1.6;">
                <strong style="color:#374151;">Titan &amp; Equity Resources Limited</strong><br>
                9 Olaoye Segun Str, Ibeju-Lekki, Lagos, Nigeria<br>
                <a href="{{ config('app.url') }}" style="color:#16a34a;text-decoration:none;">{{ config('app.url') }}</a>
            </p>
            <p style="margin:0;font-size:11px;color:#9ca3af;">&copy; {{ date('Y') }} Titan &amp; Equity Resources Limited. All rights reserved.</p>
        </td>
    </tr>

</table>
</td></tr>
</table>
</body>
</html>
