@extends('layout.home')

@section('title', 'Tambah Retur')

@section('content')
    <h1 class="mb-4">Tambah Retur</h1>

    <form action="{{ route('retur.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="id_transaksi">ID Transaksi</label>
            <input type="text" name="id_transaksi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_produk">ID Produk</label>
            <input type="text" name="id_produk" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal_retur">Tanggal Retur</label>
            <input type="date" name="tanggal_retur" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="alasan_retur">Alasan Retur</label>
            <textarea name="alasan_retur" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
