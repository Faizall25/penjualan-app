<?php

namespace App\Http\Services\Customer;

use App\Http\DTO\Customer\CustomerDto;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;

class AddCustomerService
{
    public static function handle(CustomerDto $customerDto)
    {
        try {
            $customer = Customer::create($customerDto->toArray());
            return $customer;
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
}
