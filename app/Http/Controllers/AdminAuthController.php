<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class AdminAuthController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLoginForm()
    {
        // Only allow access if not already logged in
        if (Auth::check() && Auth::user()->isAdmin()) {
            // Redirect to verification notice if email not verified
            if (!Auth::user()->hasVerifiedEmail()) {
                return redirect()->route('verification.notice');
            }
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.auth.login');
    }

    /**
     * Handle admin login.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            
            // Check if user is admin
            if (!$user->isAdmin()) {
                Auth::logout();
                return redirect()->route('admin.login')
                    ->with('error', 'You do not have admin privileges.');
            }

            // Check if email is verified
            if (!$user->hasVerifiedEmail()) {
                return redirect()->route('verification.notice')
                    ->with('warning', 'Please verify your email address before accessing the admin dashboard.');
            }

            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()
            ->with('error', 'Invalid credentials. Please try again.')
            ->withInput();
    }

    /**
     * Show the admin registration form.
     */
     public function showRegistrationForm(Request $request)
{
    if (Auth::check() && Auth::user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }

    // Generate a random raw token
    $rawToken = Str::random(40);

    // Hash and store it in session
    session(['admin_registration_token' => Hash::make($rawToken)]);

    // Pass only the plain token to the view (not URL)
    return view('admin.auth.register', ['token' => $rawToken]);
}


    /**
     * Handle admin registration.
     */
    public function register(Request $request)
    {
        $sessionToken = session('admin_registration_token');

    // Validate hashed token
    if (!$sessionToken || !Hash::check($request->token, $sessionToken)) {
        return redirect()->route('admin.register')
            ->with('error', 'Invalid or expired registration session. Please reload the page and try again.');
    }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'secret_key' => 'required|in:' . config('app.admin_secret_key'),
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'is_admin' => true,
        ]);
        
        event(new Registered($user));
        
        // Send email verification notification
        $user->sendEmailVerificationNotification();

        // Send notification to central admin
        $this->notifyCentralAdmin($user);

        // Clear the registration token
        $request->session()->forget('admin_registration_token');

        // Don't log in automatically - require email verification first
        return redirect()->route('admin.login')
            ->with('success', 'Admin account created successfully! Please check your email for verification link.');
    }

    /**
     * Notify central admin about new registration
     */
     public function verifySecretKey(Request $request)
{
    $request->validate([
        'secret_key' => 'required',
    ]);

    // Compare with configured key
    $configuredKey = (string) config('app.admin_secret_key');
    if (!$configuredKey || !hash_equals($configuredKey, (string) $request->secret_key)) {
        return redirect()->route('admin.login')->with('error', 'Unauthorized request.');
    }

    // Generate and hash registration token
    $rawToken = Str::random(40);
    session(['admin_registration_token' => Hash::make($rawToken)]);

    // Store token temporarily and redirect (no token in URL)
    return redirect()->route('admin.register')->with('registration_token', $rawToken);
}

    protected function notifyCentralAdmin(User $user)
    {
        try {
            $centralAdminEmail = config('mail.admin_address', 'titanrealtyltd@gmail.com');

            Mail::send('emails.admin.new_registration', ['user' => $user], function ($message) use ($centralAdminEmail) {
                $message->to($centralAdminEmail)
                        ->subject('New Admin Registration - ' . config('app.name'));
            });
            
        } catch (\Exception $e) {
            \Log::error('Failed to send admin registration notification: ' . $e->getMessage());
        }
    }

    /**
     * Handle admin logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'You have been logged out successfully.');
    }
}