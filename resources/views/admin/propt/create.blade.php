<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add New Property
        </h2>
    </x-slot>

    {{-- Quill CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">

    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            {{-- Alerts --}}
            @if($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500">
                    <p class="font-semibold text-red-700 dark:text-red-300 mb-1">Please fix the following:</p>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li class="text-sm text-red-600 dark:text-red-400">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div x-data="{show:true}" x-show="show" x-init="setTimeout(()=>show=false,5000)"
                     class="mb-6 p-4 rounded-xl bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-green-700 dark:text-green-300 font-medium">{{ session('success') }}</p>
                </div>
            @endif

            <form action="{{ route('admin.properties.store') }}" method="POST" id="propertyForm" class="space-y-0">
                @csrf

                {{-- ── SECTION 1: Basic Info ── --}}
                <div class="bg-white dark:bg-gray-800 rounded-t-2xl border border-gray-200 dark:border-gray-700 p-8">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-green-100 dark:bg-green-900/40 flex items-center justify-center text-green-600 dark:text-green-400 text-sm font-bold">1</span>
                        Basic Information
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Title --}}
                        <div class="space-y-1.5">
                            <label for="title" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Property Title <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="title" id="title" required maxlength="255"
                                   value="{{ old('title') }}"
                                   placeholder="e.g., Luxury 4-Bedroom Duplex in Lekki Phase 1"
                                   class="w-full px-4 py-3 rounded-xl border-2 @error('title') border-red-400 @else border-gray-200 dark:border-gray-600 @enderror bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 outline-none transition-all">
                            @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Type --}}
                        <div class="space-y-1.5">
                            <label for="type" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Listing Type <span class="text-red-500">*</span>
                            </label>
                            <select name="type" id="type" required
                                    class="w-full px-4 py-3 rounded-xl border-2 @error('type') border-red-400 @else border-gray-200 dark:border-gray-600 @enderror bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 outline-none transition-all">
                                <option value="">— Select Type —</option>
                                <option value="sale"  {{ old('type') == 'sale'  ? 'selected' : '' }}>For Sale</option>
                                <option value="rent"  {{ old('type') == 'rent'  ? 'selected' : '' }}>For Rent / Shortlet</option>
                                <option value="land"  {{ old('type') == 'land'  ? 'selected' : '' }}>Land</option>
                            </select>
                            @error('type') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Price --}}
                        <div class="space-y-1.5">
                            <label for="price" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Price (₦) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">₦</span>
                                <input type="number" name="price" id="price" required min="0" step="0.01"
                                       value="{{ old('price') }}" placeholder="0.00"
                                       class="w-full pl-8 pr-4 py-3 rounded-xl border-2 @error('price') border-red-400 @else border-gray-200 dark:border-gray-600 @enderror bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 outline-none transition-all">
                            </div>
                            @error('price') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Location --}}
                        <div class="space-y-1.5">
                            <label for="location" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Location / Area <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="location" id="location" required maxlength="255"
                                   value="{{ old('location') }}" placeholder="e.g., Lekki Phase 1, Lagos"
                                   class="w-full px-4 py-3 rounded-xl border-2 @error('location') border-red-400 @else border-gray-200 dark:border-gray-600 @enderror bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 outline-none transition-all">
                            @error('location') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Address --}}
                    <div class="mt-6 space-y-1.5">
                        <label for="address" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Full Address</label>
                        <input type="text" name="address" id="address" maxlength="500"
                               value="{{ old('address') }}" placeholder="123 Admiralty Way, Lekki Phase 1, Lagos"
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 outline-none transition-all">
                        <p class="text-xs text-gray-500">Used for map display on the property page</p>
                    </div>

                    {{-- Coordinates --}}
                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label for="latitude" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Latitude <span class="text-gray-400 font-normal">(optional)</span></label>
                            <input type="number" name="latitude" id="latitude" step="any"
                                   value="{{ old('latitude') }}" placeholder="6.4281"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 outline-none transition-all">
                        </div>
                        <div class="space-y-1.5">
                            <label for="longitude" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Longitude <span class="text-gray-400 font-normal">(optional)</span></label>
                            <input type="number" name="longitude" id="longitude" step="any"
                                   value="{{ old('longitude') }}" placeholder="3.4219"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 outline-none transition-all">
                        </div>
                    </div>
                </div>

                {{-- ── SECTION 2: Details ── --}}
                <div class="bg-white dark:bg-gray-800 border-x border-b border-gray-200 dark:border-gray-700 p-8">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-green-100 dark:bg-green-900/40 flex items-center justify-center text-green-600 dark:text-green-400 text-sm font-bold">2</span>
                        Property Details
                    </h3>

                    {{-- Description --}}
                    <div class="space-y-1.5 mb-6">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <div class="rounded-xl overflow-hidden border-2 border-gray-200 dark:border-gray-600 focus-within:border-green-500 transition-all">
                            <div id="quill-editor" class="min-h-[220px] bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"></div>
                        </div>
                        <input type="hidden" name="description" id="description" value="{{ old('description') }}">
                        @error('description') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Bedrooms / Bathrooms / Area --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <div class="space-y-1.5">
                            <label for="bedrooms" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Bedrooms</label>
                            <input type="number" name="bedrooms" id="bedrooms" min="0" value="{{ old('bedrooms') }}" placeholder="0"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 outline-none transition-all">
                        </div>
                        <div class="space-y-1.5">
                            <label for="bathrooms" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Bathrooms</label>
                            <input type="number" name="bathrooms" id="bathrooms" min="0" step="0.5" value="{{ old('bathrooms') }}" placeholder="0"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 outline-none transition-all">
                        </div>
                        <div class="space-y-1.5">
                            <label for="area" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Area (sqm)</label>
                            <input type="number" name="area" id="area" min="0" value="{{ old('area') }}" placeholder="0"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 outline-none transition-all">
                        </div>
                    </div>
                </div>

                {{-- ── SECTION 3: Image ── --}}
                <div class="bg-white dark:bg-gray-800 border-x border-b border-gray-200 dark:border-gray-700 p-8">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-green-100 dark:bg-green-900/40 flex items-center justify-center text-green-600 dark:text-green-400 text-sm font-bold">3</span>
                        Featured Image <span class="text-red-500 ml-1">*</span>
                    </h3>

                    <input type="hidden" name="image_url" id="image_url" value="{{ old('image_url') }}">
                    <input type="hidden" name="public_id" id="public_id" value="{{ old('public_id') }}">
                    @error('image_url') <p class="text-sm text-red-500 mb-3">{{ $message }}</p> @enderror

                    {{-- Drop zone --}}
                    <div id="drop-zone"
                         class="relative border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-10 text-center cursor-pointer hover:border-green-400 dark:hover:border-green-500 transition-all duration-200 bg-gray-50 dark:bg-gray-700/40"
                         onclick="document.getElementById('image_file').click()">

                        <input type="file" id="image_file" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" class="hidden">

                        {{-- Idle state --}}
                        <div id="dz-idle">
                            <svg class="mx-auto h-14 w-14 text-gray-300 dark:text-gray-500 mb-3" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">Click to browse or drag & drop</p>
                            <p class="text-xs text-gray-400 mt-1">JPG, PNG, GIF, WebP — max 10 MB</p>
                        </div>

                        {{-- Uploading state --}}
                        <div id="dz-uploading" class="hidden">
                            <svg class="animate-spin mx-auto h-10 w-10 text-green-500 mb-3" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                            </svg>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">Uploading image…</p>
                            <div class="mt-3 w-48 mx-auto bg-gray-200 dark:bg-gray-600 rounded-full h-1.5">
                                <div id="progress-bar" class="bg-green-500 h-1.5 rounded-full transition-all duration-300" style="width:0%"></div>
                            </div>
                        </div>

                        {{-- Success state --}}
                        <div id="dz-success" class="hidden">
                            <img id="image-preview" src="" alt="Preview" class="mx-auto max-h-56 rounded-xl shadow-md object-cover mb-3">
                            <p class="text-sm font-semibold text-green-600 dark:text-green-400 flex items-center justify-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                Image uploaded successfully
                            </p>
                            <button type="button" onclick="resetUpload(event)" class="mt-2 text-xs text-gray-400 hover:text-red-500 underline transition-colors">Remove &amp; choose another</button>
                        </div>

                        {{-- Error state --}}
                        <div id="dz-error" class="hidden">
                            <svg class="mx-auto h-10 w-10 text-red-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <p id="error-msg" class="text-sm font-semibold text-red-500">Upload failed. Please try again.</p>
                            <button type="button" onclick="resetUpload(event)" class="mt-2 text-xs text-gray-400 hover:text-red-500 underline transition-colors">Try again</button>
                        </div>
                    </div>

                    {{-- Google Drive --}}
                    <div class="mt-6 space-y-1.5">
                        <label for="google_drive_link" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Google Drive Folder Link <span class="text-gray-400 font-normal">(optional — for extra photos)</span>
                        </label>
                        <input type="url" name="google_drive_link" id="google_drive_link"
                               value="{{ old('google_drive_link') }}" placeholder="https://drive.google.com/drive/folders/..."
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 outline-none transition-all">
                    </div>
                </div>

                {{-- ── SECTION 4: Settings ── --}}
                <div class="bg-white dark:bg-gray-800 border-x border-b border-gray-200 dark:border-gray-700 p-8">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-green-100 dark:bg-green-900/40 flex items-center justify-center text-green-600 dark:text-green-400 text-sm font-bold">4</span>
                        Visibility Settings
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        {{-- Status --}}
                        <div class="space-y-1.5">
                            <label for="status" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Status <span class="text-red-500">*</span></label>
                            <select name="status" id="status" required
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:border-green-500 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 outline-none transition-all">
                                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active — visible to public</option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive — hidden from public</option>
                            </select>
                        </div>

                        {{-- Featured --}}
                        <div class="flex items-start pt-7">
                            <input type="checkbox" name="featured" id="featured" value="1"
                                   {{ old('featured') ? 'checked' : '' }}
                                   class="w-5 h-5 text-green-600 bg-white dark:bg-gray-700 border-2 border-gray-300 dark:border-gray-600 rounded focus:ring-green-500 focus:ring-2 mt-0.5">
                            <div class="ml-3">
                                <label for="featured" class="font-semibold text-gray-700 dark:text-gray-300 cursor-pointer">Featured Property</label>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Pinned to the homepage featured section</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── Action Buttons ── --}}
                <div class="bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700 rounded-b-2xl px-8 py-5 flex flex-col sm:flex-row justify-end gap-3">
                    <a href="{{ route('admin.properties.mgt') }}"
                       class="px-6 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-100 dark:hover:bg-gray-600 transition-all text-center">
                        Cancel
                    </a>
                    <button type="submit" id="submit-btn"
                            class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2 disabled:opacity-60 disabled:cursor-not-allowed">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Save Property
                    </button>
                </div>

            </form>
        </div>
    </div>

    {{-- Quill JS --}}
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
    // ── Quill editor ──────────────────────────────────────────────
    const quill = new Quill('#quill-editor', {
        theme: 'snow',
        placeholder: 'Describe the property — features, amenities, neighbourhood highlights…',
        modules: {
            toolbar: [
                [{ header: [1,2,3,false] }],
                ['bold','italic','underline'],
                [{ list:'ordered' },{ list:'bullet' }],
                ['link','clean']
            ]
        }
    });

    const descInput = document.getElementById('description');
    if (descInput.value) quill.root.innerHTML = descInput.value;  // restore on validation error
    quill.on('text-change', () => { descInput.value = quill.root.innerHTML; });

    document.getElementById('propertyForm').addEventListener('submit', () => {
        descInput.value = quill.root.innerHTML;
    });

    // ── Image upload ──────────────────────────────────────────────
    const dropZone   = document.getElementById('drop-zone');
    const fileInput  = document.getElementById('image_file');
    const urlInput   = document.getElementById('image_url');
    const pidInput   = document.getElementById('public_id');

    const show = id => ['dz-idle','dz-uploading','dz-success','dz-error'].forEach(s => document.getElementById(s).classList.toggle('hidden', s !== id));

    function resetUpload(e) {
        if (e) e.stopPropagation();
        fileInput.value = '';
        urlInput.value  = '';
        pidInput.value  = '';
        document.getElementById('image-preview').src = '';
        show('dz-idle');
    }

    function uploadFile(file) {
        if (!file) return;

        // Client-side validation
        const allowed = ['image/jpeg','image/jpg','image/png','image/gif','image/webp'];
        if (!allowed.includes(file.type)) {
            document.getElementById('error-msg').textContent = 'Invalid file type. Use JPG, PNG, GIF or WebP.';
            show('dz-error'); return;
        }
        if (file.size > 10 * 1024 * 1024) {
            document.getElementById('error-msg').textContent = 'File too large. Maximum size is 10 MB.';
            show('dz-error'); return;
        }

        show('dz-uploading');

        const formData = new FormData();
        formData.append('image', file);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

        const xhr = new XMLHttpRequest();

        xhr.upload.addEventListener('progress', e => {
            if (e.lengthComputable) {
                document.getElementById('progress-bar').style.width = Math.round(e.loaded / e.total * 100) + '%';
            }
        });

        xhr.addEventListener('load', () => {
            try {
                const data = JSON.parse(xhr.responseText);
                if (data.success) {
                    urlInput.value = data.url;
                    pidInput.value = data.public_id;
                    document.getElementById('image-preview').src = data.url;
                    show('dz-success');
                } else {
                    document.getElementById('error-msg').textContent = data.error || 'Upload failed. Please try again.';
                    show('dz-error');
                }
            } catch {
                document.getElementById('error-msg').textContent = 'Unexpected server response.';
                show('dz-error');
            }
        });

        xhr.addEventListener('error', () => {
            document.getElementById('error-msg').textContent = 'Network error. Please check your connection.';
            show('dz-error');
        });

        xhr.open('POST', '{{ route("admin.properties.upload-image") }}');
        xhr.send(formData);
    }

    // Click to select
    fileInput.addEventListener('change', () => uploadFile(fileInput.files[0]));

    // Drag & drop
    dropZone.addEventListener('dragover',  e => { e.preventDefault(); dropZone.classList.add('border-green-400'); });
    dropZone.addEventListener('dragleave', () => dropZone.classList.remove('border-green-400'));
    dropZone.addEventListener('drop', e => {
        e.preventDefault();
        dropZone.classList.remove('border-green-400');
        const file = e.dataTransfer.files[0];
        if (file) uploadFile(file);
    });

    // Guard: block submit if image not uploaded
    document.getElementById('propertyForm').addEventListener('submit', function(e) {
        if (!urlInput.value.trim()) {
            e.preventDefault();
            dropZone.scrollIntoView({ behavior: 'smooth', block: 'center' });
            dropZone.classList.add('border-red-400');
            document.getElementById('error-msg').textContent = 'Please upload a featured image before saving.';
            show('dz-error');
            setTimeout(() => dropZone.classList.remove('border-red-400'), 2000);
        }
    });
    </script>
</x-app-layout>
