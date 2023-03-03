<?php

namespace App\Http\Controllers\API\v1\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class UnlikeController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->unlike($post);

        return response()->json([
            'status' => '200',
            'message' => 'Unlike'
        ], 200);
    }
}
