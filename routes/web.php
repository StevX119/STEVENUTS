<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

Route::get('/', [MenuController::class, 'index'])->name('menu.index');

Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/process', [OrderController::class, 'process'])->name('process');
Route::get('/success', [OrderController::class, 'success'])->name('success');

Route::get('/admin/orders', [AdminController::class, 'index'])->name('admin.orders');
