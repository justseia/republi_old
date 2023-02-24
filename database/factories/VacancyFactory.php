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
            'responsibility' => '{"id":1}',
            'requirement' => '{"id":1}',
            'condition' => '{"id":1}',
            'skill' => '{"id":1}',
        ];
    }
}
