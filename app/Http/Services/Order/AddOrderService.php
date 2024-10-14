<?php

namespace App\Http\Services\Order;

use App\Http\DTO\Order\OrderDto;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class AddOrderService
{
    public static function handle(OrderDto $orderDto)
    {
        try {
            $order = Order::create($orderDto->toArray());
            return $order;
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
}
