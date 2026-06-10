<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact Messages') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
            @endif

            @if($contacts->count())
                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-200">
                    <thead>
                        <tr class="border-b dark:border-gray-700">
                            <th class="py-2 px-3">Name</th>
                            <th class="py-2 px-3">Email</th>
                            <th class="py-2 px-3">Subject</th>
                            <th class="py-2 px-3">Received</th>
                            <th class="py-2 px-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr class="border-b dark:border-gray-700">
                                <td class="py-2 px-3">{{ $contact->name }}</td>
                                <td class="py-2 px-3">{{ $contact->email }}</td>
                                <td class="py-2 px-3">{{ $contact->subject ?? '—' }}</td>
                                <td class="py-2 px-3">{{ $contact->created_at->diffForHumans() }}</td>
                                <td class="py-2 px-3 text-right">
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="text-blue-600 hover:underline">View</a>
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline ml-2" onclick="return confirm('Delete this message?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">{{ $contacts->links() }}</div>
            @else
                <p class="text-gray-500 text-center">No messages yet.</p>
            @endif
        </div>
    </div>
</x-app-layout>
