@extends('layouts.main')
@section('title', 'Create Page')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Post</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" class="form-control" rows="5" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="published_at">Published At</label>
                                <input type="datetime-local" name="published_at" id="published_at" class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="enabled" id="enabled" checked>
                                    <label class="form-check-label" for="enabled">Enabled</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="post-image">Image</label>
                                <input type="file" name="image" id="post-image" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
