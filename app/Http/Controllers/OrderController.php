<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;

class OrderController extends Controller
{
<<<<<<< HEAD
    public function checkout(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
=======
    // halaman admin
    public function index()
    {
        $orders = Order::with('items.menu')->latest()->get();
        return view('admin.orders', compact('orders'));
    }

    // proses checkout
    public function checkout(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'tipe_pesanan'   => 'required',
>>>>>>> e8e90ba809aa80a1614ea471ce2c637e99d7d51c
            'menu_id'        => 'required|exists:menus,id',
            'jumlah'         => 'required|integer|min:1',
        ]);

        $menu = Menu::findOrFail($request->menu_id);

<<<<<<< HEAD
        // cek stok
=======
>>>>>>> e8e90ba809aa80a1614ea471ce2c637e99d7d51c
        if ($menu->stok < $request->jumlah) {
            return back()->with('error', 'Stok tidak cukup!');
        }

<<<<<<< HEAD
        // hitung total
        $total = $menu->harga * $request->jumlah;

        // simpan order
        Order::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'menu_id'        => $request->menu_id,
            'jumlah'         => $request->jumlah,
            'total'          => $total,
        ]);

=======
        $total = $menu->harga * $request->jumlah;

        $order = Order::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'tipe_pesanan'   => $request->tipe_pesanan,
            'total'          => $total
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'menu_id'  => $menu->id,
            'jumlah'   => $request->jumlah,
            'subtotal' => $total
        ]);

>>>>>>> e8e90ba809aa80a1614ea471ce2c637e99d7d51c
        // kurangi stok
        $menu->stok -= $request->jumlah;
        $menu->save();

<<<<<<< HEAD
        return back()->with('success', 'Pesanan berhasil disimpan!');
=======
        return back()->with('success', 'Order berhasil!');
>>>>>>> e8e90ba809aa80a1614ea471ce2c637e99d7d51c
    }
}
