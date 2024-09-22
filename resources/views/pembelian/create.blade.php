@extends('layout.home')

@section('title', 'Tambah Pembelian')

@section('content')
    <h1 class="mb-4">Tambah Pembelian</h1>

    <form action="{{ route('pembelian.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_supplier">ID Supplier</label>
            <select name="id_supplier" class="form-control" required>
                <option value="">Pilih Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id_supplier }}">{{ $supplier->nama_supplier }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_pembelian">Tanggal Pembelian</label>
            <input type="date" name="tanggal_pembelian" class="form-control" required>
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
