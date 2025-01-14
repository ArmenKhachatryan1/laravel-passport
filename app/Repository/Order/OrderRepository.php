<?php

namespace App\Repository\Order;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    private function query(): Builder
    {
        return Order::query();
    }

    public function all(int $userId): Collection
    {
        return $this->query()->where('user_id', $userId)->get();
    }

    public function getById(int $id, int $userId): Order
    {
        return $this->query()
            ->where('user_id', $userId)
            ->findOrFail($id);
    }
}
