@extends('layouts.default')
@section('title', 'Blog & News')
@section('maincontent')

<div class="container mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold mb-6 text-center">Our Blog</h2>

    <!-- Trending Posts Slider -->
    <div class="mb-10">
        <h3 class="text-xl font-semibold mb-4">Trending Posts</h3>
        <div class="swiper trendingSwiper">
            <div class="swiper-wrapper">
                @foreach($trending as $post)
                    <div class="swiper-slide">
                        <a href="{{ route('blogs.show', $post->slug) }}">
                            <div class="bg-white rounded-lg shadow overflow-hidden">
                                <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h4 class="font-semibold">{{ $post->title }}</h4>
                                    <p class="text-sm text-gray-600">{{ Str::limit($post->excerpt, 80) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Slider Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <!-- Latest Posts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($blogs as $post)
            <a href="{{ route('blogs.show', $post->slug) }}">
                <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h4 class="font-bold text-lg">{{ $post->title }}</h4>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($post->excerpt, 100) }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $blogs->links() }}
    </div>
</div>
<script>
  var swiper = new Swiper(".trendingSwiper", {
    slidesPerView: 3,
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      320: { slidesPerView: 1 },
      768: { slidesPerView: 2 },
      1024: { slidesPerView: 3 },
    }
  });
</script>

</section>
@endsection
