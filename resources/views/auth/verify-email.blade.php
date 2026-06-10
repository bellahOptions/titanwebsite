<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-green-50 to-emerald-100 dark:from-gray-900 dark:to-gray-800 flex items-center justify-center p-4">
        <div class="w-full max-w-lg">
            
            <!-- Main Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                
                <!-- Header with Icon -->
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 px-8 py-10 border-b border-green-200 dark:border-green-800 text-center">
                    <!-- Animated Email Icon -->
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-green-600 rounded-full shadow-lg mb-4 animate-bounce">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                        Verify Your Email
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400">
                        You're almost there!
                    </p>
                </div>

                <!-- Content -->
                <div class="p-8 space-y-6">
                    
                    <!-- Success Message -->
                    @if (session('status') == 'verification-link-sent')
                        <div x-data="{show: true}" x-show="show" x-transition
                            x-init="setTimeout(() => show = false, 10000)"
                            class="p-4 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 rounded-r-xl">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3 flex-1">
                                    <h3 class="text-sm font-bold text-green-800 dark:text-green-300 mb-1">
                                        Email Sent Successfully!
                                    </h3>
                                    <p class="text-sm text-green-700 dark:text-green-400">
                                        A new verification link has been sent to your email address. Please check your inbox (and spam folder).
                                    </p>
                                </div>
                                <button @click="show = false" class="flex-shrink-0 ml-4 text-green-400 hover:text-green-600 dark:hover:text-green-200 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endif

                    <!-- Main Message -->
                    <div class="text-center space-y-4">
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            Thanks for signing up! We've sent a verification link to your email address.
                        </p>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">
                            Please click the link in the email to verify your account and unlock all features.
                        </p>
                    </div>

                    <!-- Steps Guide -->
                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-6 space-y-3">
                        <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            What to do next:
                        </h3>
                        
                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                                    <span class="text-xs font-bold text-green-600 dark:text-green-400">1</span>
                                </div>
                                <p class="text-sm text-gray-700 dark:text-gray-300 pt-0.5">
                                    Check your email inbox for a message from Titan & Equity
                                </p>
                            </div>
                            
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                                    <span class="text-xs font-bold text-green-600 dark:text-green-400">2</span>
                                </div>
                                <p class="text-sm text-gray-700 dark:text-gray-300 pt-0.5">
                                    Click the verification link in the email
                                </p>
                            </div>
                            
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                                    <span class="text-xs font-bold text-green-600 dark:text-green-400">3</span>
                                </div>
                                <p class="text-sm text-gray-700 dark:text-gray-300 pt-0.5">
                                    You'll be redirected and ready to go!
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Didn't Receive Email -->
                    <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <h4 class="text-sm font-semibold text-blue-900 dark:text-blue-300 mb-1">
                                    Didn't receive the email?
                                </h4>
                                <ul class="text-xs text-blue-800 dark:text-blue-400 space-y-1">
                                    <li>• Check your spam or junk folder</li>
                                    <li>• Make sure you entered the correct email address</li>
                                    <li>• Wait a few minutes for the email to arrive</li>
                                    <li>• Click the button below to resend</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="space-y-3 pt-2">
                        <!-- Resend Button -->
                        <form method="POST" action="{{ route('verification.send') }}" id="resendForm">
                            @csrf
                            <button 
                                type="submit"
                                id="resendBtn"
                                class="w-full py-3.5 bg-green-600 hover:bg-green-700 dark:bg-green-600 dark:hover:bg-green-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 disabled:opacity-50 disabled:cursor-not-allowed">
                                <span class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    <span id="resendText">Resend Verification Email</span>
                                </span>
                            </button>
                        </form>

                        <!-- Logout Button -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button 
                                type="submit"
                                class="w-full py-3.5 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl transition-all duration-200 border-2 border-transparent hover:border-gray-300 dark:hover:border-gray-500">
                                <span class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    Log Out
                                </span>
                            </button>
                        </form>
                    </div>

                    <!-- Help Section -->
                    <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                        <div class="text-center">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                                Need help with verification?
                            </p>
                            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-sm font-medium text-green-600 dark:text-green-400 hover:text-green-700 dark:hover:text-green-300 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                Contact Support
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    This helps us keep your account secure and enables all features.
                </p>
            </div>
        </div>
    </div>

    <!-- JavaScript for Resend Timer -->
    <script>
        let canResend = true;
        let countdown = 60;
        let countdownInterval;

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('resendForm');
            const btn = document.getElementById('resendBtn');
            const btnText = document.getElementById('resendText');

            form.addEventListener('submit', function(e) {
                if (!canResend) {
                    e.preventDefault();
                    return false;
                }

                // Disable button and start countdown
                canResend = false;
                btn.disabled = true;
                countdown = 60;

                // Show loading state
                btn.innerHTML = `
                    <span class="flex items-center justify-center gap-2">
                        <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Sending Email...
                    </span>
                `;

                // After form submission completes, start countdown
                setTimeout(function() {
                    startCountdown();
                }, 1000);
            });

            function startCountdown() {
                countdownInterval = setInterval(function() {
                    countdown--;
                    
                    btn.innerHTML = `
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Resend available in ${countdown}s
                        </span>
                    `;

                    if (countdown <= 0) {
                        clearInterval(countdownInterval);
                        canResend = true;
                        btn.disabled = false;
                        btn.innerHTML = `
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                Resend Verification Email
                            </span>
                        `;
                    }
                }, 1000);
            }

            // Check if page was just loaded after resend
            @if (session('status') == 'verification-link-sent')
                canResend = false;
                btn.disabled = true;
                startCountdown();
            @endif
        });
    </script>
</x-guest-layout>