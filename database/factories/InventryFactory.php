<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventry>
 */
class InventryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'name' => fake()->word(),
        'price' => fake()->numberBetween(0, 500), 
        'description' => fake()->unique()->sentence()
        ];
    }
}
