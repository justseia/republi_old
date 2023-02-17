<?php

namespace App\Http\Controllers\API\v1\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($post)
    {
        $post = Post::with('images')->find($post);

        if (!$post) {
            return response()->json([
                'status' => '404',
                'message' => 'Not found'
            ], 404);
        }
        return response()->json($post, 200);
    }
}
