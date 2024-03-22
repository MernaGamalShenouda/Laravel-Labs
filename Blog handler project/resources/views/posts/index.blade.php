@extends('layouts.main')
@section('title', 'Index Page')

@section('content')
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>User</th>
                <th>User ID</th>
                <th>Enabled</th>
                <th>Published At</th>
                <th>Image URL</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><a href="{{ route('posts.show', $post->id) }}">{{$post->title}}</a></td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->user->id}}</td>
                <td>{{$post->enabled}}</td>
                <td>{{$post->published_at}}</td>
                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;">{{$post->image}}</td>
                <td>
                    <!-- Edit Button -->
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    
                    <!-- Delete Button -->
                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $posts ->links() !!}
@endsection

