<x-mail::message>
# Hello {{ $contact->name }},

{{ $replyMessage }}

---

If you have any other questions, just reply to this email.

Thanks,<br>
{{ config('app.name') }} Support
</x-mail::message>
