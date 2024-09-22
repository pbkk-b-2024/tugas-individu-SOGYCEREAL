@extends('layout.home')

@section('title', 'Edit Pemesanan')

@section('content')
    <h1 class="mb-4">Edit Pemesanan</h1>

    <form action="{{ route('pemesanan.update', $pemesanan->id_pemesanan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_pemesanan">ID Pemesanan</label>
            <input type="text" name="id_pemesanan" class="form-control" value="{{ $pemesanan->id_pemesanan }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
            <input type="date" name="tanggal_pemesanan" class="form-control" value="{{ $pemesanan->tanggal_pemesanan }}" required>
        </div>
        <div class="form-group">
            <label for="total_harga">Total Harga</label>
            <input type="number" step="0.01" name="total_harga" class="form-control" value="{{ $pemesanan->total_harga }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" class="form-control" value="{{ $pemesanan->status }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
