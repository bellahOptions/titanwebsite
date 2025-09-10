@extends('admin.layout')
@section('title','Blog Management')
@section('content')
<div class="flex flex-col space-y-6">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">Blog Management</h1>
        <a href="{{ route('admin.blog.create') }}" class="px-4 py-2 bg-green-600 hover:bg-green-500 rounded text-white">Add New Blog</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg shadow">
            <thead class="bg-gray-200 dark:bg-gray-700">
                <tr>
                    <th class="p-4 text-left">Title</th>
                    <th class="p-4 text-left">Author</th>
                    <th class="p-4 text-left">Published At</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="p-4">{{ $blog->title }}</td>
                    <td class="p-4">{{ $blog->author }}</td>
                    <td class="p-4">{{ $blog->created_at->format('d M Y') }}</td>
                    <td class="p-4 flex space-x-2 justify-center">
                        <a href="{{ route('admin.blog.edit',$blog->id) }}" class="px-3 py-1 bg-blue-600 hover:bg-blue-500 rounded text-white">Edit</a>
                        <form method="POST" action="{{ route('admin.blog.destroy',$blog->id) }}">
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
