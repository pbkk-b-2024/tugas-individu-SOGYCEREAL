@extends('layout.home')

@section('title', 'Edit Produk')

@section('content')
    <h1 class="mb-4">Edit Produk</h1>

    <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $produk->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="id_kategori">ID Kategori</label>
            <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="{{ $produk->id_kategori }}" required>
        </div>
        <div class="form-group">
            <label for="harga_jual">Harga Jual</label>
            <input type="number" step="0.01" class="form-control" id="harga_jual" name="harga_jual" value="{{ $produk->harga_jual }}" required>
        </div>
        <div class="form-group">
            <label for="harga_beli">Harga Beli</label>
            <input type="number" step="0.01" class="form-control" id="harga_beli" name="harga_beli" value="{{ $produk->harga_beli }}" required>
        </div>
        <div class="form-group">
            <label for="stok_tersedia">Stok Tersedia</label>
            <input type="number" class="form-control" id="stok_tersedia" name="stok_tersedia" value="{{ $produk->stok_tersedia }}" required>
        </div>
        <div class="form-group">
            <label for="id_supplier">ID Supplier</label>
            <input type="text" class="form-control" id="id_supplier" name="id_supplier" value="{{ $produk->id_supplier }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
