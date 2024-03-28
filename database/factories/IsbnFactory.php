<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Isbn>
 */
class IsbnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'isbn' => fake()->unique()->randomNumber(5, true),
            'writer' => fake()->name(),
            'title' => fake()->slug(),
            'publisher' => fake()->company(),
            'publishedAt' => fake()->numberBetween(1940, 2024)
        ];
    }
}
