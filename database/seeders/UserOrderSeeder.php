<?php

namespace Database\Seeders;

use App\Models\UserOrder;
use Illuminate\Database\Seeder;

class UserOrderSeeder extends Seeder
{
    public function run(): void
    {
        UserOrder::factory()->count(10)->create();
    }
}
