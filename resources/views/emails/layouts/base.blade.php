<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title>{{ $emailTitle ?? config('app.name') }}</title>
    <!--[if mso]>
    <noscript><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml></noscript>
    <![endif]-->
    <style>
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; background-color: #f3f4f6; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; }
        a[x-apple-data-detectors] { color: inherit !important; text-decoration: none !important; font-size: inherit !important; font-family: inherit !important; font-weight: inherit !important; line-height: inherit !important; }
        @media screen and (max-width:600px) {
            .wrapper { padding: 16px !important; }
            .content-block { padding: 24px 20px !important; }
            .header-block { padding: 32px 20px !important; }
            .footer-links td { display: block !important; padding: 4px 0 !important; }
        }
    </style>
</head>
<body style="margin:0;padding:0;background-color:#f3f4f6;">
    <!-- Outer wrapper -->
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#f3f4f6;">
        <tr>
            <td class="wrapper" style="padding:32px 16px;">
                <!-- Email container -->
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="max-width:600px;margin:0 auto;">

                    {{-- ===== HEADER ===== --}}
                    <tr>
                        <td style="background:linear-gradient(135deg,#15803d 0%,#166534 100%);border-radius:16px 16px 0 0;padding:0;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="header-block" style="padding:40px 40px 32px;text-align:center;">
                                        <!-- Logo -->
                                        <div style="margin-bottom:20px;">
                                            <img src="{{ asset('images/titan-white.svg') }}" width="160" alt="{{ config('app.name') }}"
                                                onerror="this.style.display='none'"
                                                style="display:block;margin:0 auto;max-width:160px;height:auto;">
                                            <div style="font-size:22px;font-weight:800;color:#ffffff;letter-spacing:-0.3px;margin-top:6px;">
                                                Titan &amp; Equity Resources
                                            </div>
                                        </div>
                                        {{-- Slot: header content --}}
                                        @isset($header)
                                            {{ $header }}
                                        @endisset
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- ===== BODY ===== --}}
                    <tr>
                        <td style="background:#ffffff;padding:0;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="content-block" style="padding:40px 40px 32px;">
                                        {{ $slot }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- ===== CTA BUTTON (optional) ===== --}}
                    @isset($cta)
                        <tr>
                            <td style="background:#ffffff;padding:0 40px 40px;text-align:center;">
                                {{ $cta }}
                            </td>
                        </tr>
                    @endisset

                    {{-- ===== DIVIDER ===== --}}
                    <tr>
                        <td style="background:#ffffff;padding:0 40px;">
                            <hr style="border:none;border-top:1px solid #e5e7eb;margin:0;">
                        </td>
                    </tr>

                    {{-- ===== FOOTER ===== --}}
                    <tr>
                        <td style="background:#ffffff;border-radius:0 0 16px 16px;padding:28px 40px 36px;text-align:center;">
                            <p style="margin:0 0 12px;font-size:13px;color:#6b7280;line-height:1.6;">
                                <strong style="color:#374151;">{{ config('app.name') }}</strong><br>
                                9 Olaoye Segun Str, Ibeju-Lekki, Lagos, Nigeria<br>
                                <a href="tel:+234000000000" style="color:#16a34a;text-decoration:none;">Call Us</a> &nbsp;&middot;&nbsp;
                                <a href="{{ config('app.url') }}" style="color:#16a34a;text-decoration:none;">{{ config('app.url') }}</a>
                            </p>
                            <table role="presentation" class="footer-links" cellspacing="0" cellpadding="0" border="0" style="margin:0 auto 16px;">
                                <tr>
                                    <td style="padding:0 10px;font-size:12px;color:#9ca3af;">
                                        <a href="{{ config('app.url') }}" style="color:#6b7280;text-decoration:none;">Home</a>
                                    </td>
                                    <td style="padding:0 10px;font-size:12px;color:#9ca3af;">
                                        <a href="{{ config('app.url') }}/properties" style="color:#6b7280;text-decoration:none;">Properties</a>
                                    </td>
                                    <td style="padding:0 10px;font-size:12px;color:#9ca3af;">
                                        <a href="{{ config('app.url') }}/contact" style="color:#6b7280;text-decoration:none;">Contact</a>
                                    </td>
                                    <td style="padding:0 10px;font-size:12px;color:#9ca3af;">
                                        <a href="{{ config('app.url') }}/terms" style="color:#6b7280;text-decoration:none;">Terms</a>
                                    </td>
                                </tr>
                            </table>
                            <p style="margin:0;font-size:11px;color:#9ca3af;line-height:1.5;">
                                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.<br>
                                You're receiving this email because you have an account with us.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
