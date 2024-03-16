<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::withCount('posts')->paginate();
        return view('users.index', compact('users'));
    }
}
