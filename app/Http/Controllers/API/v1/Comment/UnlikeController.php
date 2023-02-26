<?php

namespace App\Http\Controllers\API\v1\Comment;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;

class UnlikeController extends Controller
{
    public function __invoke(Post $post, PostComment $comment)
    {
        $comment->like--;
        $comment->save();

        return response()->json([
            'status' => '200',
            'message' => 'Success',
            'data' => [
                'total_likes' => $comment->like,
            ]
        ]);
    }
}
