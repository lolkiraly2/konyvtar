<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rent>
 */
class RentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'person_id' => Person::inRandomOrder()->first()->id,
            'inumber' => Book::inRandomOrder()->first()->inventorynumber,
            'rentdate' => now(),
            'expiredate' => now()->modify('+10 days'),
        ];
    }
}
