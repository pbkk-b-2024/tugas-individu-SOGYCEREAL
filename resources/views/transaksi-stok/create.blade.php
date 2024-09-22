@extends('layout.home')

@section('title', 'Tambah Transaksi Stok')

@section('content')
    <h1 class="mb-4">Tambah Transaksi Stok</h1>

    <form action="{{ route('transaksi-stok.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_produk">ID Produk</label>
            <input type="text" name="id_produk" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_stok">ID Stok</label>
            <input type="text" name="id_stok" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal_transaksi">Tanggal Transaksi</label>
            <input type="date" name="tanggal_transaksi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tipe_transaksi">Tipe Transaksi</label>
            <input type="text" name="tipe_transaksi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
