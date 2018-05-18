<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{
    public function getAllPaginatedPost($howMany = 15)
    {
        return Post::with('user', 'category', 'tags')->latest()->paginate($howMany);
    }
}
