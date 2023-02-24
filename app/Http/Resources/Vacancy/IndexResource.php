<?php

namespace App\Http\Resources\Vacancy;

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
            'position' => $this->position,
            'salary_from' => $this->salary_from,
            'salary_to' => $this->salary_to,
            'responsibility' => $this->responsibility,
            'requirement' => $this->requirement,
            'condition' => $this->condition,
            'skill' => $this->skill,
            'location' => $this->city->country->name . ', ' . $this->city->name,
            'company' => [
                'id' => $this->company->id,
                'name' => $this->company->name,
                'username' => $this->company->username,
                'photo' => $this->company->photo,
            ],
        ];
    }
}
