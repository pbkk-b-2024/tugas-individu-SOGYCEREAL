@extends('layout.home')

@section('title', 'Daftar Stok Produk')

@section('content')
    <h1 class="mb-4">Daftar Stok Produk</h1>
    <a href="{{ route('stok.create') }}" class="btn btn-primary mb-3">Tambah Stok</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('stok.index') }}">
        <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Search stok...">
        <button type="submit">Search</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Stok</th>
                <th>ID Produk</th>
                <th>Jumlah</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stoks as $stok)
                <tr>
                    <td>{{ $stok->id_stok }}</td>
                    <td>{{ $stok->id_produk }}</td>
                    <td>{{ $stok->jumlah }}</td>
                    <td>
                        <a href="{{ route('stok.edit', $stok->id_stok) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('stok.destroy', $stok->id_stok) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-3">
        {{ $stoks->links() }}
    </div>
@endsection
