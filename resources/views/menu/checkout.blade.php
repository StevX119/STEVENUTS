@extends('layouts.app')

@section('content')

<h3>Checkout</h3>

<div class="card p-3 mb-3">
  <p><strong>Menu:</strong> {{ $menu->nama }}</p>
  <p><strong>Jumlah:</strong> {{ $jumlah }}</p>
  <p><strong>Subtotal:</strong> Rp {{ number_format($subtotal,0,',','.') }}</p>
</div>

<form action="{{ route('process') }}" method="POST">
  @csrf
  <input type="hidden" name="menu_id" value="{{ $menu->id }}">
  <input type="hidden" name="jumlah" value="{{ $jumlah }}">

  <label>Nama Pelanggan</label>
  <input type="text" name="nama_pelanggan" class="form-control mb-2" required>

  <label>Jenis Pesanan</label>
  <select name="tipe_pesanan" class="form-select mb-3">
    <option value="Dine In">Dine In</option>
    <option value="Take Away">Take Away</option>
  </select>

  <button class="btn btn-success">Konfirmasi</button>
</form>

@endsection
