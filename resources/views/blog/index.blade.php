<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <form method="GET" action="{{ route('blog.index') }}">
                        <div class="flex">
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   class="flex-grow rounded-l-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" 
                                   placeholder="Search blog posts...">
                            <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-r-md transition duration-300">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @if(auth()->check() && auth()->user()->isAdmin())
                <div class="mb-6 flex justify-end">
                    <a href="{{ route('admin.blogs.create') }}" class="bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                        Create New Post
                    </a>
                </div>
            @endif

            <!-- Blog Posts Grid -->
            @if($blogs->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($blogs as $blog)
                        <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                            <div class="relative">
                                <img src="{{ $blog->image ? Storage::url($blog->image) : 'https://images.unsplash.com/photo-1542435503-956c469947f6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1974&q=80' }}" 
                                     alt="{{ $blog->title }}" class="w-full h-48 object-cover">
                                <div class="absolute top-2 right-2">
                                    @if($blog->isPublished())
                                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Published</span>
                                    @elseif($blog->isScheduled())
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Scheduled</span>
                                    @else
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Draft</span>
                                    @endif
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                                    <span>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Not published' }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ $blog->getReadingTime() }}</span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">{{ $blog->title }}</h3>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $blog->getLimitedExcerpt(100) }}</p>
                                <div class="flex items-center justify-between">
                                    <a href="{{ route('blog.show', $blog) }}" class="text-primary-600 hover:text-primary-700 dark:text-primary-400 dark:hover:text-primary-300 font-medium inline-flex items-center">
                                        Read More
                                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $blog->user->name }}
                                    </div>
                                </div>
                                
                                @if(auth()->check() && auth()->user()->isAdmin())
                                    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-600 flex justify-between text-sm">
                                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-indigo-600 hover:text-indigo-900 dark:hover:text-indigo-400">Edit</a>
                                        <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 dark:hover:text-red-400" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $blogs->links() }}
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900 dark:text-white">No blog posts found</h3>
                        <p class="mt-1 text-gray-500 dark:text-gray-400">
                            @if(request('search'))
                                Try adjusting your search terms to find what you're looking for.
                            @else
                                Check back later for new blog posts.
                            @endif
                        </p>
                        @if(request('search'))
                            <div class="mt-6">
                                <a href="{{ route('blog.index') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 dark:bg-primary-700 border border-transparent rounded-md font-semibold text-white hover:bg-primary-700 dark:hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                    Clear Search
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>