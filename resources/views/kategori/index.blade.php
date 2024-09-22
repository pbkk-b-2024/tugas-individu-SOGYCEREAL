@extends('layout.home')

@section('title', 'Daftar Kategori')

@section('content')
    <h1 class="mb-4">Daftar Kategori</h1>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

    <form action="{{ route('kategori.index') }}" method="GET">
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
                <th>ID Kategori</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $item)
                <tr>
                    <td>{{ $item->id_kategori }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $item->id_kategori) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kategori.destroy', $item->id_kategori) }}" method="POST" style="display:inline;">
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
        {{ $kategoris->links() }}
    </div>
@endsection