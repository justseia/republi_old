<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'position' => fake()->name(),
            'salary_from' => fake()->numberBetween(10000, 50000),
            'salary_to' => fake()->numberBetween(50000, 100000),
            'location_id' => fake()->numberBetween(1, 2),
            'company_id' => fake()->numberBetween(1, 10),
            'criteria_id' => fake()->numberBetween(1, 10),
            'responsibility' => '{"title":"Обязанности","body":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys  standard dummy text ever since the 1500s, when  an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fi ve centuries, but also the leap into electronic t ypesetting, remaining essentially unchanged.  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more re cently with desktop publishing software lik e Aldus PageMaker including versions  of Lorem Ipsum."}',
            'requirement' => '{"title":"Требования","body":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys  standard dummy text ever since the 1500s, when  an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fi ve centuries, but also the leap into electronic t ypesetting, remaining essentially unchanged.  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more re cently with desktop publishing software lik e Aldus PageMaker including versions  of Lorem Ipsum."}',
            'condition' => '{"title":"Условия","body":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys  standard dummy text ever since the 1500s, when  an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fi ve centuries, but also the leap into electronic t ypesetting, remaining essentially unchanged.  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more re cently with desktop publishing software lik e Aldus PageMaker including versions  of Lorem Ipsum."}',
            'skill' => '{"title":"Ключевые навыки","body": ["Figma","Figma","Figma","Figma","Figma","Figma","Figma"]}',
        ];
    }
}
