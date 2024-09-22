@extends('layout.home')

@section('title', 'Edit Stok Produk')

@section('content')
    <h1 class="mb-4">Edit Stok Produk</h1>

    <form action="{{ route('stok.update', $stok->id_stok) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_produk">ID Produk</label>
            <input type="text" name="id_produk" class="form-control" value="{{ $stok->id_produk }}" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $stok->jumlah }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
