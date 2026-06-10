<x-mail::message>
# Thanks for Reaching Out, {{ $contact->name }}!

We’ve received your message and our team will respond soon.

**Your message:**  
> {{ $contact->message }}

If you need to reach us urgently, just reply to this email.

Thanks,<br>
{{ config('app.name') }} Support
</x-mail::message>
