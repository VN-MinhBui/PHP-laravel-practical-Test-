<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemSaleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ItemSaleController::class, 'index'])->name('items.index');
Route::get('/create', [ItemSaleController::class, 'create'])->name('items.create');
Route::post('/store', [ItemSaleController::class, 'store'])->name('items.store');
Route::get('/edit/{id}', [ItemSaleController::class, 'edit'])->name('items.edit');
Route::put('/update/{id}', [ItemSaleController::class, 'update'])->name('items.update');
Route::delete('/delete/{id}', [ItemSaleController::class, 'destroy'])->name('items.destroy');
