<?php

namespace App\Http\Controllers\API\v1\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($post)
    {
        $post = Post::query()->with(['images', 'user', 'category'])->find($post);

        if (!$post) {
            return response()->json([
                'status' => '404',
                'message' => 'Not found'
            ], 404);
        }

        $collection = [
            'id' => $post->id,
            'title' => $post->title,
            'body' => $post->body,
            'additional_data' => [],
            'user' => [
                'id' => $post->user->id,
                'name' => $post->user->name,
                'surname' => $post->user->surname,
                'photo' => $post->user->photo,
                'is_popular' => (boolean)$post->user->is_popular,
                'follow' => (boolean)$post->user->is_popular
            ],
            'category' => $post->category->name,
            'images' => $post->images,
            'created_at' => $post->created_at->diffForHumans(now(), true),
            'likes' => 324,
            'comments' => 7,
            'views' => 7,
        ];
        $post = $collection;

        return response()->json($post, 200);
    }
}
