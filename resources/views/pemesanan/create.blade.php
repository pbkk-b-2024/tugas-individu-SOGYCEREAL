@extends('layout.home')

@section('title', 'Tambah Pemesanan')

@section('content')
    <h1 class="mb-4">Tambah Pemesanan</h1>

    <form action="{{ route('pemesanan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
            <input type="date" name="tanggal_pemesanan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total_harga">Total Harga</label>
            <input type="number" step="0.01" name="total_harga" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
