<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostComment>
 */
class PostCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_id' => fake()->numberBetween(1, 50),
            'parent_id' => null,
            'user_id' => fake()->numberBetween(1, 10),
            'like' => fake()->numberBetween(1, 10000),
            'body' => fake()->text(),
        ];
    }
}
