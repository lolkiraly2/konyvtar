<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'postcode' => fake()->postcode(),
            'city'=> fake()->bigCity(),
            'street' => fake()->address(),
            'number' => fake()->buildingNumber(),
            'type'  => fake()->randomElement(['student', 'professor', 'fromElsewhere','other']),
            'contact' => fake()->email(),
            'borrowCount' => 3
        ];
    }
}
