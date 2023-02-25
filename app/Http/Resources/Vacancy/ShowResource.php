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
            'responsibility' => json_decode($this->responsibility),
            'requirement' => json_decode($this->requirement),
            'condition' => json_decode($this->condition),
            'skill' => json_decode($this->skill),
            'company' => [
                'id' => $this->company->id,
                'name' => $this->company->name,
                'username' => $this->company->username,
                'photo' => $this->company->photo,
            ],
        ];
    }
}
