@extends('layout.home')

@section('title', 'Daftar Penjualan')

@section('content')
    <h1 class="mb-4">Daftar Penjualan</h1>
    <a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Tambah Penjualan</a>

    <form method="GET" action="{{ route('penjualan.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ request()->input('search') }}" class="form-control" placeholder="Search penjualan...">
            <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Search</button>
            </div>
        </div>
    </form>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($penjualans->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Penjualan</th>
                    <th>Produk</th>
                    <th>Pemesanan</th>
                    <th>Jumlah</th>
                    <th>Harga Jual</th>
                    <th>Diskon (%)</th>
                    <th>Total Harga</th>
                    <th>Tanggal Penjualan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualans as $penjualan)
                    <tr>
                        <td>{{ $penjualan->id_penjualan }}</td>
                        <td>
                            @if($penjualan->produk)
                                {{ $penjualan->produk->nama_produk ?? 'N/A' }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if($penjualan->pemesanan)
                                {{ $penjualan->pemesanan->id_pemesanan ?? 'N/A' }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $penjualan->jumlah }}</td>
                        <td>Rp {{ number_format($penjualan->harga_jual, 2, ',', '.') }}</td>
                        <td>{{ $penjualan->diskon ?? 0 }}</td>
                        <td>
                            @php
                                $totalHarga = $penjualan->harga_jual * $penjualan->jumlah;
                                if($penjualan->diskon){
                                    $totalHarga -= ($totalHarga * $penjualan->diskon) / 100;
                                }
                            @endphp
                            Rp {{ number_format($totalHarga, 2, ',', '.') }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($penjualan->tanggal_penjualan)->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('penjualan.edit', $penjualan->id_penjualan) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('penjualan.destroy', $penjualan->id_penjualan) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this penjualan?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            {{ $penjualans->appends(['search' => $search])->links() }}
        </div>
    @else
        <div class="alert alert-info">
            No penjualan records found.
        </div>
    @endif
@endsection
