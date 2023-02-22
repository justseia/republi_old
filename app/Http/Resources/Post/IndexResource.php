<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
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
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'surname' => $this->user->surname,
                'photo' => $this->user->photo,
                'is_popular' => (boolean)$this->user->is_popular,
                'follow' => (boolean)$this->user->is_popular
            ],
            'category' => $this->category->name,
            'images' => $this->images,
            'created_at' => $this->created_at->diffForHumans(now(), true),
            'total_likes' => $this->likes,
            'total_views' => $this->views,
            'total_comments' => $this->comments->count() + $this->comments->sum(fn($comment) => $comment->replies->count()),
        ];
    }
}
