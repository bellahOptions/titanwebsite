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

                    <!-- Image Slideshow and Map -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                        <!-- Image Slideshow -->
                        <div class="relative">
                            @if($property->images->count() > 0)
                                <!-- Main Slideshow -->
                                <div class="relative h-96 bg-black rounded-lg overflow-hidden">
                                    @foreach($property->images as $index => $image)
                                        <div class="absolute inset-0 transition-opacity duration-500 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                                             data-slide="{{ $index }}">
                                            <img src="{{ $image->getOptimizedUrl(800, 600) }}" 
     alt="{{ $property->title }} - Image {{ $index + 1 }}"
     class="w-full h-full object-cover">

                                            @if($image->is_featured)
                                                <span class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                                    Featured
                                                </span>
                                            @endif
                                        </div>
                                    @endforeach
                                    
                                    <!-- Navigation Arrows -->
                                    @if($property->images->count() > 1)
                                        <button class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 rounded-full hover:bg-opacity-75 transition-all"
                                                onclick="prevSlide()">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <button class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 rounded-full hover:bg-opacity-75 transition-all"
                                                onclick="nextSlide()">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    @endif
                                    
                                    <!-- Slide Counter -->
                                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-black bg-opacity-50 text-white px-3 py-1 rounded-full text-sm">
                                        <span id="current-slide">1</span> / {{ $property->images->count() }}
                                    </div>
                                    
                                    <!-- Fullscreen Button -->
                                    <button class="absolute top-4 right-4 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 transition-all"
                                            onclick="openLightbox()">
                                        <i class="fas fa-expand"></i>
                                    </button>
                                </div>

                                <!-- Thumbnail Navigation -->
                                @if($property->images->count() > 1)
                                    <div class="mt-4 grid grid-cols-5 gap-2">
                                        @foreach($property->images as $index => $image)
                                            <button class="thumbnail-btn h-20 rounded-lg overflow-hidden border-2 transition-all {{ $index === 0 ? 'border-blue-500' : 'border-transparent' }}"
                                                    onclick="goToSlide({{ $index }})">
                                                <img src="{{ $image->getThumbnailUrl() }}" 
                                                     alt="Thumbnail {{ $index + 1 }}"
                                                     class="w-full h-full object-cover">
                                            </button>
                                        @endforeach
                                    </div>
                                @endif
                            @else
                                <!-- No Images Placeholder -->
                                <div class="w-full h-96 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <div class="text-center">
                                        <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                                        <p class="text-gray-400">No images available</p>
                                    </div>
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
                    </div>

                    <!-- Reviews and Purchase Sections -->
                    <div class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6">
                        <!-- Reviews Section -->
                        <div class="lg:w-2/3">
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

                        <!-- Purchase Section -->
                        <div class="lg:w-1/3">
                            <!-- Buy/Rent Section -->
                            <div class="bg-white rounded-lg shadow p-6 sticky top-6">
                                <h3 class="text-xl font-semibold mb-4">Interested in this property?</h3>
                                
                                <div class="space-y-4">
                                    @if($property->canBePurchased())
                                        <div class="text-center w-full p-4 border rounded-lg hover:shadow-md transition-shadow">
                                            <h4 class="font-semibold text-lg mb-2">Purchase</h4>
                                            <p class="text-gray-600 mb-4">Buy this property for</p>
                                            <p class="text-2xl font-bold text-green-600 mb-4">₦{{ number_format($property->price) }}</p>
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
                                            <p class="text-2xl font-bold text-blue-600 mb-4">₦{{ number_format($property->price) }}/month</p>
                                            <button onclick="handleRentAction()" 
                                                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                                                <i class="fas fa-calendar-alt mr-2"></i>Rent Now
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

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

    <!-- Lightbox Modal -->
    @if($property->images->count() > 0)
        <div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden">
            <div class="relative w-full h-full flex items-center justify-center">
                <button class="absolute top-4 right-4 text-white text-2xl z-10"
                        onclick="closeLightbox()">
                    <i class="fas fa-times"></i>
                </button>
                
                <button class="absolute left-4 text-white text-2xl z-10 bg-black bg-opacity-50 p-3 rounded-full"
                        onclick="lightboxPrevSlide()">
                    <i class="fas fa-chevron-left"></i>
                </button>
                
                <button class="absolute right-4 text-white text-2xl z-10 bg-black bg-opacity-50 p-3 rounded-full"
                        onclick="lightboxNextSlide()">
                    <i class="fas fa-chevron-right"></i>
                </button>
                
                <div class="relative max-w-4xl max-h-full">
                    <img id="lightbox-image" src="" alt="" class="max-w-full max-h-full object-contain">
                </div>
                
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-white">
                    <span id="lightbox-counter">1</span> / {{ $property->images->count() }}
                </div>
            </div>
        </div>
    @endif

    <!-- Include Auth Modal -->
    @auth
        <!-- User is logged in, no modal needed -->
    @else
        <x-auth-modal 
            action="purchase or rent" 
            :redirectUrl="url()->current()" 
        />
    @endauth

    <style>
        .thumbnail-btn:hover {
            border-color: #3b82f6 !important;
            transform: scale(1.05);
        }
        
        .thumbnail-btn.active {
            border-color: #3b82f6 !important;
        }
    </style>

    <script>
        // Slideshow functionality
        let currentSlide = 0;
        const totalSlides = {{ $property->images->count() }};
        
        function showSlide(index) {
            // Hide all slides
            document.querySelectorAll('[data-slide]').forEach(slide => {
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0');
            });
            
            // Show current slide
            document.querySelector(`[data-slide="${index}"]`).classList.remove('opacity-0');
            document.querySelector(`[data-slide="${index}"]`).classList.add('opacity-100');
            
            // Update thumbnails
            document.querySelectorAll('.thumbnail-btn').forEach((btn, i) => {
                btn.classList.toggle('border-blue-500', i === index);
                btn.classList.toggle('border-transparent', i !== index);
            });
            
            // Update counter
            document.getElementById('current-slide').textContent = index + 1;
            currentSlide = index;
        }
        
        function nextSlide() {
            const next = (currentSlide + 1) % totalSlides;
            showSlide(next);
        }
        
        function prevSlide() {
            const prev = (currentSlide - 1 + totalSlides) % totalSlides;
            showSlide(prev);
        }
        
        function goToSlide(index) {
            showSlide(index);
        }
        
        // Auto-advance slideshow (optional)
        let slideshowInterval;
        
        function startSlideshow() {
            if (totalSlides > 1) {
                slideshowInterval = setInterval(nextSlide, 5000);
            }
        }
        
        function stopSlideshow() {
            clearInterval(slideshowInterval);
        }
        
        // Lightbox functionality
        function openLightbox() {
            document.getElementById('lightbox').classList.remove('hidden');
            updateLightboxImage(currentSlide);
            stopSlideshow();
        }
        
        function closeLightbox() {
            document.getElementById('lightbox').classList.add('hidden');
            startSlideshow();
        }
        
        function updateLightboxImage(index) {
            const image = document.querySelector(`[data-slide="${index}"] img`).src;
            document.getElementById('lightbox-image').src = image;
            document.getElementById('lightbox-counter').textContent = index + 1;
            currentSlide = index;
        }
        
        function lightboxNextSlide() {
            const next = (currentSlide + 1) % totalSlides;
            updateLightboxImage(next);
            showSlide(next); // Sync with main slideshow
        }
        
        function lightboxPrevSlide() {
            const prev = (currentSlide - 1 + totalSlides) % totalSlides;
            updateLightboxImage(prev);
            showSlide(prev); // Sync with main slideshow
        }
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (document.getElementById('lightbox').classList.contains('hidden')) {
                if (e.key === 'ArrowLeft') prevSlide();
                if (e.key === 'ArrowRight') nextSlide();
                if (e.key === 'Escape') closeLightbox();
                if (e.key === ' ') {
                    e.preventDefault();
                    openLightbox();
                }
            } else {
                if (e.key === 'ArrowLeft') lightboxPrevSlide();
                if (e.key === 'ArrowRight') lightboxNextSlide();
                if (e.key === 'Escape') closeLightbox();
            }
        });
        
        // Review rating functionality
        function setRating(rating) {
            document.getElementById('rating').value = rating;
            const stars = document.querySelectorAll('.rating-star');
            stars.forEach((star, index) => {
                star.textContent = index < rating ? '★' : '☆';
                star.className = index < rating ? 'rating-star text-yellow-400' : 'rating-star text-gray-300';
            });
        }
        
        // Purchase/Rent actions
        function handlePurchaseAction() {
            @auth
                window.location.href = "{{ route('purchases.checkout', $property) }}";
            @else
                showAuthModal('purchase', "{{ route('purchases.checkout', $property) }}");
            @endauth
        }
        
        function handleRentAction() {
            @auth
                window.location.href = "{{ route('rentals.form', $property) }}";
            @else
                showAuthModal('rent', "{{ route('rentals.form', $property) }}");
            @endauth
        }
        
        // Initialize slideshow
        document.addEventListener('DOMContentLoaded', () => {
            startSlideshow();
            
            // Pause slideshow on hover
            const slideshow = document.querySelector('.relative.h-96');
            if (slideshow) {
                slideshow.addEventListener('mouseenter', stopSlideshow);
                slideshow.addEventListener('mouseleave', startSlideshow);
            }
        });
    </script>
</x-app-layout>