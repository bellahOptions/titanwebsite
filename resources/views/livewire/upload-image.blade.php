<div class="mb-6 border rounded-lg p-4 bg-gray-50">
    <x-input-label for="featured_image" :value="__('Featured Image *')" />

    @if ($imageUrl)
        <div class="mb-3">
            <img src="{{ $imageUrl }}" alt="Uploaded Image" class="rounded shadow w-48">
            <p class="text-xs text-gray-600 mt-1">Public ID: {{ $publicId }}</p>
        </div>
    @endif

    <input type="file" wire:model="image" accept="image/*"
           class="block w-full mb-3 border border-gray-300 p-2 rounded bg-white">

    <button type="button"
            wire:click="upload"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow font-semibold">
        📤 Upload to Cloudinary
    </button>

    {{-- Hidden fields --}}
    <input type="hidden" name="image_url" value="{{ $imageUrl }}">
    <input type="hidden" name="public_id" value="{{ $publicId }}">

    {{-- Flash messages --}}
    @if (session()->has('success'))
        <div class="text-green-600 mt-2 text-sm">{{ session('success') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="text-red-600 mt-2 text-sm">{{ session('error') }}</div>
    @endif
</div>
