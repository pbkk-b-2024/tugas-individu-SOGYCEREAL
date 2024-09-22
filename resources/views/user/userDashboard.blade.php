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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
