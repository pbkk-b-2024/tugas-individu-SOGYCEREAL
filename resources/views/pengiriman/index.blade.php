@extends('layout.home')

@section('title', 'Daftar Pengiriman')

@section('content')
    <h1 class="mb-4">Daftar Pengiriman</h1>
    <a href="{{ route('pengiriman.create') }}" class="btn btn-primary mb-3">Tambah Pengiriman</a>

    <form method="GET" action="{{ route('pengiriman.index') }}">
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
                <th>ID Pengiriman</th>
                <th>ID Pemesanan</th>
                <th>Tanggal Pengiriman</th>
                <th>Kurir</th>
                <th>Alamat Pengiriman</th>
                <th>Status Pengiriman</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengirimans as $pengiriman)
                <tr>
                    <td>{{ $pengiriman->id_pengiriman }}</td>
                    <td>{{ $pengiriman->id_pemesanan }}</td>
                    <td>{{ $pengiriman->tanggal_pengiriman }}</td>
                    <td>{{ $pengiriman->kurir }}</td>
                    <td>{{ $pengiriman->alamat_pengiriman }}</td>
                    <td>{{ $pengiriman->status_pengiriman }}</td>
                    <td>
                        <a href="{{ route('pengiriman.edit', $pengiriman->id_pengiriman) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pengiriman.destroy', $pengiriman->id_pengiriman) }}" method="POST" style="display:inline;">
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
        {{ $pengirimans->links() }}
    </div>
@endsection
