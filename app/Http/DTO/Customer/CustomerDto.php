<?php

namespace App\Http\DTO\Customer;

class CustomerDto
{
    public function __construct(
        public ?int $id = 0,
        public ?string $customer_name = '',
        public ?string $customer_city = ''
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'customer_name' => $this->customer_name,
            'customer_city' => $this->customer_city
        ];
    }

    public static function fromModel($model): CustomerDto
    {
        return new CustomerDto(
            id: $model->id,
            customer_name: $model->customer_name,
            customer_city: $model->customer_city
        );
    }
}
