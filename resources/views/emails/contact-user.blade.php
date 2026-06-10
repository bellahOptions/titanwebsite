<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>We received your message — {{ config('app.name') }}</title>
    <style>
        body,table,td,a{-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}
        body{margin:0;padding:0;background-color:#f3f4f6;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif}
        img{border:0;height:auto;line-height:100%;outline:none;text-decoration:none}
        @media screen and (max-width:600px){.wrapper{padding:16px !important}.content{padding:24px 20px !important}}
    </style>
</head>
<body style="margin:0;padding:0;background-color:#f3f4f6;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#f3f4f6;">
<tr><td class="wrapper" style="padding:32px 16px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="max-width:600px;margin:0 auto;">

    <!-- HEADER -->
    <tr>
        <td style="background:linear-gradient(135deg,#15803d 0%,#166534 100%);border-radius:16px 16px 0 0;padding:40px 40px 32px;text-align:center;">
            <div style="font-size:22px;font-weight:800;color:#ffffff;margin-bottom:16px;">Titan &amp; Equity Resources</div>
            <div style="width:64px;height:64px;background:rgba(255,255,255,0.2);border-radius:50%;margin:0 auto 16px;display:inline-flex;align-items:center;justify-content:center;">
                <svg width="32" height="32" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/></svg>
            </div>
            <h1 style="margin:0;font-size:22px;font-weight:700;color:#ffffff;line-height:1.3;">Message Received!</h1>
            <p style="margin:8px 0 0;font-size:14px;color:#bbf7d0;line-height:1.5;">We'll get back to you shortly</p>
        </td>
    </tr>

    <!-- BODY -->
    <tr>
        <td class="content" style="background:#ffffff;padding:36px 40px;">
            <p style="margin:0 0 20px;font-size:16px;color:#111827;font-weight:600;">Hi {{ $contact->name }},</p>
            <p style="margin:0 0 24px;font-size:15px;color:#374151;line-height:1.7;">
                Thank you for reaching out to us! We've successfully received your message and our team will review it and respond as soon as possible — usually within 24–48 hours.
            </p>

            <!-- Message preview -->
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background:#f9fafb;border:1px solid #e5e7eb;border-left:4px solid #16a34a;border-radius:0 8px 8px 0;margin-bottom:28px;">
                <tr>
                    <td style="padding:20px 24px;">
                        <p style="margin:0 0 8px;font-size:11px;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:1px;">Your Message</p>
                        <p style="margin:0;font-size:14px;color:#374151;line-height:1.7;font-style:italic;">"{{ $contact->message }}"</p>
                    </td>
                </tr>
            </table>

            @if($contact->subject)
            <p style="margin:0 0 16px;font-size:14px;color:#6b7280;"><strong style="color:#374151;">Subject:</strong> {{ $contact->subject }}</p>
            @endif

            <p style="margin:0 0 28px;font-size:15px;color:#374151;line-height:1.7;">
                If you have additional questions or need immediate assistance, feel free to reply directly to this email or call us.
            </p>

            <!-- CTA -->
            <div style="text-align:center;margin-bottom:8px;">
                <a href="{{ config('app.url') }}"
                    style="display:inline-block;padding:13px 32px;background:#16a34a;color:#ffffff;font-size:14px;font-weight:700;text-decoration:none;border-radius:10px;">
                    Visit Our Website
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
                9 Olaoye Segun Str, Ibeju-Lekki, Lagos, Nigeria
            </p>
            <p style="margin:0;font-size:11px;color:#9ca3af;">&copy; {{ date('Y') }} Titan &amp; Equity Resources Limited. All rights reserved.</p>
        </td>
    </tr>

</table>
</td></tr>
</table>
</body>
</html>
