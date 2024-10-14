<?php

namespace App\Http\Services\Salesman;

use App\Http\DTO\Salesman\SalesmanDto;
use App\Models\Salesmans;
use Illuminate\Support\Facades\Log;

class AddSalesmanService
{
    public static function handle(SalesmanDto $salesmanDto)
    {
        try {
            $salesman = Salesmans::create($salesmanDto->toArray());
            return $salesman;
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
}
