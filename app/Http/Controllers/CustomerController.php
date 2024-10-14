<?php

namespace App\Http\Controllers;

use App\Http\DTO\Customer\CustomerDto;
use App\Http\Services\Customer\AddCustomerService;
use App\Http\Services\Customer\EditCustomerService;
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

        $datas = $datas->orderBy('id', 'asc')->paginate(5)->withQueryString();
        return view('admin.pages.customer.index', compact('datas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_city' => 'required',
        ]);

        try {
            $customerDto = new CustomerDto(
                customer_name: $request->customer_name,
                customer_city: $request->customer_city
            );
            AddCustomerService::handle($customerDto);

            return redirect()->back()->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan: ' . $th->getMessage());
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:customers,id',
            'customer_name' => 'required',
            'customer_city' => 'required',
        ]);

        try {
            $customer = Customer::findOrFail($request->id);

            $customerDto = new CustomerDto(
                id: $request->id,
                customer_name: $request->customer_name,
                customer_city: $request->customer_city,
            );

            EditCustomerService::handle($customerDto);
            return redirect()->back()->with('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data gagal diubah: ' . $th->getMessage());
        }
    }

    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
