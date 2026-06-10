@php
    $emailTitle = $subject ?? config('app.name') . ' — Notification';
@endphp
<x-emails.layouts.base :emailTitle="$emailTitle">

    <x-slot name="header">
        <div style="width:56px;height:56px;background:rgba(255,255,255,0.2);border-radius:50%;margin:0 auto 16px;display:flex;align-items:center;justify-content:center;">
            <img src="{{ asset('images/icon.jpg') }}" width="32" height="32" alt="" style="border-radius:50%;">
        </div>
        <h1 style="margin:0;font-size:22px;font-weight:700;color:#ffffff;line-height:1.3;">
            {{ $title ?? 'Message from Titan & Equity' }}
        </h1>
        @if(isset($subtitle))
            <p style="margin:8px 0 0;font-size:14px;color:#bbf7d0;line-height:1.5;">{{ $subtitle }}</p>
        @endif
    </x-slot>

    <!-- Greeting -->
    @if(isset($greeting))
        <p style="margin:0 0 20px;font-size:16px;color:#111827;font-weight:600;">{{ $greeting }}</p>
    @endif

    <!-- Body -->
    <div style="font-size:15px;color:#374151;line-height:1.7;">
        {!! $body ?? $slot !!}
    </div>

    @isset($cta)
        <x-slot name="cta">
            <a href="{{ $ctaUrl ?? '#' }}"
                style="display:inline-block;padding:14px 32px;background:#16a34a;color:#ffffff;font-size:15px;font-weight:700;text-decoration:none;border-radius:10px;letter-spacing:0.2px;">
                {{ $ctaText ?? 'View Details' }}
            </a>
        </x-slot>
    @endisset

</x-emails.layouts.base>
