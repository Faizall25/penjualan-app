<?php

namespace App\Http\Services\Customer;

use App\Http\DTO\Customer\CustomerDto;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;

class EditCustomerService
{
    public static function handle(CustomerDto $customerDto)
    {
        try {
            Customer::where('id', $customerDto->id)->update($customerDto->toArray());
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
}
