<?php
<<<<<<< HEAD

=======
>>>>>>> e8e90ba809aa80a1614ea471ce2c637e99d7d51c
use App\Http\Controllers\OrderController;

// halaman admin
Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders');

// proses checkout
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

<<<<<<< HEAD
// halaman sukses
Route::get('/success', [OrderController::class, 'success'])->name('order.success');
=======
Route::get('/admin/orders', [OrderController::class, 'index']);
>>>>>>> e8e90ba809aa80a1614ea471ce2c637e99d7d51c
