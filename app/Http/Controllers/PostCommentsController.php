<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|min:3',
            'parent_id' => 'sometimes|exists:comments,id',
        ]);

        $commentData = [
            'user_id' => auth()->id(),
            'body' => $request->body,
        ];

        if ($request->parent_id) {
            $commentData['parent_id'] = $request->parent_id;
        }

        $post->comments()->create($commentData);

        $lastComment = Comment::latest()->first();

        return redirect(route('posts.show', $post) . '#comment-' . $lastComment->id);
    }
}
