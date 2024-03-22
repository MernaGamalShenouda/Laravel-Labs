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
            'image' => 'nullable|image',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            // Ensure the uploaded file is valid
            if ($request->file('image')->isValid()) {
                // Store the image and get the path
                $imagePath = $request->file('image')->store('posts', ['disk' => 'public']);
            }
        }


        // Create a new Post instance
        $post = new \App\Models\Post();
        $post->title = $validatedData['title'];
        $post->user_id = Auth::id();
        $post->body = $validatedData['body'];
        $post->enabled = $validatedData['enabled'] ?? false; // Default value if not provided
        $post->published_at = $validatedData['published_at'];
        $post->image = $imagePath;

        $post->save();

        return redirect()->route('posts.show',['id' => $post->id]);
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
