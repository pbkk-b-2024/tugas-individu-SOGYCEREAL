@extends('layout.home')

@section('title', 'Daftar Supplier')

@section('content')
    <h1 class="mb-4">Daftar Supplier</h1>
    <a href="{{ route('supplier.create') }}" class="btn btn-primary mb-3">Tambah Supplier</a>

    <form method="GET" action="{{ route('supplier.index') }}">
        <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Search suppliers...">
        <button type="submit">Search</button>
    </form>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $item)
                <tr>
                    <td>{{ $item->id_supplier }}</td>
                    <td>{{ $item->nama_supplier }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ route('supplier.edit', $item->id_supplier) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('supplier.destroy', $item->id_supplier) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $suppliers->links() }}
    </div>
@endsection
