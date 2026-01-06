<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
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
            'menu_id'        => 'required|exists:menus,id',
            'jumlah'         => 'required|integer|min:1',
        ]);

        $menu = Menu::findOrFail($request->menu_id);

        if ($menu->stok < $request->jumlah) {
            return back()->with('error', 'Stok tidak cukup!');
        }

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

        // kurangi stok
        $menu->stok -= $request->jumlah;
        $menu->save();

        return back()->with('success', 'Order berhasil!');
    }
}
