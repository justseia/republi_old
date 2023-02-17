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
            'title' => '«Циан» стал самым популярным сервисом среди покупателей новостроек',
            'body' => 'Так говорит независимое исследование агентства ORO (ex. Kantar) – Realty Monitor.',
        ];
    }
}
