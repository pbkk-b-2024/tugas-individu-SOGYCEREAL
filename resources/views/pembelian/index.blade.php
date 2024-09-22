@extends('layout.home')

@section('title', 'Daftar Pembelian')

@section('content')
<h1 class="mb-4">Daftar Pembelian</h1>
    <a href="{{ route('pembelian.create') }}" class="btn btn-primary mb-3">Tambah Pembelian</a>

    <form method="GET" action="{{ route('pembelian.index') }}">
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
                <th>ID Pembelian</th>
                <th>ID Supplier</th>
                <th>Tanggal Pembelian</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembelians as $item)
                <tr>
                    <td>{{ $item->id_pembelian }}</td>
                    <td>{{ $item->id_supplier }}</td>
                    <td>{{ $item->tanggal_pembelian }}</td>
                    <td>{{ $item->total_harga }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('pembelian.edit', $item->id_pembelian) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pembelian.destroy', $item->id_pembelian) }}" method="POST" style="display:inline;">
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
        {{ $pembelians->links() }}
    </div>
@endsection
