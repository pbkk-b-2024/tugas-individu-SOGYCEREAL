@extends('layout.home')

@section('title', 'Edit Retur')

@section('content')
    <h1 class="mb-4">Edit Retur</h1>

    <form action="{{ route('retur.update', $retur->id_retur) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_retur">ID Retur</label>
            <input type="text" name="id_retur" class="form-control" value="{{ $retur->id_retur }}" required>
        </div>
        <div class="form-group">
            <label for="id_transaksi">ID Transaksi</label>
            <input type="text" name="id_transaksi" class="form-control" value="{{ $retur->id_transaksi }}" required>
        </div>
        <div class="form-group">
            <label for="id_produk">ID Produk</label>
            <input type="text" name="id_produk" class="form-control" value="{{ $retur->id_produk }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_retur">Tanggal Retur</label>
            <input type="date" name="tanggal_retur" class="form-control" value="{{ $retur->tanggal_retur }}" required>
        </div>
        <div class="form-group">
            <label for="alasan_retur">Alasan Retur</label>
            <textarea name="alasan_retur" class="form-control" required>{{ $retur->alasan_retur }}</textarea>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $retur->jumlah }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
