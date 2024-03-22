@extends('layouts.main')
@section('title', 'Index Page')

@section('content')
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Number of Posts</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->posts_count}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users ->links() !!}
@endsection

