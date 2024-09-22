@extends('layout.home')

@section('title', 'Edit Transaksi Stok')

@section('content')
    <h1 class="mb-4">Edit Transaksi Stok</h1>

    <form action="{{ route('transaksi-stok.update', $transaksiStok->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- ID Transaksi (Readonly, but generally should not be updated) -->
        <div class="form-group">
            <label for="id_transaksi">ID Transaksi</label>
            <input type="text" name="id_transaksi" class="form-control" value="{{ $transaksiStok->id_transaksi }}" readonly>
        </div>

        <!-- ID Produk -->
        <div class="form-group">
            <label for="id_produk">ID Produk</label>
            <input type="text" name="id_produk" class="form-control" value="{{ $transaksiStok->id_produk }}" required>
        </div>

        <!-- ID Stok -->
        <div class="form-group">
            <label for="id_stok">ID Stok</label>
            <input type="text" name="id_stok" class="form-control" value="{{ $transaksiStok->id_stok }}" required>
        </div>

        <!-- Tanggal Transaksi -->
        <div class="form-group">
            <label for="tanggal_transaksi">Tanggal Transaksi</label>
            <input type="date" name="tanggal_transaksi" class="form-control" value="{{ $transaksiStok->tanggal_transaksi->format('Y-m-d') }}" required>
        </div>

        <!-- Jumlah -->
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $transaksiStok->jumlah }}" required>
        </div>

        <!-- Tipe Transaksi -->
        <div class="form-group">
            <label for="tipe_transaksi">Tipe Transaksi</label>
            <input type="text" name="tipe_transaksi" class="form-control" value="{{ $transaksiStok->tipe_transaksi }}" required>
        </div>

        <!-- Keterangan -->
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $transaksiStok->keterangan }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
