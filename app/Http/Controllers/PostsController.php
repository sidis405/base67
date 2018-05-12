<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'category', 'tags')->latest()->paginate(15);

        return view('posts.index', compact('posts'));
    }
}
