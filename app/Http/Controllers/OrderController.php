<?php

namespace App\Http\Controllers;

use App\Http\DTO\Order\OrderDto;
use App\Http\Services\Order\AddOrderService;
use App\Http\Services\Order\EditOrderService;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Salesmans;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $datas = Order::query();

        if ($request->has('search')) {
            $datas = $datas->search($request->search);
        }

        $customers = Customer::all();
        $salesmans = Salesmans::all();
        $datas = $datas->with(['salesman', 'customer'])->orderBy('id', 'asc')->paginate(5)->withQueryString();
        // dd($datas->first()->salesman);
        return view('admin.pages.order.index', compact('datas', 'salesmans', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'customer_id' => 'required|exists:customers,id',
            'salesmans_id' => 'required|exists:salesmans,id',
        ]);

        try {
            // Ensure 'salesmans_id' is an integer (not an array)
            $salesmans_id = is_array($request->salesmans_id) ? $request->salesmans_id[0] : $request->salesmans_id;

            $orderDto = new OrderDto(
                order_date: $request->order_date,
                amount: $request->amount,
                customer_id: $request->customer_id,
                salesmans_id: $salesmans_id
            );

            // Use the AddOrderService to store the order
            $order = AddOrderService::handle($orderDto);

            // Only add additional orders if 'order_id' exists and is valid
            if ($request->has('order_id') && is_array($request->order_id)) {
                foreach ($request->order_id as $orderId) {
                    Order::create([
                        'order_date' => $request->order_date,
                        'amount' => $request->amount,
                        'customer_id' => $request->customer_id,
                        'salesmans_id' => $salesmans_id,
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data gagal disimpan: ' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        // Validation rules
        $request->validate([
            'id' => 'required|exists:orders,id',
            'order_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'customer_id' => 'required|exists:customers,id',
            'salesmans_id' => 'required|exists:salesmans,id',
        ]);

        try {
            // Get the order data that needs to be updated
            $existingOrder = Order::findOrFail($request->id);

            // Create a new OrderDto with updated values
            $orderDto = new OrderDto(
                id: $request->id,
                order_date: $request->order_date,
                amount: $request->amount,
                customer_id: $request->customer_id,
                salesmans_id: $request->salesmans_id
            );

            // Call the EditOrderService to update the order in the database
            EditOrderService::handle($orderDto);

            // Redirect back with success message
            return redirect()->back()->with('success', 'Order successfully updated');
        } catch (\Throwable $th) {
            // Handle any errors and return a failure message
            return redirect()->back()->with('error', 'Order update failed: ' . $th->getMessage());
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        try {
            $order->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
