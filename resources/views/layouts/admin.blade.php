<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <!-- Tailwind or any other CSS you want -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
    <!-- Optional: Include your custom admin CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 min-h-screen text-white flex flex-col">
        <div class="p-6 text-center text-xl font-bold border-b border-gray-700">Admin Panel</div>
        <nav class="flex-1 mt-6">
            <ul>
                <li class="px-6 py-3 hover:bg-gray-700">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="px-6 py-3 hover:bg-gray-700">
                    <a href="{{ route('properties.index') }}">Properties</a>
                </li>
                <li class="px-6 py-3 hover:bg-gray-700">
                    <a href="#">Users</a>
                </li>
                <li class="px-6 py-3 hover:bg-gray-700">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        @yield('content')
    </main>

</body>
</html>
