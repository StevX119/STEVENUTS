<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Models\Menu;

Route::get('/', function () {
    $menus = Menu::all();
    return view('menu.index', compact('menus'));
});

Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
