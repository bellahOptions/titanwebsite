<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Message') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-8 px-6 bg-white dark:bg-gray-800 rounded shadow">
        <div class="mb-6">
            <p><strong>Name:</strong> {{ $contact->name }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Subject:</strong> {{ $contact->subject ?? '—' }}</p>
            <p><strong>Received:</strong> {{ $contact->created_at->format('M d, Y h:i A') }}</p>
        </div>

        <div class="mb-6 p-4 bg-gray-100 dark:bg-gray-700 rounded">
            <p class="whitespace-pre-line">{{ $contact->message }}</p>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.contacts.reply', $contact) }}" method="POST">
            @csrf
            <label for="reply_message" class="block font-medium mb-2">Reply Message *</label>
            <textarea name="reply_message" id="reply_message" rows="5" required
                      class="w-full border-gray-300 rounded mb-4">{{ old('reply_message') }}</textarea>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">
                    Send Reply
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
