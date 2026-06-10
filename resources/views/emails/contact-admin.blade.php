<x-mail::message>
# New Contact Message

You’ve received a new message via the website contact form.

**Name:** {{ $contact->name }}  
**Email:** {{ $contact->email }}  
**Subject:** {{ $contact->subject ?? 'No subject provided' }}

---

{{ $contact->message }}

<x-mail::button :url="route('contact.form')">
View Contact Form
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
