@extends('layout.home')

@section('title', 'Daftar Retur')

@section('content')
    <h1 class="mb-4">Daftar Retur</h1>
    <a href="{{ route('retur.create') }}" class="btn btn-primary mb-3">Tambah Retur</a>

    <form action="{{ route('retur.index') }}" method="GET">
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
                <th>ID Retur</th>
                <th>ID Transaksi</th>
                <th>ID Produk</th>
                <th>Tanggal Retur</th>
                <th>Alasan Retur</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($returs as $item)
                <tr>
                    <td>{{ $item->id_retur }}</td>
                    <td>{{ $item->id_transaksi }}</td>
                    <td>{{ $item->id_produk }}</td>
                    <td>{{ $item->tanggal_retur }}</td>
                    <td>{{ $item->alasan_retur }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>
                        <a href="{{ route('retur.edit', $item->id_retur) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('retur.destroy', $item->id_retur) }}" method="POST" style="display:inline;">
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
        {{ $returs->links() }}
    </div>

@endsection
