@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="flex flex-col space-y-6">

    <!-- Header -->
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">Dashboard</h1>
        <span class="text-gray-500 dark:text-gray-400">Welcome back, {{ Auth::user()->name }}</span>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition">
            <h2 class="font-semibold text-lg">Daily Visitors</h2>
            <p class="mt-2 text-2xl">0</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition">
            <h2 class="font-semibold text-lg">Most Viewed Property</h2>
            <p class="mt-2 text-2xl">{{ $mostViewedProperties->first()->title ?? 'N/A' }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition">
            <h2 class="font-semibold text-lg">Total Users</h2>
            <p class="mt-2 text-2xl">{{ \App\Models\User::count() }}</p>
        </div>
    </div>

    <!-- Chart -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow mt-6">
        <h2 class="font-semibold text-lg mb-4">Daily Visitors Chart</h2>
        <canvas id="dailyVisitorsChart" class="w-full h-64"></canvas>
    </div>

</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('dailyVisitorsChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
            datasets: [{
                label: 'Visitors',
                data: [12,19,7,14,22,9,17],
                borderColor: 'rgb(34,197,94)',
                backgroundColor: 'rgba(34,197,94,0.2)',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { labels: { color: 'white' } }
            },
            scales: {
                x: { ticks: { color: 'white' } },
                y: { ticks: { color: 'white' } }
            }
        }
    });
</script>
@endsection
