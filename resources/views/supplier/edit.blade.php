@extends('layout.home')

@section('title', 'Edit Supplier')

@section('content')
    <h1 class="mb-4">Edit Supplier</h1>

    <form action="{{ route('supplier.update', $supplier->id_supplier) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_supplier">Nama Supplier</label>
            <input type="text" name="nama_supplier" class="form-control" value="{{ $supplier->nama_supplier }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $supplier->alamat }}" required>
        </div>
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $supplier->telepon }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $supplier->email }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
