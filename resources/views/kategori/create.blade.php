@extends('layout.home')

@section('title', 'Create Kategori')

@section('content')
    <h1 class="mb-4">Create Kategori</h1>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" required>
        </div>
        
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Store</button>
    </form>
@endsection