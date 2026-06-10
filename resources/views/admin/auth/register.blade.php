<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Registration - Titan & Equity Resources</title>
    <link rel="icon" type="icon" href="{{ asset('images/icon.jpg') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-gradient-to-br from-green-50 via-white to-green-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <!-- Logo and Header -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="flex justify-center mb-6">
                <div class="relative">
                    <div class="absolute inset-0 bg-green-600 rounded-2xl blur-xl opacity-30 animate-pulse"></div>
                    <div class="relative bg-gradient-to-br from-green-600 to-green-700 p-4 rounded-2xl shadow-xl">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <h2 class="text-center text-3xl font-extrabold bg-gradient-to-r from-gray-900 to-green-800 dark:from-white dark:to-green-400 bg-clip-text text-transparent">
                Admin Registration
            </h2>
            <p class="mt-3 text-center text-base text-gray-600 dark:text-gray-400">
                Create a new admin account for Titan & Equity Resources
            </p>
        </div>

        <!-- Registration Card -->
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-lg">
            <div class="bg-white dark:bg-gray-800 py-10 px-6 shadow-2xl sm:rounded-2xl sm:px-12 border border-gray-100 dark:border-gray-700">
                
                <!-- Success Message -->
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 dark:border-green-400">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 dark:text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-green-700 dark:text-green-300 font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Error Messages -->
                @if($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 dark:border-red-400">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 dark:text-red-400 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <div class="flex-1">
                                <p class="text-red-700 dark:text-red-300 font-medium mb-2">Validation Error!</p>
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li class="text-red-600 dark:text-red-400 text-sm">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form class="space-y-5" action="{{ route('admin.register.save') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    
                    <!-- Full Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input 
                            id="name" 
                            name="name" 
                            type="text" 
                            autocomplete="name" 
                            required 
                            maxlength="255"
                            class="appearance-none block w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 focus:border-green-500 dark:focus:border-green-400 dark:bg-gray-700 dark:text-white transition-all duration-200"
                            placeholder="John Doe"
                            value="{{ old('name') }}">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Email address <span class="text-red-500">*</span>
                        </label>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            autocomplete="email" 
                            required 
                            maxlength="255"
                            class="appearance-none block w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 focus:border-green-500 dark:focus:border-green-400 dark:bg-gray-700 dark:text-white transition-all duration-200"
                            placeholder="admin@example.com"
                            value="{{ old('email') }}">
                    </div>

                    <!-- Contact Address -->
                    <div>
                        <label for="address" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Contact address <span class="text-red-500">*</span>
                        </label>
                        <input 
                            id="address" 
                            name="address" 
                            type="text" 
                            autocomplete="address" 
                            required 
                            maxlength="500"
                            class="appearance-none block w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 focus:border-green-500 dark:focus:border-green-400 dark:bg-gray-700 dark:text-white transition-all duration-200"
                            placeholder="123 Main Street, City"
                            value="{{ old('address') }}">
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Phone/WhatsApp <span class="text-red-500">*</span>
                        </label>
                        <input 
                            id="phone" 
                            name="phone" 
                            type="tel" 
                            autocomplete="phone" 
                            required 
                            maxlength="20"
                            class="appearance-none block w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 focus:border-green-500 dark:focus:border-green-400 dark:bg-gray-700 dark:text-white transition-all duration-200"
                            placeholder="+234 800 000 0000"
                            value="{{ old('phone') }}">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input 
                            id="password" 
                            name="password" 
                            type="password" 
                            autocomplete="new-password" 
                            required 
                            minlength="8"
                            class="appearance-none block w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 focus:border-green-500 dark:focus:border-green-400 dark:bg-gray-700 dark:text-white transition-all duration-200"
                            placeholder="••••••••">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Minimum 8 characters</p>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Confirm Password <span class="text-red-500">*</span>
                        </label>
                        <input 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            type="password" 
                            autocomplete="new-password" 
                            required 
                            minlength="8"
                            class="appearance-none block w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 focus:border-green-500 dark:focus:border-green-400 dark:bg-gray-700 dark:text-white transition-all duration-200"
                            placeholder="••••••••">
                    </div>

                    <!-- Secret Key -->
                    <div>
                        <label for="secret_key" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Admin Secret Key <span class="text-red-500">*</span>
                        </label>
                        <input 
                            id="secret_key" 
                            name="secret_key" 
                            type="password" 
                            required 
                            class="appearance-none block w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 focus:border-green-500 dark:focus:border-green-400 dark:bg-gray-700 dark:text-white transition-all duration-200"
                            placeholder="Enter the admin secret key">
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400 flex items-start">
                            <svg class="w-4 h-4 mr-1 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            You must have the admin secret key to register. Contact the system administrator if you don't have one.
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button 
                            type="submit" 
                            class="w-full flex justify-center items-center py-3.5 px-4 border border-transparent text-base font-semibold rounded-xl text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            Register Admin Account
                        </button>
                    </div>
                </form>

                <!-- Sign In Link -->
                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t-2 border-gray-200 dark:border-gray-700"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400 font-medium">
                                Already registered?
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <a href="{{ route('admin.login') }}" class="group inline-flex items-center text-base font-semibold text-green-600 hover:text-green-700 dark:text-green-400 dark:hover:text-green-300 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            Sign in to your account
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>