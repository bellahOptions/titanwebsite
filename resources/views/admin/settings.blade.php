<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Site Settings') }}
        </h2>
    </x-slot>

    <div id="settings" class="p-10 bg-green-100 min-h-screen">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-6">Site Settings</h1>
            
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('admin.settings.update') }}" class="bg-white p-8 rounded-lg shadow-lg">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Site Information -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold border-b pb-2">Site Information</h3>
                        
                        <div>
                            <label for="site_name" class="block text-sm font-medium text-gray-700">Site Name</label>
                            <input type="text" name="site_name" id="site_name" 
                                   value="{{ old('site_name', $settings->site_name) }}" 
                                   class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2">
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Site Status</label>
                            <select name="status" id="status" class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2">
                                <option value="active" {{ $settings->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="maintenance" {{ $settings->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            </select>
                        </div>

                        <div>
                            <label for="admin_email" class="block text-sm font-medium text-gray-700">Admin Email</label>
                            <input type="email" name="admin_email" id="admin_email" 
                                   value="{{ old('admin_email', $settings->admin_email) }}" 
                                   class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2">
                        </div>
                    </div>

                    <!-- Currency Settings -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold border-b pb-2">Currency Settings</h3>
                        
                        <div>
                            <label for="currency" class="block text-sm font-medium text-gray-700">Currency</label>
                            <input type="text" name="currency" id="currency" 
                                   value="{{ old('currency', $settings->currency) }}" 
                                   class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2">
                        </div>

                        <div>
                            <label for="currency_symbol" class="block text-sm font-medium text-gray-700">Currency Symbol</label>
                            <input type="text" name="currency_symbol" id="currency_symbol" 
                                   value="{{ old('currency_symbol', $settings->currency_symbol) }}" 
                                   class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2">
                        </div>

                        <div>
                            <label for="auto_approve_properies" class="block text-sm font-medium text-gray-700">Auto Approve Properties</label>
                            <select name="auto_approve_properies" class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2">
                                <option value="yes" {{ $settings->auto_approve_properies == 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="no" {{ $settings->auto_approve_properies == 'no' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="mt-6 space-y-4">
                    <h3 class="text-xl font-semibold border-b pb-2">Social Media Links</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="facebook_url" class="block text-sm font-medium text-gray-700">Facebook URL</label>
                            <input type="url" name="facebook_url" id="facebook_url" 
                                   value="{{ old('facebook_url', $settings->facebook_url) }}" 
                                   class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2">
                        </div>

                        <div>
                            <label for="x_url" class="block text-sm font-medium text-gray-700">X (Twitter) URL</label>
                            <input type="url" name="x_url" id="x_url" 
                                   value="{{ old('x_url', $settings->x_url) }}" 
                                   class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2">
                        </div>

                        <div>
                            <label for="youtube_url" class="block text-sm font-medium text-gray-700">YouTube URL</label>
                            <input type="url" name="youtube_url" id="youtube_url" 
                                   value="{{ old('youtube_url', $settings->youtube_url) }}" 
                                   class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2">
                        </div>

                        <div>
                            <label for="instagramurl" class="block text-sm font-medium text-gray-700">Instagram URL</label>
                            <input type="url" name="instagram_url" id="instagramurl" 
                                   value="{{ old('instagram_url', $settings->instagramurl) }}" 
                                   class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2">
                        </div>
                    </div>
                </div>

                <!-- Location Information -->
                <div class="mt-6 space-y-4">
                    <h3 class="text-xl font-semibold border-b pb-2">Location Information</h3>
                    
                    <div>
                        <label for="map_url" class="block text-sm font-medium text-gray-700">Map Embed URL</label>
                        <input type="url" name="map_url" id="map_url" 
                               value="{{ old('map_url', $settings->map_url) }}" 
                               class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2">
                        <p class="text-sm text-gray-500 mt-1">Paste your Google Maps embed URL here</p>
                    </div>

                    <div>
                        <label for="fcomapny_address" class="block text-sm font-medium text-gray-700">Company Address</label>
                        <textarea name="company_address" id="company_address" 
                                  rows="3" class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2">{{ old('company_address', $settings->company_address) }}</textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit" class="w-full bg-green-600 text-white py-3 px-4 rounded-lg hover:bg-green-700 transition duration-200 font-semibold">
                        Update Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>