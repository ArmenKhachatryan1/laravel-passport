<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserOrderFactory extends Factory
{
    public function definition(): array
    {
        $user = User::query()->inRandomOrder()->first();
        $order = Order::query()->inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'order_id' => $order->id,
        ];
    }
}
