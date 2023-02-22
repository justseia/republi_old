<?php

namespace App\Http\Controllers\API\v1\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\ShowResource;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($post)
    {
        $post = Post::query()->with(['images', 'user', 'category', 'additional_data', 'comments.user', 'comments.replies.user'])->find($post);

        return new ShowResource($post);
    }
}
