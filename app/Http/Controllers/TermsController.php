<?php

namespace App\Http\Controllers;

use App\Models\Terms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TermsUpdatedMail;

class TermsController extends Controller
{
    // 🧑‍💼 Admin View
    public function edit()
    {
        $terms = Terms::firstOrCreate(['id' => 1], ['content' => '']);
        return view('admin.edit-terms', compact('terms'));
    }

public function update(Request $request)
{
    $request->validate([
        'content' => 'required|string',
    ]);

    $terms = Terms::first();
    $terms->update(['content' => $request->content]);

    // Send email to all users
    $users = User::pluck('email');
    foreach ($users as $email) {
        Mail::to($email)->queue(new TermsUpdatedMail($terms));
    }

    return back()->with('success', 'Terms of Service updated successfully and notifications sent to all users!');
}

    // 🌐 User View
    public function show()
    {
        $terms = Terms::first();
        return view('terms', compact('terms'));
    }
}
