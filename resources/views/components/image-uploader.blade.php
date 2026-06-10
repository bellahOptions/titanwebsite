@props([
    'uploadRoute',
    'urlField'   => 'image_url',
    'pidField'   => 'public_id',
    'currentUrl' => null,
    'currentPid' => null,
    'required'   => false,
])

<div
    x-data="{
        uploadUrl: $el.dataset.up,
        ogUrl:     $el.dataset.u || '',
        ogPid:     $el.dataset.p || '',
        imageUrl:  $el.dataset.u || '',
        publicId:  $el.dataset.p || '',
        state:     $el.dataset.u ? 'success' : 'idle',
        isDragging: false,
        progress:  0,
        errorMsg:  '',

        handleFile(file) {
            if (!file) return;
            const ok = ['image/jpeg','image/jpg','image/png','image/gif','image/webp'];
            if (!ok.includes(file.type))   { this.errorMsg = 'Invalid type. Use JPG, PNG, GIF or WebP.'; this.state = 'error'; return; }
            if (file.size > 10 * 1024 * 1024) { this.errorMsg = 'File too large. Maximum 10 MB.';        this.state = 'error'; return; }
            this.doUpload(file);
        },

        doUpload(file) {
            this.state = 'uploading'; this.progress = 0;
            const fd = new FormData();
            fd.append('image', file);
            fd.append('_token', document.querySelector('[name=csrf-token]').content);
            const xhr = new XMLHttpRequest();
            xhr.upload.addEventListener('progress', e => {
                if (e.lengthComputable) this.progress = Math.round(e.loaded / e.total * 100);
            });
            xhr.addEventListener('load', () => {
                try {
                    const d = JSON.parse(xhr.responseText);
                    if (d.success) { this.imageUrl = d.url; this.publicId = d.public_id; this.state = 'success'; }
                    else { this.errorMsg = d.error || 'Upload failed. Please try again.'; this.state = 'error'; }
                } catch { this.errorMsg = 'Unexpected server response.'; this.state = 'error'; }
            });
            xhr.addEventListener('error', () => { this.errorMsg = 'Network error. Check your connection.'; this.state = 'error'; });
            xhr.open('POST', this.uploadUrl);
            xhr.send(fd);
        },

        reset() {
            this.imageUrl  = this.ogUrl;
            this.publicId  = this.ogPid;
            this.state     = this.ogUrl ? 'success' : 'idle';
            this.errorMsg  = '';
            this.$refs.fileInput.value = '';
        }
    }"
    data-up="{{ $uploadRoute }}"
    data-u="{{ $currentUrl ?? '' }}"
    data-p="{{ $currentPid ?? '' }}"
    @dragover.prevent="isDragging = true"
    @dragleave.prevent="isDragging = false"
    @drop.prevent="isDragging = false; handleFile($event.dataTransfer.files[0])"
>
    {{-- Hidden fields submitted with the parent form --}}
    <input type="hidden" name="{{ $urlField }}" x-model="imageUrl">
    <input type="hidden" name="{{ $pidField }}" x-model="publicId">

    {{-- Hidden file picker --}}
    <input type="file" x-ref="fileInput"
           accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
           class="sr-only"
           @change="handleFile($event.target.files[0])">

    {{-- Drop zone --}}
    <div class="relative border-2 border-dashed rounded-xl p-10 text-center cursor-pointer transition-all duration-200 bg-gray-50 dark:bg-gray-700/40"
         :class="isDragging
             ? 'border-green-400 dark:border-green-500 bg-green-50 dark:bg-green-900/10'
             : 'border-gray-300 dark:border-gray-600 hover:border-green-400 dark:hover:border-green-500'"
         @click="$refs.fileInput.click()">

        {{-- Idle --}}
        <div x-show="state === 'idle'">
            <svg class="mx-auto h-14 w-14 text-gray-300 dark:text-gray-500 mb-3" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">Click to browse or drag &amp; drop</p>
            <p class="text-xs text-gray-400 mt-1">JPG, PNG, GIF, WebP — max 10 MB</p>
        </div>

        {{-- Uploading --}}
        <div x-show="state === 'uploading'" style="display:none">
            <svg class="animate-spin mx-auto h-10 w-10 text-green-500 mb-3" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
            </svg>
            <p class="text-sm font-semibold text-gray-600 dark:text-gray-300 mb-3">Uploading…</p>
            <div class="w-48 mx-auto bg-gray-200 dark:bg-gray-600 rounded-full h-1.5">
                <div class="bg-green-500 h-1.5 rounded-full transition-all duration-300" :style="'width:' + progress + '%'"></div>
            </div>
        </div>

        {{-- Success --}}
        <div x-show="state === 'success'" style="display:none">
            <img :src="imageUrl" alt="Preview" class="mx-auto max-h-56 rounded-xl shadow-md object-cover mb-3">
            <p class="text-sm font-semibold text-green-600 dark:text-green-400 flex items-center justify-center gap-1">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                Image uploaded successfully
            </p>
            <button type="button" @click.stop="reset()"
                    class="mt-2 text-xs text-gray-400 hover:text-red-500 underline transition-colors">
                Remove &amp; choose another
            </button>
        </div>

        {{-- Error --}}
        <div x-show="state === 'error'" style="display:none">
            <svg class="mx-auto h-10 w-10 text-red-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <p x-text="errorMsg" class="text-sm font-semibold text-red-500 mb-1"></p>
            <button type="button" @click.stop="reset()"
                    class="text-xs text-gray-400 hover:text-red-500 underline transition-colors">
                Try again
            </button>
        </div>

    </div>

    @if($required)
    {{-- Invisible sentinel: prevents native submit if no image uploaded --}}
    <input type="text" tabindex="-1" aria-hidden="true"
           class="sr-only" :value="imageUrl"
           :required="{{ $required ? 'true' : 'false' }}"
           title="Please upload an image before submitting.">
    @endif
</div>
