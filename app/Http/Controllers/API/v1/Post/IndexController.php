<?php

namespace App\Http\Controllers\API\v1\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::query()->with(['images', 'user', 'category'])->simplePaginate(50);

        $collection = $posts->collect()->map(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'body' => $post->body,
                'user' => [
                    'id' => $post->user->id,
                    'name' => $post->user->name,
                    'surname' => $post->user->surname,
                    'photo' => $post->user->photo,
                    'follow' => true
                ],
                'category' => $post->category->name,
                'images' => $post->images->map(fn($image) => $image->url),
                'created_at' => $post->created_at,
            ];
        });
        $posts->setCollection($collection);

        return response()->json($posts, 200);
    }
}
