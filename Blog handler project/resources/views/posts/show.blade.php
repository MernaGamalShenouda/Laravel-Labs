@extends('layouts.main')
@section('title', 'Index Page')

@section('content')
    <div class="container mt-5">
        <h1>Show Post</h1>
        <div class="card">
            <div class="card-body">
                <p class="card-text"><strong>ID:</strong> {{ $post->id }}</p>
                <p class="card-text"><strong>Title:</strong> {{ $post->title }}</p>
                <p class="card-text"><strong>User:</strong> {{ $post->user->name }}</p>
                <p class="card-text"><strong>Enabled:</strong> {{ $post->enabled }}</p>
                <p class="card-text"><strong>Published At:</strong> {{ $post->published_at }}</p>
                @if($post->image)
                    <div class="post-image">
                        <img src="{{ Storage::disk('public')->url($post->image)}}" alt="Post-Image">
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
