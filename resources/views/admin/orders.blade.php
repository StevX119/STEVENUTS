<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Penjual</title>
</head>
<body>

<h1>Dashboard Penjual</h1>

<table border="1" cellpadding="10">
<tr>
    <th>Nama</th>
    <th>Tipe</th>
    <th>Menu</th>
    <th>Jumlah</th>
    <th>Total</th>
    <th>Waktu</th>
</tr>

@foreach($orders as $order)
    @foreach($order->items as $item)
    <tr>
        <td>{{ $order->nama_pelanggan }}</td>
        <td>{{ $order->tipe_pesanan }}</td>
        <td>{{ $item->menu->nama_menu }}</td>
        <td>{{ $item->jumlah }}</td>
        <td>Rp {{ number_format($order->total) }}</td>
        <td>{{ $order->created_at }}</td>
    </tr>
    @endforeach
@endforeach

</table>

</body>
</html>
