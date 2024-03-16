<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = \App\Models\Post::with('user')->paginate();
        return view('posts.index',['posts'=> $posts]);
    }

    public function show(string $id) {
        $post = \App\Models\Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    public function create() {
        $users = \App\Models\User::all();
        return view('posts.create',['users' => $users]);
    }

    public function store(Request $request) {
         // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'enabled' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);

        // Create a new Post instance
        $post = new \App\Models\Post();
        $post->title = $validatedData['title'];
        $post->user_id = Auth::id();
        $post->body = $validatedData['body'];
        $post->enabled = $validatedData['enabled'] ?? false; // Default value if not provided
        $post->published_at = $validatedData['published_at'];

        $post->save();
    }

    public function edit(string $id) {
        $post = \App\Models\Post::find($id);
        return view('posts.edit',['post'=> $post]);
    }

    public function update(Request $request, string $id)
    {
        \App\Models\Post::where('id', $id)->update($request->only('title', 'body', 'enabled'));
        return redirect()->route('posts.index');
    }

    public function destroy(string $id) {
        \App\Models\Post::where("id", $id)->delete();
        $deletedPosts = \App\Models\Post::onlyTrashed()->get();
        return view('posts.trash',['deletedPosts'=> $deletedPosts]);   
     }
    
}
