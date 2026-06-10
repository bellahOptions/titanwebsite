 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Properties') }}
        </h2>
    </x-slot>
    
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        All Properties
                    </h3>
                    <a href="{{ route('admin.properties.create') }}" 
                       class="bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                        + Add New Property
                    </a>
                </div>

                {{-- Success message --}}
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                
               
@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ $errors->first() }}</span>
    </div>
@endif
                {{-- Property table --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Property</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Price</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($properties as $property)
                                <tr id="property-{{ $property->id }}" class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-6 py-4 whitespace-nowrap flex items-center">
                                        <img src="{{ $property->image_url }}" 
                                             alt="{{ $property->title }}" 
                                             class="h-12 w-12 rounded-lg mr-3 object-cover">
                                        <div>
                                            <div class="font-medium text-gray-900 dark:text-gray-100">
                                                {{ $property->title }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $property->location }}
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300 capitalize">
                                        {{ $property->type }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">
                                        ₦{{ number_format($property->price) }}
                                    </td>

                                    <td class="px-6 py-4">
                                        @if($property->status)
                                            <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Active</span>
                                        @else
                                            <span class="px-2 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full">Inactive</span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                                        {{-- Edit --}}
                                        <a href="#" 
                                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                                            Edit
                                        </a>

                                        {{-- Feature toggle --}}
                                        <form action="{{ route('admin.properties.toggle-featured', $property->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" 
                                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                                {{ $property->featured ? 'Unfeature' : 'Feature' }}
                                            </button>
                                        </form>

                                        {{-- Delete --}}
                                        <form action="{{ route('admin.properties.destroy', $property->id) }}" 
      method="POST" 
      onsubmit="return confirm('Are you sure you want to delete this property?');" 
      class="inline-block">
    @csrf
    @method('DELETE')
    <button type="submit" 
            class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-sm">
        Delete
    </button>
</form>

<form action="{{ route('admin.properties.toggleStatus', $property->id) }}" method="POST">
    @csrf
    <button 
        type="submit" 
        class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">
        {{ $property->status === 'active' ? 'Deactivate' : 'Activate' }}
    </button>
</form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                        No properties found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $properties->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- SweetAlert2 + AJAX for Deletion --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function (e) {
        e.preventDefault(); // stop normal form submission
        const actionUrl = this.getAttribute('action');
        const row = this.closest('tr');

        Swal.fire({
            title: 'Are you sure?',
            text: 'This property will be permanently deleted.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(actionUrl, {
    method: 'POST', // because we're using method spoofing
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    },
    body: new URLSearchParams({ '_method': 'DELETE' })
})
                })
                .then(res => {
                    if (!res.ok) throw new Error('Network response was not ok');
                    return res.json();
                })
                .then(data => {
                    Swal.fire('Deleted!', data.message || 'Property removed.', 'success');
                    if (row) row.remove();
                })
                .catch(err => {
                    Swal.fire('Error', err.message || 'Failed to delete property.', 'error');
                });
            }
        });
    });
});
</script>

</x-app-layout>
