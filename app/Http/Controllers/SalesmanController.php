<?php

namespace App\Http\Controllers;

use App\Models\Salesmans;
use Illuminate\Http\Request;

class SalesmanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $datas = Salesmans::query();

        if ($request->has('search')) {
            $datas = $datas->where('salesman_name', 'like', '%' . $request->search . '%');
        }

        $datas = $datas->orderBy('id', 'desc')->paginate(5)->withQueryString();
        return view('admin.pages.salesman.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Salesmans $salesmans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salesmans $salesmans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salesmans $salesmans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salesmans $salesmans)
    {
        //
    }
}
