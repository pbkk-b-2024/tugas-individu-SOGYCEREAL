@extends('layout.home')

@section('title', 'Tambah Stok Produk')

@section('content')
    <h1 class="mb-4">Tambah Stok Produk</h1>

    <form action="{{ route('stok.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_produk">ID Produk</label>
            <input type="text" name="id_produk" class="form-control">
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
