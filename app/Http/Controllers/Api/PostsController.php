<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;

class PostsController extends Controller
{
    public function index(PostRepository $postRepo)
    {
        $posts = $postRepo->getAllPaginatedPost(15);

        return response()->json([
            'response' => 'success',
            'results' => [
                compact('posts'),
            ],
        ]);
    }
}
