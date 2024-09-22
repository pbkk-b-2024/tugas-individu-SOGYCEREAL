@extends('layout.home')

@section('title', 'Daftar Transaksi Stok')

@section('content')
    <h1 class="mb-4">Daftar Transaksi Stok</h1>
    <a href="{{ route('transaksi-stok.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

    
    <form method="GET" action="{{ route('transaksi-stok.index') }}">
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
                <th>ID Transaksi</th>
                <th>ID Produk</th>
                <th>ID Stok</th>
                <th>Tanggal Transaksi</th>
                <th>Jumlah</th>
                <th>Tipe Transaksi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksiStoks as $item)
                <tr>
                    <td>{{ $item->id_transaksi }}</td>
                    <td>{{ $item->id_produk }}</td>
                    <td>{{ $item->id_stok }}</td>
                    <td>{{ $item->tanggal_transaksi }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->tipe_transaksi }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{ route('transaksi-stok.edit', $item->id_transaksi) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('transaksi-stok.destroy', $item->id_transaksi) }}" method="POST" style="display:inline;">
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
        {{ $transaksiStoks->links() }}
    </div>
@endsection
