<?php

namespace App\Http\Resources\Vacancy;

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
            'position' => $this->position,
            'salary_from' => $this->salary_from,
            'salary_to' => $this->salary_to,
            'location' => $this->city->country->name . ', ' . $this->city->name,
            'is_saved' => (boolean)0,
            'is_responded' => (boolean)0,
            'is_popular' => (boolean)0,
            'total_responded' => 10,
            'responsibility' => json_decode($this->responsibility),
            'requirement' => json_decode($this->requirement),
            'condition' => json_decode($this->condition),
            'skill' => json_decode($this->skill),
            'created_at' => $this->created_at->diffForHumans(now(), true),
            'criteria' => [
                'Можно из дома',
                'Полная занятость',
                'Отклик без резюме',
            ],
            'company' => [
                'id' => $this->company->id,
                'name' => $this->company->name,
                'username' => $this->company->username,
                'photo' => $this->company->photo,
            ],
        ];
    }
}
