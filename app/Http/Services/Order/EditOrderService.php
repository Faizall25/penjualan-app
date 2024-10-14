<?php

namespace App\Http\Services\Order;

use App\Http\DTO\Order\OrderDto;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class EditOrderService
{
    public static function handle(OrderDto $orderDto)
    {
        try {
            $order = Order::where('id', $orderDto->id)->update($orderDto->toArray());
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            throw new \Exception($th);
        }
    }
}
