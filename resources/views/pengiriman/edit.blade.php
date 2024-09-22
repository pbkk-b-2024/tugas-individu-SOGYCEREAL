@extends('layout.home')

@section('title', 'Edit Pengiriman')

@section('content')
    <h1 class="mb-4">Edit Pengiriman</h1>

    <form action="{{ route('pengiriman.update', $pengiriman->id_pengiriman) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_pengiriman">ID Pengiriman</label>
            <input type="text" name="id_pengiriman" id="id_pengiriman" class="form-control" value="{{ $pengiriman->id_pengiriman }}" disabled>
        </div>
        <div class="form-group">
            <label for="id_pemesanan">ID Pemesanan</label>
            <input type="text" name="id_pemesanan" id="id_pemesanan" class="form-control" value="{{ $pengiriman->id_pemesanan }}" required>
            @error('id_pemesanan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
            <input type="date" name="tanggal_pengiriman" id="tanggal_pengiriman" class="form-control" value="{{ $pengiriman->tanggal_pengiriman }}" required>
            @error('tanggal_pengiriman')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kurir">Kurir</label>
            <input type="text" name="kurir" id="kurir" class="form-control" value="{{ $pengiriman->kurir }}" required>
            @error('kurir')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="biaya_pengiriman">Biaya Pengiriman</label>
            <input type="number" step="0.01" name="biaya_pengiriman" id="biaya_pengiriman" class="form-control" value="{{ $pengiriman->biaya_pengiriman }}" required>
            @error('biaya_pengiriman')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status_pengiriman">Status Pengiriman</label>
            <input type="text" name="status_pengiriman" id="status_pengiriman" class="form-control" value="{{ $pengiriman->status_pengiriman }}" required>
            @error('status_pengiriman')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
