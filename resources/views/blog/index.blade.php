<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 dark:from-green-700 dark:to-green-800 rounded-2xl shadow-xl p-8 mb-8 text-white">
                <h1 class="text-4xl font-bold mb-4">Our Blog</h1>
                <p class="text-green-100 text-lg">Discover insights, tips, and updates from Titan & Equity Resources</p>
            </div>

            <!-- Search Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-2xl mb-8 border border-gray-200 dark:border-gray-700">
                <div class="p-6">
                    <form method="GET" action="{{ route('blog.index') }}">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                name="search" 
                                value="{{ request('search') }}" 
                                class="block w-full pl-12 pr-32 py-4 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/30 transition-all duration-200 outline-none" 
                                placeholder="Search blog posts...">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <button 
                                    type="submit" 
                                    class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Admin Create Button -->
            @if(auth()->check() && auth()->user()->isAdmin())
                <div class="mb-8 flex justify-end">
                    <a href="{{ route('admin.blogs.create') }}" 
                        class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Create New Post
                    </a>
                </div>
            @endif

            <!-- Blog Posts Grid -->
            @if($blogs->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($blogs as $blog)
                        <article class="group bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100 dark:border-gray-700">
                            <!-- Featured Image -->
                            <div class="relative overflow-hidden h-56">
                                <img src="{{ $blog->image_url ?? 'https://images.unsplash.com/photo-1542435503-956c469947f6?auto=format&fit=crop&w=1974&q=80' }}"
                                     alt="{{ $blog->title }}" 
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                
                                <!-- Status Badge -->
                                <div class="absolute top-4 right-4">
                                    @if($blog->isPublished())
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold backdrop-blur-md bg-green-500/90 text-white">
                                            <span class="w-2 h-2 rounded-full bg-white mr-1.5"></span>
                                            Published
                                        </span>
                                    @elseif($blog->isScheduled())
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold backdrop-blur-md bg-yellow-500/90 text-white">
                                            <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Scheduled
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold backdrop-blur-md bg-gray-500/90 text-white">
                                            Draft
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="p-6">
                                <!-- Meta Info -->
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Not published' }}</span>
                                    <span class="mx-2">•</span>
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>{{ $blog->getReadingTime() }}</span>
                                </div>

                                <!-- Title -->
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2 group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors duration-200">
                                    {{ $blog->title }}
                                </h3>

                                <!-- Excerpt -->
                                <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">
                                    {{ $blog->getLimitedExcerpt(100) }}
                                </p>

                                <!-- Footer -->
                                <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
                                    <a href="{{ route('blog.show', $blog) }}" 
                                        class="inline-flex items-center text-green-600 hover:text-green-700 dark:text-green-400 dark:hover:text-green-300 font-semibold text-sm transition-colors duration-200">
                                        Read More
                                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                        <div class="w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center mr-2">
                                            <span class="text-xs font-semibold text-green-700 dark:text-green-300">
                                                {{ substr($blog->user->name, 0, 1) }}
                                            </span>
                                        </div>
                                        <span class="font-medium">{{ $blog->user->name }}</span>
                                    </div>
                                </div>
                                
                                <!-- Admin Actions -->
                                @if(auth()->check() && auth()->user()->isAdmin())
                                    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-between text-sm">
                                        <a href="{{ route('admin.blogs.edit', $blog) }}" 
                                            class="text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 font-medium transition-colors duration-200">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="text-red-600 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 font-medium transition-colors duration-200" 
                                                onclick="return confirm('Are you sure you want to delete this post?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $blogs->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-200 dark:border-gray-700">
                    <div class="p-12 text-center">
                        <svg class="mx-auto h-16 w-16 text-gray-400 dark:text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No blog posts found</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            @if(request('search'))
                                Try adjusting your search terms to find what you're looking for.
                            @else
                                Check back later for new blog posts.
                            @endif
                        </p>
                        @if(request('search'))
                            <a href="{{ route('blog.index') }}" 
                                class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Clear Search
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>