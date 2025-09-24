<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Property Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">{{ $property->title }}</h3>
                        <div class="flex space-x-2">
                            @if(auth()->check() && auth()->user()->is_admin)
                            <x-secondary-button>
                                <a href="{{ route('admin.properties.edit', $property->id) }}" class="flex items-center">
                                    <i class="fas fa-edit mr-2"></i> Edit
                                </a>
                            </x-secondary-button>
                            @endif
                            <x-secondary-button>
                                <a href="{{ route('properties.index') }}" class="flex items-center">
                                    <i class="fas fa-arrow-left mr-2"></i> Back
                                </a>
                            </x-secondary-button>
                        </div>
                    </div>

                    <!-- Featured Image and Map -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                        <!-- Featured Image -->
                        <div>
                            @if($property->featured_image)
                                <img src="{{ asset('storage/' . $property->featured_image) }}" 
                                     alt="Featured Image" class="w-full h-64 object-cover rounded-lg">
                            @else
                                <div class="w-full h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <span class="text-gray-400">No Featured Image</span>
                                </div>
                            @endif
                        </div>

                        <!-- Map Section -->
                        <div class="bg-gray-100 rounded-lg p-4">
                            <h4 class="text-lg font-semibold mb-4">Location</h4>
                            <div class="mb-4">
                                <p class="text-gray-700">{{ $property->location }}</p>
                                @if($property->address)
                                    <p class="text-gray-600 text-sm">{{ $property->address }}</p>
                                @endif
                            </div>
                            <a href="{{ $property->map_url }}" target="_blank" 
                               class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                View on Google Maps
                            </a>
                            @if($property->latitude && $property->longitude)
                                <p class="mt-2 text-xs text-gray-500">
                                    Coordinates: {{ $property->latitude }}, {{ $property->longitude }}
                                </p>
                            @endif
                        </div>
<!-- Booking Button -->
@auth
    @if($property->availableForInspection())
        <div class="mt-6">
            @php
                $availableDaysCount = \App\Models\InspectionDay::where('is_available', true)->count();
            @endphp
            
            @if($availableDaysCount > 0)
                <a href="{{ route('bookings.create', $property) }}" 
                   class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 inline-flex items-center">
                    <i class="fas fa-calendar-check mr-2"></i>
                    Book Inspection
                </a>
            @else
                <button disabled class="bg-gray-400 text-white px-6 py-3 rounded-lg inline-flex items-center cursor-not-allowed">
                    <i class="fas fa-calendar-times mr-2"></i>
                    Inspections Unavailable
                </button>
                <p class="text-sm text-gray-500 mt-2">No inspection days configured by administrator.</p>
            @endif
        </div>
    @endif
@else
    <div class="mt-6">
        <a href="{{ route('login') }}" 
           class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 inline-flex items-center">
            <i class="fas fa-calendar-check mr-2"></i>
            Login to Book Inspection
        </a>
    </div>
@endauth
                    </div>

                        <!-- Reviews Section -->
