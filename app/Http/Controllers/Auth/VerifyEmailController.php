<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Mark email as verified if not already
        if (! $user->hasVerifiedEmail()) {
            if ($user->markEmailAsVerified()) {
                event(new Verified($user));
            }
        }

        // Redirect admin to their login page after verification
        if ($user->role === 'admin') {
            return redirect()->to('/admin-secret-login')
                ->with('status', 'Your email has been successfully verified! Please log in to continue.');
        }

        // Default redirect for normal users
        return redirect()->intended(route('dashboard', absolute: false) . '?verified=1');
    }
}
