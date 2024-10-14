<?php

namespace App\Http\DTO\Order;

use Ramsey\Uuid\Type\Decimal;

class OrderDto
{
    public function __construct(
        public ?int $id = 0,
        public ?string $order_date = null,
        public ?float $amount = 0.0,
        public ?int $customer_id = 0,
        public ?int $salesmans_id = 0
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'order_date' => $this->order_date,
            'amount' => $this->amount,
            'customer_id' => $this->customer_id,
            'salesmans_id' => $this->salesmans_id,
        ];
    }

    public static function fromModel($model): OrderDto
    {
        return new OrderDto(
            id: $model->id,
            order_date: $model->order_date,
            amount: $model->amount,
            customer_id: $model->customer_id,
            salesmans_id: $model->salesmans_id,
        );
    }
}
