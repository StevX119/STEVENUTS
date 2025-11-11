@extends('layouts.app')
@section('content')
<div class="container my-5">
  <h3>Checkout</h3>
  <div class="card p-4 mb-3">
    <p><strong>Menu:</strong> {{ $menu->nama }}</p>
    <p><strong>Jumlah:</strong> {{ $jumlah }}</p>
    <p><strong>Subtotal:</strong> Rp {{ number_format($subtotal,0,',','.') }}</p>
  </div>
  <form action="{{ route('process') }}" method="POST">
    @csrf
    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
    <input type="hidden" name="jumlah" value="{{ $jumlah }}">
    <input type="hidden" name="subtotal" value="{{ $subtotal }}">
    <div class="mb-3">
      <label>Nama Pelanggan</label>
      <input type="text" name="nama_pelanggan" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Tipe Pesanan</label>
      <select name="tipe_pesanan" class="form-select">
        <option value="Dine In">Dine In</option>
        <option value="Take Away">Take Away</option>
      </select>
    </div>
    <button class="btn btn-success">Konfirmasi Pesanan</button>
  </form>
</div>
@endsection
