<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!--User Dataa-->
                <div class="p-6 flex flex-row justify-center w-full space-x-5 dark:text-gray-100">
                    <a href="{{ route('properties.index') }}" class="flex space-x-5 p-10 bg-green-300 rounded-lg w-full">

                            <h1 class="text-green-800 text-4xl"><i class="fa fa-home"></i></h1>
                            <p>Buy/Lease a Property</p>
                    </a>
                    <div class="flex space-x-5 p-10 bg-green-800 rounded-lg w-full">
                            <h1 class="text-white text-4xl"><i class="fa fa-ticket"></i></h1>
                            <p class="text-white">Raise a support ticket</p>
                    </div>
                    <div class="flex justify-contents-center space-x-5 p-10 bg-gray-800 rounded-lg w-full animation: bounce 1s infinite ">
                            <h1 class="text-white text-4xl"><i class="fa fa-calendar"></i></h1>
                            <p class="text-white">Shedule a Meeting</p><br>
                    </div>
                </div>
                <div class="separator px-10 my-4 align-center">
                <hr>
            </div>
                <!--Quick Actions-->
                <div class="actions py-10">
            </div>
        </div>
    </div>
</x-app-layout>
