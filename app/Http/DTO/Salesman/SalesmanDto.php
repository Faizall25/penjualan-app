<?php

namespace App\Http\DTO\Salesman;

use Ramsey\Uuid\Type\Decimal;

class SalesmanDto
{
    public function __construct(
        public ?int $id = 0,
        public ?string $salesman_name = '',
        public ?string $salesman_city = '',
        public ?Decimal $commission = 0.0
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'salesman_name' => $this->salesman_name,
            'salesman_city' => $this->salesman_city,
            'commission' => $this->commission
        ];
    }

    public static function fromModel($model): SalesmanDto
    {
        return new SalesmanDto(
            id: $model->id,
            salesman_name: $model->salesman_name,
            salesman_city: $model->salesman_city,
            commission: $model->commission
        );
    }
}
