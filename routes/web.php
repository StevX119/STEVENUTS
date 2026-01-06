<?php

use App\Http\Controllers\OrderController;

// halaman admin
Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders');

// proses checkout
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

// halaman sukses
Route::get('/success', [OrderController::class, 'success'])->name('order.success');
