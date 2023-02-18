<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostAdditionalData>
 */
class PostAdditionalDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "post_id" => fake()->numberBetween(1, 50),
            "title" => fake()->title(),
            "body" => fake()->text(),
            "image" => fake()->imageUrl(),
            "quote" => fake()->text(255),
        ];
    }
}
