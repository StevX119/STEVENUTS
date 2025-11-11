@extends('layouts.app')
@section('content')
<div class="container my-5">
  <h3>📦 Daftar Pesanan</h3>
  <table class="table table-bordered">
    <thead>
      <tr><th>ID</th><th>Nama</th><th>Tipe</th><th>Total</th><th>Tanggal</th></tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->nama_pelanggan }}</td>
        <td>{{ $order->tipe_pesanan }}</td>
        <td>Rp {{ number_format($order->total,0,',','.') }}</td>
        <td>{{ $order->created_at }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
