<div id="auth-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100">
                <svg class="h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 mt-2">Authentication Required</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">
                    You need to be logged in to {{ $action }} this property.
                </p>
            </div>
            <div class="items-center px-4 py-3 space-y-3 sm:space-y-0 sm:space-x-3 sm:flex">
                <a href="{{ route('login') }}?redirect={{ urlencode($redirectUrl) }}" 
                   class="w-full sm:w-auto px-4 py-2 bg-indigo-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-300">
                    Login
                </a>
                <a href="{{ route('register') }}?redirect={{ urlencode($redirectUrl) }}" 
                   class="w-full sm:w-auto px-4 py-2 bg-white text-indigo-600 text-base font-medium rounded-md border border-indigo-600 shadow-sm hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-indigo-300">
                    Register
                </a>
                <button onclick="closeAuthModal()" 
                        class="w-full sm:w-auto px-4 py-2 bg-gray-300 text-gray-700 text-base font-medium rounded-md shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function showAuthModal(action, redirectUrl) {
        const modal = document.getElementById('auth-modal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        // Update modal content
        const actionText = modal.querySelector('p');
        actionText.textContent = `You need to be logged in to ${action} this property.`;
        
        // Update links with redirect URL
        const loginLink = modal.querySelector('a[href*="login"]');
        const registerLink = modal.querySelector('a[href*="register"]');
        
        loginLink.href = `{{ route('login') }}?redirect=${encodeURIComponent(redirectUrl)}`;
        registerLink.href = `{{ route('register') }}?redirect=${encodeURIComponent(redirectUrl)}`;
    }
    
    function closeAuthModal() {
        const modal = document.getElementById('auth-modal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
    
    // Close modal when clicking outside
    document.getElementById('auth-modal').addEventListener('click', function(e) {
        if (e.target.id === 'auth-modal') {
            closeAuthModal();
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAuthModal();
        }
    });
</script>