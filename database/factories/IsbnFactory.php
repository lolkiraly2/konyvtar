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

        $isbn = strval(fake()->unique()->randomNumber(6, true)) . strval(fake()->unique()->randomNumber(7, true));
        return [
            'isbn' =>  $isbn,
            'writer' => fake()->name(),
            'title' => fake()->slug(),
            'publisher' => fake()->company(),
            'publishedAt' => fake()->numberBetween(1940, 2024)
        ];
    }
}
