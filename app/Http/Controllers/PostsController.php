<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use App\Utils\CustomResponse;
use App\Events\PostWasUpdated;
use App\Http\Requests\PostRequest;
use App\Repositories\PostRepository;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
        // $this->middleware('auth')->only('create', 'store', 'edit', 'update', 'destroy');
    }

    public function index(PostRepository $postRepo)
    {
        $posts = $postRepo->getAllPaginatedPost(15);

        return CustomResponse::respond(request(), 'posts.index', $posts);
    }

    public function show(Post $post)
    {
        $post->load('comments.user');

        if (request()->wantsJson()) {
            return $post;
        }

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        $tags = Tag::orderBy('name')->get();

        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->validated());

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.show', $post);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $categories = Category::orderBy('name')->get();

        $tags = Tag::orderBy('name')->get();

        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post, PostRequest $request)
    {
        $this->authorize('update', $post);

        $post->update($request->validated());

        $post->tags()->sync($request->tags);

        event(new PostWasUpdated($post));

        return redirect()->route('posts.show', $post);
    }
}
