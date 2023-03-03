<?php

namespace App\Http\Controllers\API\v1\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __invoke(Post $post)
    {
        $like = auth()->user()->likes($post);

        return response()->json([
            'status' => '200',
            'message' => 'Like',
            'data' => $like
        ], 200);
    }
}
