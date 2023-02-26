<?php

namespace App\Http\Controllers\API\v1\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __invoke(Request $request, Post $post)
    {
        PostComment::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'body' => $request->body,
            'like' => 0,
            'dislike' => 0,
        ]);
        
        return response()->json([
            'status' => '200',
            'message' => 'Success'
        ]);
    }
}
