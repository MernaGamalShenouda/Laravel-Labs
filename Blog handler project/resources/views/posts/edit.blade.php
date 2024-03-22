@extends('layouts.main')
@section('title', 'Index Page')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Post</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.update', $post->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" class="form-control" rows="5" required>{{ $post->body }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="published_at">Published At</label>
                                <input type="datetime-local" name="published_at" id="published_at" class="form-control" value="{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i') : '' }}">
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="enabled" id="enabled" {{ $post->enabled ? 'checked' : '' }}>
                                    <label class="form-check-label" for="enabled">Enabled</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
