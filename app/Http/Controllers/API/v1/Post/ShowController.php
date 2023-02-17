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
            'additional_data' => [
                [
                    'title' => 'Заголовок',
                    'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'sstandard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic t ypesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more rently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                    'image' => 'https://via.placeholder.com/400x300.png/008822?text=iusto',
                    'quote' => null
                ],
                [
                    'title' => 'Заголовок',
                    'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'sstandard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic t ypesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more rently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                    'image' => null,
                    'quote' => '“ Цитата - это повторение предложения, фразы или отрывка из речи или текста, которые кто-то сказал или написал. ”'
                ],
                [
                    'title' => 'Заголовок',
                    'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'sstandard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic t ypesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more rently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                    'image' => null,
                    'quote' => null
                ]
            ],
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