<div class="flex flex-row space-x-3">
<div class="mt-12 w-full">
    <h3 class="text-2xl font-semibold mb-6">Reviews</h3>    
    <!-- Overall Rating -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h4 class="text-lg font-semibold">Overall Rating</h4>
                <x-star-rating :rating="$property->averageRating()" size="lg" />
                <p class="text-gray-600 mt-2">{{ $property->totalReviews() }} reviews</p>
            </div>
            
            <!-- Add Review Button -->
            @auth
                @if(!auth()->user()->hasReviewed($property))
                    <button onclick="document.getElementById('review-form').classList.toggle('hidden')"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                        Write a Review
                    </button>
                @endif
            @else
                <a href="{{ route('login') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                    Login to Review
                </a>
            @endauth
        </div>
    </div>

    <!-- Review Form -->
    @auth
        @if(!auth()->user()->reviews->contains('property_id', $property->id))
            <div id="review-form" class="hidden bg-white rounded-lg shadow p-6 mb-6">
                <h4 class="text-lg font-semibold mb-4">Write a Review</h4>
                <form action="{{ route('reviews.store', $property) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                        <div class="flex space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                                <button type="button" onclick="setRating({{ $i }})" class="text-2xl">
                                    <span class="rating-star" data-rating="{{ $i }}">☆</span>
                                </button>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="rating" value="0" required>
                        @error('rating')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">Review</label>
                        <textarea name="comment" id="comment" rows="4" 
                                 class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                 placeholder="Share your experience with this property..." required></textarea>
                        @error('comment')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex space-x-3">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                            Submit Review
                        </button>
                        <button type="button" onclick="document.getElementById('review-form').classList.add('hidden')"
                                class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>

            <script>
                function setRating(rating) {
                    document.getElementById('rating').value = rating;
                    const stars = document.querySelectorAll('.rating-star');
                    stars.forEach((star, index) => {
                        star.textContent = index < rating ? '★' : '☆';
                        star.className = index < rating ? 'rating-star text-yellow-400' : 'rating-star text-gray-300';
                    });
                }
            </script>
        @endif
    @endauth

    <!-- Reviews List -->
    <div class="space-y-6">
        @forelse($property->approvedReviews()->recent()->get() as $review)
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-start justify-between">
                    <div>
                        <h5 class="font-semibold">{{ $review->user->name }}</h5>
                        <x-star-rating :rating="$review->rating" size="sm" />
                        <p class="text-gray-500 text-sm">{{ $review->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
                <p class="mt-3 text-gray-700">{{ $review->comment }}</p>
            </div>
        @empty
            <div class="bg-white rounded-lg shadow p-6 text-center">
                <p class="text-gray-500">No reviews yet. Be the first to review this property!</p>
            </div>
        @endforelse
    </div>
</div>



<div class="purchae w-full">
                        <!-- Buy/Rent Section -->
<div class="mt-8  bg-white rounded-lg shadow p-6">
    <h3 class="text-xl font-semibold mb-4">Interested in this property?</h3>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @if($property->canBePurchased())
            <div class="text-center w-full p-4 border rounded-lg hover:shadow-md transition-shadow">
                <h4 class="font-semibold text-lg mb-2">Purchase</h4>
                <p class="text-gray-600 mb-4">Buy this property for</p>
                <p class="text-2xl font-bold text-green-600 mb-4">${{ number_format($property->price) }}</p>
                <button onclick="handlePurchaseAction()" 
                        class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition-colors font-semibold">
                    <i class="fas fa-shopping-cart mr-2"></i>Buy Now
                </button>
            </div>
        @endif
        
        @if($property->canBeRented())
            <div class="text-center w-full p-4 border rounded-lg hover:shadow-md transition-shadow">
                <h4 class="font-semibold text-lg mb-2">Rent</h4>
                <p class="text-gray-600 mb-4">Rent this property for</p>
                <p class="text-2xl font-bold text-blue-600 mb-4">${{ number_format($property->price) }}/month</p>
                <button onclick="handleRentAction()" 
                        class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                    <i class="fas fa-calendar-alt mr-2"></i>Rent Now
                </button>
            </div>
        @endif
    </div>
</div>

<!-- Include Auth Modal -->
@auth
    <!-- User is logged in, no modal needed -->
@else
    <x-auth-modal 
        action="purchase or rent" 
        :redirectUrl="url()->current()" 
    />
@endauth

<script>
    function handlePurchaseAction() {
        @auth
            // User is logged in, redirect to checkout
            window.location.href = "{{ route('purchases.checkout', $property) }}";
        @else
            // User is not logged in, show auth modal
            showAuthModal('purchase', "{{ route('purchases.checkout', $property) }}");
        @endauth
    }
    
    function handleRentAction() {
        @auth
            // User is logged in, redirect to rental form
            window.location.href = "{{ route('rentals.form', $property) }}";
        @else
            // User is not logged in, show auth modal
            showAuthModal('rent', "{{ route('rentals.form', $property) }}");
        @endauth
    }
</script>
</div>
</div>
                    <!-- Gallery Images -->
                    @if(count($property->gallery_images) > 0)
                        <div class="mb-8">
                            <h4 class="text-lg font-semibold mb-4">Gallery Images</h4>
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                @foreach($property->gallery_images as $index => $image)
                                    <div class="relative group">
                                        <img src="{{ asset('storage/' . $image) }}" 
                                             alt="Gallery Image" class="w-full h-32 object-cover rounded-lg">
                                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                                            <a href="{{ asset('storage/' . $image) }}" 
                                               target="_blank" class="text-white p-2 mr-2">
                                                <i class="fas fa-expand"></i>
                                            </a>
                                            <form action="{{ route('admin.properties.delete-image', ['property' => $property->id, 'imageIndex' => $index + 1]) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-white p-2" 
                                                        onclick="return confirm('Are you sure you want to delete this image?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Property Details -->
                    <div class="grid py-10 grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-500">Type</h4>
                            <p class="mt-1 text-gray-900">{{ ucfirst($property->type) }}</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-500">Status</h4>
                            <span class="mt-1 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $property->status ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $property->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-500">Price</h4>
                            <p class="mt-1 text-gray-900">₦{{ number_format($property->price, 2) }}</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-500">Bed/Bath/Area</h4>
                            <p class="mt-1 text-gray-900">
                                {{ $property->bedrooms ?? 'N/A' }} BD / {{ $property->bathrooms ?? 'N/A' }} BA
                                @if($property->area)
                                    / {{ $property->area }} sq ft
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Description -->
                    @if($property->description)
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold mb-4">Description</h4>
                            <p class="text-gray-700 leading-relaxed">{{ $property->description }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>