<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesmanController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.pages.dashboard')->with('success', 'Testing success');
})->name('dashboard');

Route::prefix('/customer')->group(function (): void {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
    Route::post('/', [CustomerController::class, 'store'])->name('customer.store');
    Route::put('/', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');
});
