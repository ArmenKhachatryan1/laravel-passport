<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        $product = Product::query()->inRandomOrder()->first();

        return [
            'product_id' => $product->id,
        ];
    }
}
