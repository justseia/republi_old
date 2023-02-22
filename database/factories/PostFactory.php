<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->title(),
            'body' => fake()->text(),
            'image' => fake()->imageUrl(),
            'user_id' => fake()->numberBetween(1, 10),
            'likes' => fake()->numberBetween(1, 10000),
            'views' => fake()->numberBetween(1, 10000),
            'category_id' => fake()->numberBetween(1, 10),
        ];
    }
}
