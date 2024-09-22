@extends('layout.home')

@section('title', 'Tambah Pengiriman')

@section('content')
    <h1 class="mb-4">Tambah Pengiriman</h1>

    <form action="{{ route('pengiriman.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_pemesanan">ID Pemesanan</label>
            <input type="text" name="id_pemesanan" id="id_pemesanan" class="form-control" value="{{ old('id_pemesanan') }}" required>
            @error('id_pemesanan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
            <input type="date" name="tanggal_pengiriman" id="tanggal_pengiriman" class="form-control" value="{{ old('tanggal_pengiriman') }}" required>
            @error('tanggal_pengiriman')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kurir">Kurir</label>
            <input type="text" name="kurir" id="kurir" class="form-control" value="{{ old('kurir') }}" required>
            @error('kurir')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status_pengiriman">Status Pengiriman</label>
            <input type="text" name="status_pengiriman" id="status_pengiriman" class="form-control" value="{{ old('status_pengiriman') }}" required>
            @error('status_pengiriman')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
