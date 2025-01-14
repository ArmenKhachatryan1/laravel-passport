<?php

namespace App\Services\Order;

use App\Repository\Order\OrderRepository;

class OrderService
{
    protected OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function run()
    {
        $orders = $this->orderRepository->all();
    }
}
