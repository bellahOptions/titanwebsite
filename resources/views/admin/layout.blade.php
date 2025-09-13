<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title')</title>
    <link rel="icon" type="icon" href="{{ asset('images/icon.jpg') }}">
    
  @vite(['resources/css/app.css', 'resources/css/app.css'])
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 ">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 dark:bg-gray-900 text-white flex-shrink-0 relative">
            <div class="p-6 font-bold text-2xl border-b border-gray-700 dark:border-gray-700">Admin Panel</div>
 
            <!-- Admin Info -->
            <div class="p-6 border-b border-gray-700 dark:border-gray-700">
                <p class="font-semibold">{{ Auth::user()->name }}</p>
                <p class="text-sm text-gray-400">{{ Auth::user()->email }}</p>
            </div>

            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}"
                    class="block py-3 px-6 hover:bg-gray-700 dark:hover:bg-gray-700 transition rounded">Dashboard</a>
                <a href="{{ route('admin.users') }}"
                    class="block py-3 px-6 hover:bg-gray-700 dark:hover:bg-gray-700 transition rounded">Manage Users</a>
                <a href="{{ route('admin.properties.mgt') }}"
                    class="block py-3 px-6 hover:bg-gray-700 dark:hover:bg-gray-700 transition rounded">Manage
                    Properties</a>
                <a href="{{ route('blog') }}"
                    class="block py-3 px-6 hover:bg-gray-700 dark:hover:bg-gray-700 transition rounded">Blog
                    Management</a>
            </nav>

            <div class="absolute bottom-0 p-6 w-full">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full px-4 py-2 rounded bg-red-600 hover:bg-red-500 transition">Logout</button>
                </form>
                <button id="dark-toggle"
                    class="w-full mt-4 px-4 py-2 rounded bg-gray-700 dark:bg-gray-600 hover:bg-gray-600 dark:hover:bg-gray-500 transition">Toggle
                    Dark Mode</button>
            </div>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 overflow-auto p-6">
            @yield('content')
        </main>

    </div>

    <script>
        const toggleBtn = document.getElementById('dark-toggle');
        toggleBtn.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
        });
    </script>
</body>

</html>