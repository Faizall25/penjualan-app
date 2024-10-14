<?php

namespace App\Http\Controllers;

use App\Http\DTO\Salesman\SalesmanDto;
use App\Http\Services\Salesman\AddSalesmanService;
use App\Http\Services\Salesman\EditSalesmanService;
use App\Models\Salesmans;
use Illuminate\Http\Request;

class SalesmanController extends Controller
{
    public function index(Request $request)
    {
        $datas = Salesmans::query();

        if ($request->has('search')) {
            $datas = $datas->where('salesman_name', 'like', '%' . $request->search . '%');
        }

        $datas = $datas->orderBy('id', 'asc')->paginate(5)->withQueryString();
        return view('admin.pages.salesman.index', compact('datas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'salesman_name' => 'required',
            'salesman_city' => 'required',
            'commission' => 'required',
        ]);

        try {
            $salesmanDto = new SalesmanDto(
                salesman_name: $request->salesman_name,
                salesman_city: $request->salesman_city,
                commission: $request->commission,
            );
            AddSalesmanService::handle($salesmanDto);

            return redirect()->back()->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan: ' . $th->getMessage());
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:salesmans,id',
            'salesman_name' => 'required',
            'salesman_city' => 'required',
            'commission' => 'required'
        ]);

        try {
            $salesmans = Salesmans::findOrFail($request->id);

            $salesmasDto = new SalesmanDto(
                id: $request->id,
                salesman_name: $request->salesman_name,
                salesman_city: $request->salesman_city,
                commission: $request->commission,
            );

            EditSalesmanService::handle($salesmasDto);
            return redirect()->back()->with('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data gagal diubah: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salesmans $salesmans)
    {
        try {
            $salesmans->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
