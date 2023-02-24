<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'image' => $this->image,
            'additional_data' => $this->additional_data->map(fn($data) => [
                'title' => $data->title,
                'body' => $data->body,
                'image' => $data->image,
                'quote' => $data->quote,
            ]),
            'user' => [
                'id' => $this->user->id,
                'full_name' => $this->user->full_name,
                'username' => $this->user->username,
                'photo' => $this->user->photo,
                'is_popular' => (boolean)$this->user->is_popular,
                'is_follow' => (boolean)$this->user->is_popular
            ],
            'category' => $this->category->name,
            'created_at' => $this->created_at->diffForHumans(now(), true),
            'total_likes' => $this->likes,
            'total_views' => $this->views,
            'total_comments' => $this->comments->count() + $this->comments->sum(fn($comment) => $comment->replies->count()),
            'comments' => $this->comments->map(fn($comment) => [
                'body' => $comment->body,
                'total_likes' => $comment->likes,
                'created_at' => $comment->created_at->diffForHumans(now(), true),
                'user' => [
                    'id' => $comment->user->id,
                    'full_name' => $comment->user->full_name,
                    'username' => $comment->user->username,
                    'photo' => $comment->user->photo,
                    'is_popular' => (boolean)$comment->user->is_popular,
                ],
                'replies' => $comment->replies->map(fn($reply) => [
                    'body' => $reply->body,
                    'total_likes' => $reply->likes,
                    'created_at' => $reply->created_at->diffForHumans(now(), true),
                    'user' => [
                        'id' => $reply->user->id,
                        'full_name' => $comment->user->full_name,
                        'username' => $comment->user->username,
                        'photo' => $reply->user->photo,
                        'is_popular' => (boolean)$comment->user->is_popular,
                    ],
                ]),
            ]),
        ];
    }
}
