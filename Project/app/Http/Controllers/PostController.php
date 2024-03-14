<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = \App\Models\Post::all();
        return view('posts.index',['posts'=> $posts]);
    }

    public function show(string $id) {
        $post = \App\Models\Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        // Create a new Post instance
        $post = new \App\Models\Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->enabled = $request->enabled;
        $post->published_at = $request->published_at;
        $post->save();
    }

    public function edit(string $id) {
        $post = \App\Models\Post::find($id);
        return view('posts.edit',['post'=> $post]);
    }

    public function update(Request $request, string $id)
    {
        // Retrieve the post by ID
        $post = \App\Models\Post::find($id);

        // Update the post attributes with the new values from the request
        $post->title = $request->title;
        $post->body = $request->body;
        $post->enabled = $request->enabled;
        $post->published_at = $request->published_at;
        $post->save();

        // Return a response
        return "Post updated successfully!";
    }

    public function destroy(string $id) {
        \App\Models\Post::where("id", $id)->delete();
        $deletedPosts = \App\Models\Post::onlyTrashed()->get();
        return view('posts.trash',['deletedPosts'=> $deletedPosts]);   
     }
    
}
