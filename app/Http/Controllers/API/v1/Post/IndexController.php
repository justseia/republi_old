<?php

namespace App\Http\Controllers\API\v1\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\IndexResource;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::with(['images', 'user', 'category'])->simplePaginate(200);

        return IndexResource::collection($posts);
    }
}
