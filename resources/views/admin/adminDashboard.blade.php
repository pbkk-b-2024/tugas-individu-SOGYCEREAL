@extends('layout.home')

@section('title', 'Dashboard')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tugas 2</h5>
                            <p class="card-text"></p>
                            <a href="{{ route('stok.index') }}" class="card-link">Stok</a>
                            <p class="card-text"></p>
                            <a href="{{ route('produk.index') }}" class="card-link">Produk</a>
                            <p class="card-text"></p>
                            <a href="{{ route('kategori.index') }}" class="card-link">Kategori</a>
                            <p class="card-text"></p>
                            <a href="{{ route('supplier.index') }}" class="card-link">Supplier</a>
                            <p class="card-text"></p>
                            <a href="{{ route('pembelian.index') }}" class="card-link">Pembelian</a>
                            <p class="card-text"></p>
                            <a href="{{ route('transaksi-stok.index') }}" class="card-link">Transaksi Stok</a>
                            <p class="card-text"></p>
                            <a href="{{ route('retur.index') }}" class="card-link">Retur</a>
                            <p class="card-text"></p>
                            <a href="{{ route('pengiriman.index') }}" class="card-link">Pengiriman</a>
                            <p class="card-text"></p>
                            <a href="{{ route('pemesanan.index') }}" class="card-link">Pemesanan</a>
                            <p class="card-text"></p>
                            <a href="{{ route('penjualan.index') }}" class="card-link">Penjualan</a>
                            <p class="card-text"></p>
                            <a href="{{ route('userlist.index') }}" class="card-link">Pengguna</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
