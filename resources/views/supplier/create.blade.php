@extends('layout.home')

@section('title', 'Tambah Supplier')

@section('content')
    <h1 class="mb-4">Tambah Supplier</h1>

    <form action="{{ route('supplier.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_supplier">Nama Supplier</label>
            <input type="text" name="nama_supplier" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
