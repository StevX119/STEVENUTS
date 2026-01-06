<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'menu_id'        => 'required|exists:menus,id',
            'jumlah'         => 'required|integer|min:1',
        ]);

        $menu = Menu::findOrFail($request->menu_id);

        // cek stok
        if ($menu->stok < $request->jumlah) {
            return back()->with('error', 'Stok tidak cukup!');
        }

        // hitung total
        $total = $menu->harga * $request->jumlah;

        // simpan order
        Order::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'menu_id'        => $request->menu_id,
            'jumlah'         => $request->jumlah,
            'total'          => $total,
        ]);

        // kurangi stok
        $menu->stok -= $request->jumlah;
        $menu->save();

        return back()->with('success', 'Pesanan berhasil disimpan!');
    }
}
