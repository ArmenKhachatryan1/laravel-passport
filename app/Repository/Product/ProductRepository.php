<?php

namespace App\Repository\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    public function query(): Builder
    {
        return Product::query();
    }

    public function all(): Collection
    {
        return $this->query()->get();
    }

    public function getById(int $id): Product
    {
        return $this->query()->findOrFail($id);
    }


}
