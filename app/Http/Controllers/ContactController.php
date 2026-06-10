<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'nullable|string',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        Mail::to(config('mail.admin_address', 'titanrealtyltd@gmail.com'))->send(new ContactMail($validated));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
