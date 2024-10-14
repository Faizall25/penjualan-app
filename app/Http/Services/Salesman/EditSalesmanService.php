<?php

namespace App\Http\Services\Salesman;

use App\Http\DTO\Salesman\SalesmanDto;
use App\Models\Salesmans;
use Illuminate\Support\Facades\Log;

class EditSalesmanService
{
    public static function handle(SalesmanDto $salesmanDto)
    {
        try {
            Salesmans::where('id', $salesmanDto->id)->update($salesmanDto->toArray());
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
}
