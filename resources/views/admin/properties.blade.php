@extends('admin.layout')
@section('title','Manage Properties')
@section('content')
<div class="flex flex-col space-y-6">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">Manage Properties</h1>
        <a href="{{ route('admin.properties.create') }}" class="px-4 py-2 bg-green-600 hover:bg-green-500 rounded text-white">Add Property</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg shadow">
            <thead class="bg-gray-200 dark:bg-gray-700">
                <tr>
                    <th class="p-4 text-left">Name</th>
                    <th class="p-4 text-left">Price</th>
                    <th class="p-4 text-left">Type</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="p-4">{{ $property->name }}</td>
                    <td class="p-4">${{ number_format($property->listing_price,2) }}</td>
                    <td class="p-4">{{ $property->property_type }}</td>
                    <td class="p-4 flex space-x-2 justify-center">
                        <a href="{{ route('admin.properties.edit',$property->id) }}" class="px-3 py-1 bg-blue-600 hover:bg-blue-500 rounded text-white">Edit</a>
                        <form method="POST" action="{{ route('admin.properties.destroy',$property->id) }}">
                            @csrf @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-500 rounded text-white">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
