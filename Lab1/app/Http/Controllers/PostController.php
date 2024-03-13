<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function show(string $id) {
        return view('posts.show', ['id' => $id]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
       return "Store a newly created resource in storage.";
    }

    public function edit(string $id) {
        return view('posts.edit',['id'=> $id]);
    }

    public function update(Request $request, string $id) {
        return "Update the specified resource with id $id in storage.";
    }

    public function destroy(string $id) {
        return "Remove the specified resource with id $id from storage.";
    }
    
}
