<?php

namespace Database\Factories;

use App\Models\Isbn;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'inventorynumber' => fake()->unique()->numberBetween(1,1000),
            'isbn_id' => Isbn::inRandomOrder()->first()->isbn
        ];
    }
}
