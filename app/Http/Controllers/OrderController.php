<?php

namespace App\Http\Controllers;

use App\Services\Order\OrderService;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getOrders(OrderService $orderService)
    {dd(7451);
        $orderService->run();
    }
}
