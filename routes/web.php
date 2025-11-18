<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

// Halaman utama menampilkan menu
Route::get('/', [MenuController::class, 'index'])->name('menu.index');

// Halaman checkout GET (isi nama pelanggan & tipe pesanan)
Route::get('/checkout', [OrderController::class, 'showCheckoutForm'])->name('checkout.form');

// Route POST untuk proses checkout
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
