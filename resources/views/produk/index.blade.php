@extends('layout.home')

@section('title', 'Daftar Produk')

@section('content')
    <h1 class="mb-4">Daftar Produk</h1>
    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

    <form action="{{ route('produk.index') }}" method="GET">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search...">
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
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok Tersedia</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $produk)
                <tr>
                    <td>{{ $produk->id_produk }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->deskripsi }}</td>
                    <td>{{ $produk->harga_jual }}</td>
                    <td>{{ $produk->harga_beli }}</td>
                    <td>{{ $produk->stok_tersedia }}</td>
                    <td>
                        <a href="{{ route('produk.edit', $produk->id_produk) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('produk.destroy', $produk->id_produk) }}" method="POST" style="display:inline;">
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
        {{ $produks->links() }}
    </div>
@endsection