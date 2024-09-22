@extends('layout.home')

@section('title', 'Tambah Penjualan')

@section('content')
    <h1 class="mb-4">Tambah Penjualan</h1>

    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_produk">Produk</label>
            <select name="id_produk" id="id_produk" class="form-control" required>
                <option value="">-- Select Produk --</option>
                @foreach($produks as $produk)
                    <option value="{{ $produk->id_produk }}" {{ old('id_produk') == $produk->id_produk ? 'selected' : '' }}>
                        {{ $produk->nama_produk }}
                    </option>
                @endforeach
            </select>
            @error('id_produk')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_pemesanan">Pemesanan</label>
            <select name="id_pemesanan" id="id_pemesanan" class="form-control" required>
                <option value="">-- Select Pemesanan --</option>
                @foreach($pemesanans as $pemesanan)
                    <option value="{{ $pemesanan->id_pemesanan }}" {{ old('id_pemesanan') == $pemesanan->id_pemesanan ? 'selected' : '' }}>
                        {{ $pemesanan->id_pemesanan }} - {{ $pemesanan->alamat_pengiriman }}
                    </option>
                @endforeach
            </select>
            @error('id_pemesanan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah') }}" min="1" required>
            @error('jumlah')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="harga_jual">Harga Jual (Rp)</label>
            <input type="number" name="harga_jual" id="harga_jual" class="form-control" value="{{ old('harga_jual') }}" step="0.01" min="0" required>
            @error('harga_jual')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="diskon">Diskon (%)</label>
            <input type="number" name="diskon" id="diskon" class="form-control" value="{{ old('diskon') }}" step="0.01" min="0" max="100">
            @error('diskon')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tanggal_penjualan">Tanggal Penjualan</label>
            <input type="date" name="tanggal_penjualan" id="tanggal_penjualan" class="form-control" value="{{ old('tanggal_penjualan') }}" required>
            @error('tanggal_penjualan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- End of Optional Field -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
