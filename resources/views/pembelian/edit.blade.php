@extends('layout.home')

@section('title', 'Edit Pembelian')

@section('content')
    <h1 class="mb-4">Edit Pembelian</h1>

    <form action="{{ route('pembelian.update', $pembelian->id_pembelian) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_supplier">ID Supplier</label>
            <select name="id_supplier" class="form-control" required>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id_supplier }}" {{ $pembelian->id_supplier == $supplier->id_supplier ? 'selected' : '' }}>
                        {{ $supplier->nama_supplier }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_pembelian">Tanggal Pembelian</label>
            <input type="date" name="tanggal_pembelian" class="form-control" value="{{ $pembelian->tanggal_pembelian }}" required>
        </div>
        <div class="form-group">
            <label for="total_harga">Total Harga</label>
            <input type="number" step="0.01" name="total_harga" class="form-control" value="{{ $pembelian->total_harga }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" class="form-control" value="{{ $pembelian->status }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
