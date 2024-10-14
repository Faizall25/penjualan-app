<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $datas = Customer::query();

        if ($request->has('search')) {
            $datas = $datas->where('customer_name', 'like', '%' . $request->search . '%');
        }

        $datas = $datas->orderBy('id', 'desc')->paginate(5)->withQueryString();
        return view('admin.pages.customer.index', compact('datas'));
    }

    // public function show(Customer $customer)
    // {
    //     return view('admin.pages.customer.detail', compact('customer'));
    // }


}
