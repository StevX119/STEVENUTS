@extends('layouts.app')

@section('content')

<h3 class="text-center mb-4">🍽️ Daftar Menu</h3>

<div class="row">
  @foreach($menus as $menu)
  <div class="col-md-4 mb-4">
    <div class="card shadow-sm h-100">
      <img src="{{ asset('images/'.$menu->gambar) }}" 
           class="card-img-top" style="height:200px;object-fit:cover;">

      <div class="card-body">
        <h5>{{ $menu->nama }}</h5>
        <p class="text-danger fw-bold">
          Rp {{ number_format($menu->harga, 0, ',', '.') }}
        </p>
        <p>Stok: {{ $menu->stok }}</p>

        <form action="{{ route('checkout') }}" method="POST">
          @csrf
          <input type="hidden" name="menu_id" value="{{ $menu->id }}">
          <input type="number" name="jumlah" class="form-control mb-2" value="1" min="1" max="{{ $menu->stok }}">
          <button class="btn btn-primary w-100">Pesan</button>
        </form>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection
