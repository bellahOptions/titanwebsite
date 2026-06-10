<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-green-50 to-emerald-100 dark:from-gray-900 dark:to-gray-800 flex items-center justify-center p-4">
        <div class="w-full max-w-xl">

            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/titan-color.svg') }}" width="150" alt="Titan Logo">
                </a>
            </div>

            <!-- Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">

                <!-- Header -->
                <div class="bg-gradient-to-r from-green-600 to-green-700 px-8 py-8 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-white mb-1">Create Your Account</h1>
                    <p class="text-green-100 text-sm">Join Titan & Equity Resources today</p>
                </div>

                <!-- Progress Bar -->
                <div class="bg-green-50 dark:bg-green-900/20 px-8 py-3 border-b border-green-100 dark:border-green-800">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500 dark:text-gray-400">Form progress</span>
                        <div class="flex items-center gap-2">
                            <div class="w-28 h-1.5 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                <div id="progressFill" class="h-full bg-green-600 transition-all duration-300" style="width:0%"></div>
                            </div>
                            <span id="progressText" class="font-semibold text-green-600 dark:text-green-400 text-xs w-8">0%</span>
                        </div>
                    </div>
                </div>

                <!-- Inline error alert (hidden by default) -->
                <div id="formErrorAlert" class="hidden mx-6 mt-4 p-3 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 rounded-r-xl">
                    <p class="text-sm text-red-700 dark:text-red-300" id="formErrorText">Please correct all errors before submitting.</p>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('register') }}" id="registerForm" class="p-8 space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </span>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" minlength="3"
                                class="w-full pl-12 pr-10 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all outline-none @error('name') border-red-500 @enderror"
                                placeholder="John Doe">
                            <span class="vi absolute right-3 top-1/2 -translate-y-1/2 hidden text-green-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </span>
                        </div>
                        @error('name')<p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                    </div>

                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                            Address <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </span>
                            <input id="address" type="text" name="address" value="{{ old('address') }}" required autocomplete="street-address" minlength="10"
                                class="w-full pl-12 pr-10 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all outline-none @error('address') border-red-500 @enderror"
                                placeholder="123 Main St, Lagos, Nigeria">
                            <span class="vi absolute right-3 top-1/2 -translate-y-1/2 hidden text-green-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </span>
                        </div>
                        @error('address')<p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                            Phone / WhatsApp <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </span>
                            <input id="phone" type="tel" name="phone" value="{{ old('phone') }}" required autocomplete="tel" pattern="[0-9+\-\s()]+" minlength="10" maxlength="20"
                                class="w-full pl-12 pr-10 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all outline-none @error('phone') border-red-500 @enderror"
                                placeholder="+234 801 234 5678">
                            <span class="vi absolute right-3 top-1/2 -translate-y-1/2 hidden text-green-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </span>
                        </div>
                        @error('phone')<p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                                class="w-full pl-12 pr-10 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all outline-none @error('email') border-red-500 @enderror"
                                placeholder="you@example.com">
                            <span class="vi absolute right-3 top-1/2 -translate-y-1/2 hidden text-green-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </span>
                        </div>
                        @error('email')<p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <input id="password" type="password" name="password" required autocomplete="new-password" minlength="8"
                                class="w-full pl-12 pr-12 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all outline-none @error('password') border-red-500 @enderror"
                                placeholder="••••••••">
                            <button type="button" onclick="togglePwd('password','pe1','po1')" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                <svg id="pe1" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <svg id="po1" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                            </button>
                        </div>
                        <div class="mt-1.5 flex gap-1">
                            <div class="h-1 flex-1 rounded-full bg-gray-200 dark:bg-gray-700" id="s1"></div>
                            <div class="h-1 flex-1 rounded-full bg-gray-200 dark:bg-gray-700" id="s2"></div>
                            <div class="h-1 flex-1 rounded-full bg-gray-200 dark:bg-gray-700" id="s3"></div>
                            <div class="h-1 flex-1 rounded-full bg-gray-200 dark:bg-gray-700" id="s4"></div>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5" id="pwd-strength">Min 8 chars with uppercase, number & symbol</p>
                        @error('password')<p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                            Confirm Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </span>
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                                class="w-full pl-12 pr-12 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all outline-none @error('password_confirmation') border-red-500 @enderror"
                                placeholder="••••••••">
                            <button type="button" onclick="togglePwd('password_confirmation','pe2','po2')" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                <svg id="pe2" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <svg id="po2" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                            </button>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5" id="confirm-hint">Must match the password above</p>
                        @error('password_confirmation')<p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                    </div>

                    <!-- Terms -->
                    <div class="pt-2">
                        <label class="flex items-start cursor-pointer gap-3">
                            <input id="terms" type="checkbox" required
                                class="mt-0.5 w-5 h-5 text-green-600 bg-white dark:bg-gray-700 border-2 border-gray-300 dark:border-gray-600 rounded focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30">
                            <span class="text-sm text-gray-600 dark:text-gray-400">
                                I agree to the <a href="{{ route('terms') }}" target="_blank" class="text-green-600 hover:text-green-700 font-medium underline">Terms of Service</a> and <a href="{{ route('terms') }}" target="_blank" class="text-green-600 hover:text-green-700 font-medium underline">Privacy Policy</a>
                            </span>
                        </label>
                        <p id="terms-error" class="hidden mt-1 text-xs text-red-600 dark:text-red-400">You must accept the terms to continue.</p>
                    </div>

                    <!-- Submit -->
                    <div class="pt-1">
                        <button type="submit" id="submitBtn"
                            class="w-full py-3.5 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                                Create Account
                            </span>
                        </button>
                    </div>
                </form>

                <!-- Sign In Link -->
                <div class="px-8 pb-8">
                    <div class="relative mb-5">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200 dark:border-gray-700"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">Already have an account?</span>
                        </div>
                    </div>
                    <a href="{{ route('login') }}"
                        class="w-full flex items-center justify-center gap-2 py-3 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl transition-all duration-200 border-2 border-transparent hover:border-green-300 dark:hover:border-green-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Sign In Instead
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-6 text-center flex items-center justify-center gap-6 text-sm">
                <a href="{{ route('about') }}" class="text-gray-600 dark:text-gray-400 hover:text-green-600 dark:hover:text-green-400 transition-colors">About</a>
                <span class="text-gray-300 dark:text-gray-600">•</span>
                <a href="{{ route('contact') }}" class="text-gray-600 dark:text-gray-400 hover:text-green-600 dark:hover:text-green-400 transition-colors">Support</a>
                <span class="text-gray-300 dark:text-gray-600">•</span>
                <a href="{{ route('terms') }}" class="text-gray-600 dark:text-gray-400 hover:text-green-600 dark:hover:text-green-400 transition-colors">Terms</a>
            </div>
        </div>
    </div>

    <script>
        function togglePwd(f, e, o) {
            const el = document.getElementById(f);
            el.type = el.type === 'password' ? 'text' : 'password';
            document.getElementById(e).classList.toggle('hidden');
            document.getElementById(o).classList.toggle('hidden');
        }

        const fields = ['name','address','phone','email','password','password_confirmation'];
        const validators = {
            name: v => v.length >= 3,
            address: v => v.length >= 10,
            phone: v => /^[0-9+\-\s()]{10,20}$/.test(v),
            email: v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v),
            password: v => v.length >= 8 && /[A-Z]/.test(v) && /[0-9]/.test(v),
            password_confirmation: v => v.length >= 8 && v === document.getElementById('password').value,
        };

        function strengthLevel(v) {
            let s = 0;
            if (v.length >= 8) s++;
            if (/[a-z]/.test(v) && /[A-Z]/.test(v)) s++;
            if (/[0-9]/.test(v)) s++;
            if (/[^a-zA-Z0-9]/.test(v)) s++;
            return s;
        }

        function updateStrength(v) {
            const colors = ['bg-red-500','bg-orange-500','bg-yellow-500','bg-green-500'];
            const labels = ['Weak','Fair','Good','Strong'];
            const s = strengthLevel(v);
            ['s1','s2','s3','s4'].forEach((id, i) => {
                document.getElementById(id).className = 'h-1 flex-1 rounded-full ' + (i < s ? colors[s-1] : 'bg-gray-200 dark:bg-gray-700');
            });
            document.getElementById('pwd-strength').textContent = v.length ? (labels[s-1] || 'Very weak') : 'Min 8 chars with uppercase, number & symbol';
        }

        function validateField(field) {
            const v = field.value.trim();
            const ok = validators[field.id] ? validators[field.id](v) : v.length > 0;
            const vi = field.parentElement.querySelector('.vi');
            if (v.length > 0) {
                field.classList.toggle('border-green-500', ok);
                field.classList.toggle('border-red-500', !ok);
                field.classList.remove('border-gray-200');
                if (vi) vi.classList.toggle('hidden', !ok);
            } else {
                field.classList.remove('border-green-500','border-red-500');
                field.classList.add('border-gray-200');
                if (vi) vi.classList.add('hidden');
            }
            return ok && v.length > 0;
        }

        function updateProgress() {
            let valid = 0;
            fields.forEach(id => {
                const el = document.getElementById(id);
                if (el && validateField(el)) valid++;
            });
            const pct = Math.round((valid / fields.length) * 100);
            document.getElementById('progressFill').style.width = pct + '%';
            document.getElementById('progressText').textContent = pct + '%';
        }

        document.addEventListener('DOMContentLoaded', () => {
            fields.forEach(id => {
                const el = document.getElementById(id);
                if (!el) return;
                el.addEventListener('input', () => {
                    if (id === 'password') updateStrength(el.value);
                    validateField(el);
                    if (id === 'password') {
                        const c = document.getElementById('password_confirmation');
                        if (c.value) {
                            const ok = c.value === el.value;
                            document.getElementById('confirm-hint').textContent = ok ? '✓ Passwords match' : '✗ Passwords do not match';
                            document.getElementById('confirm-hint').className = 'text-xs mt-0.5 ' + (ok ? 'text-green-600' : 'text-red-600');
                        }
                    }
                    if (id === 'password_confirmation') {
                        const ok = el.value === document.getElementById('password').value && el.value.length >= 8;
                        document.getElementById('confirm-hint').textContent = el.value ? (ok ? '✓ Passwords match' : '✗ Passwords do not match') : 'Must match the password above';
                        document.getElementById('confirm-hint').className = 'text-xs mt-0.5 ' + (el.value ? (ok ? 'text-green-600' : 'text-red-600') : 'text-gray-500 dark:text-gray-400');
                    }
                    updateProgress();
                });
            });

            document.getElementById('registerForm').addEventListener('submit', function(e) {
                let ok = true;
                fields.forEach(id => { const el = document.getElementById(id); if (el && !validateField(el)) ok = false; });
                const terms = document.getElementById('terms');
                if (!terms.checked) {
                    ok = false;
                    document.getElementById('terms-error').classList.remove('hidden');
                } else {
                    document.getElementById('terms-error').classList.add('hidden');
                }
                if (!ok) {
                    e.preventDefault();
                    const alert = document.getElementById('formErrorAlert');
                    alert.classList.remove('hidden');
                    setTimeout(() => alert.classList.add('hidden'), 5000);
                    return;
                }
                const btn = document.getElementById('submitBtn');
                btn.disabled = true;
                btn.innerHTML = `<span class="flex items-center justify-center gap-2"><svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>Creating Account...</span>`;
            });
        });
    </script>
</x-guest-layout>
