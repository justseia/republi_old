<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'BIN/IIN' => fake()->creditCardType(),
            'contact_person' => fake()->name(),
            'photo' => fake()->imageUrl(400, 400),
            'specialty' => fake()->name(),
            'number' => fake()->unique()->e164PhoneNumber(),
            'username' => fake()->unique()->userName(),
            'created_company' => now(),
            'email' => fake()->unique()->email(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
        ];
    }
}
