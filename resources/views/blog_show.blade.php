@extends('layouts.default')

@section('title', $post->title)

@section('maincontent')
<div class="container mx-auto px-4 py-10">
    <div class="max-w-3xl mx-auto">
        <img src="{{ $post->featured_image }}" 
             alt="{{ $post->title }}" 
             class="w-full h-80 object-cover rounded-lg shadow mb-6">

        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>

        <p class="text-gray-500 text-sm mb-6">
            By {{ $post->author->name ?? 'Unknown' }} • 
            {{ $post->created_at->format('M d, Y') }}
        </p>

        <div class="prose max-w-none">
            {!! nl2br(e($post->content)) !!}
        </div>
    </div>
</div>
@endsection
