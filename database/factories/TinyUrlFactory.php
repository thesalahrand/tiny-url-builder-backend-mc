<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TinyUrl>
 */
class TinyUrlFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_url' => fake()->url(),
            'tiny_url' => fake()->word() . '-' . fake()->word() . '-' . fake()->word(),
            'user_id' => User::factory()
        ];
    }
}
