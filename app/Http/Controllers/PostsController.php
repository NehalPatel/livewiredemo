<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.list');
    }

    public function create()
    {
        return view('posts.create', ['post' => new Post]);
    }

    public function edit(Post $post)
    {
        return view('posts.create', ['post' => $post]);
    }
}
