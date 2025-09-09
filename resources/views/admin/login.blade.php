<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* Pulse animation for the login button */
    .pulse {
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0% { transform: scale(1); box-shadow: 0 0 0 rgba(59, 130, 246, 0.5); }
        50% { transform: scale(1.05); box-shadow: 0 0 20px rgba(59, 130, 246, 0.7); }
        100% { transform: scale(1); box-shadow: 0 0 0 rgba(59, 130, 246, 0.5); }
    }
</style>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white w-full max-w-md rounded-xl shadow-lg overflow-hidden">
        <div class="bg-blue-600 p-6 text-center">
            <h1 class="text-white text-2xl font-bold">Admin Panel</h1>
            <p class="text-blue-200 mt-2">Sign in to your account</p>
        </div>
        <div class="p-8">
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="email" id="email" required autofocus
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 pulse">
                    Login
                </button>
            </form>
            <p class="text-center text-gray-500 mt-4 text-sm">
                Forgot password? <a href="#" class="text-blue-600 hover:underline">Reset here</a>
            </p>
        </div>
    </div>
</body>
</html>
