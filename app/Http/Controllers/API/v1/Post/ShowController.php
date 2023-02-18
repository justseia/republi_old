<?php

namespace App\Http\Controllers\API\v1\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($post)
    {
        $post = Post::query()->with(['images', 'user', 'category', 'additional_data', 'comments'])->find($post);

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
            'image' => $post->image,
            'additional_data' => $post->additional_data->map(fn($data) => [
                'title' => $data->title,
                'body' => $data->body,
                'image' => $data->image,
                'quote' => $data->quote,
            ]),
            'user' => [
                'id' => $post->user->id,
                'name' => $post->user->name,
                'surname' => $post->user->surname,
                'photo' => $post->user->photo,
                'is_popular' => (boolean)$post->user->is_popular,
                'follow' => (boolean)$post->user->is_popular
            ],
            'category' => $post->category->name,
            'created_at' => $post->created_at->diffForHumans(now(), true),
            'total_likes' => 123 < 1000 ? 123 : number_format(123 / 1000) . 'k',
            'total_views' => 12423 < 1000 ? 12423 : number_format(12423 / 1000) . 'k',
            'total_comments' => 1232 < 1000 ? 1232 : number_format(1232 / 1000) . 'k',
            'comments' => $post->comments->map(fn($data) => [
                'body' => $data->body,
                'user' => [
                    'id' => $data->user->id,
                    'name' => $data->user->name,
                    'surname' => $data->user->surname,
                    'photo' => $data->user->photo,
                    'is_popular' => (boolean)$data->user->is_popular,
                ],
                'total_likes' => $data->like,
                'created_at' => $data->created_at->diffForHumans(now(), true),
            ]),
        ];
        $post = $collection;

        return response()->json($post, 200);
    }
}
