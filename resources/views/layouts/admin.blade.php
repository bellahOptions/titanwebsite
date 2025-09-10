<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-gray-100 flex-shrink-0">
            <div class="p-6 text-center text-xl font-bold border-b border-gray-700">Admin Panel</div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-6 hover:bg-gray-700 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">Dashboard</a>
                <a href="{{ route('admin.users') }}" class="block py-2.5 px-6 hover:bg-gray-700 rounded {{ request()->routeIs('admin.users') ? 'bg-gray-700' : '' }}">Manage Users</a>
                <a href="{{ route('admin.properties') }}" class="block py-2.5 px-6 hover:bg-gray-700 rounded {{ request()->routeIs('admin.properties*') ? 'bg-gray-700' : '' }}">Properties</a>
                <a href="{{ route('admin.testimonials') }}" class="block py-2.5 px-6 hover:bg-gray-700 rounded {{ request()->routeIs('admin.testimonials') ? 'bg-gray-700' : '' }}">Testimonials</a>
                <a href="{{ route('admin.settings') }}" class="block py-2.5 px-6 hover:bg-gray-700 rounded {{ request()->routeIs('admin.settings') ? 'bg-gray-700' : '' }}">Settings</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold">@yield('page-title', 'Dashboard')</h1>
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-600 hover:underline">Logout</button>
                    </form>
                </div>
            </header>

            <main class="p-6">
                @yield('content')
            </main>
        </div>

    </div>

</body>
</html>
