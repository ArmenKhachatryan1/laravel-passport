<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'price' => fake()->numberBetween(100, 10000),
            'stock' => fake()->numberBetween(0, 100),
        ];
    }
}
