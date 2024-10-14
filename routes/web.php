<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesmanController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
})->name('dashboard');

// Route::prefix('/user-management')->group(function () {
//     Route::get('/', [UserManagementController::class, 'index'])->name('user-management.index');
//     Route::post('/', [UserManagementController::class, 'store'])->name('user-management.store');
//     Route::delete('/{user}', [UserManagementController::class, 'destroy'])->name('user-management.destroy');
//     Route::post('/add-day-membership', [UserManagementController::class, 'addDayMembership'])->name('user-management.add-day-membership');
// });


Route::prefix('/customer')->group(function (): void {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
    Route::post('/', [CustomerController::class, 'store'])->name('customer.store');
    Route::put('/', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');
});

Route::prefix('/salesman')->group(function (): void {
    Route::get('/', [SalesmanController::class, 'index'])->name('salesman.index');
    Route::post('/', [SalesmanController::class, 'store'])->name('salesman.store');
    Route::put('/', [SalesmanController::class, 'update'])->name('salesman.update');
    Route::delete('/{salesman}', [SalesmanController::class, 'destroy'])->name('salesman.destroy');
});

Route::prefix('/order')->group(function (): void {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/{order}', [OrderController::class, 'show'])->name('order.show');
    Route::post('/', [OrderController::class, 'store'])->name('order.store');
    Route::put('/', [OrderController::class, 'update'])->name('order.update');
    Route::delete('/{order}', [OrderController::class, 'destroy'])->name('order.destroy');
});
