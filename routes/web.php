<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StokController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\TransaksiStokController;
use App\Http\Controllers\ReturController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PenjualanController;

Route::get('/', function(){
    return view('auth.login');
});



Route::resource('penjualan', PenjualanController::class)->names([
    'index' => 'penjualan.index',
    'create' => 'penjualan.create',
    'store' => 'penjualan.store',
    'show' => 'penjualan.show',
    'edit' => 'penjualan.edit',
    'update' => 'penjualan.update',
    'destroy' => 'penjualan.destroy',
]);


Route::resource('pengiriman', PengirimanController::class)->names([
    'index' => 'pengiriman.index',
    'create' => 'pengiriman.create',
    'store' => 'pengiriman.store',
    'show' => 'pengiriman.show',
    'edit' => 'pengiriman.edit',
    'update' => 'pengiriman.update',
    'destroy' => 'pengiriman.destroy',
]);


Route::resource('retur', ReturController::class)->names([
    'index' => 'retur.index',
    'create' => 'retur.create',
    'store' => 'retur.store',
    'show' => 'retur.show',
    'edit' => 'retur.edit',
    'update' => 'retur.update',
    'destroy' => 'retur.destroy',
]);



Route::resource('pemesanan', PemesananController::class)->names([
    'index' => 'pemesanan.index',
    'create' => 'pemesanan.create',
    'store' => 'pemesanan.store',
    'show' => 'pemesanan.show',
    'edit' => 'pemesanan.edit',
    'update' => 'pemesanan.update',
    'destroy' => 'pemesanan.destroy',
]);


Route::resource('transaksi-stok', TransaksiStokController::class)->names([
    'index' => 'transaksi-stok.index',
    'create' => 'transaksi-stok.create',
    'store' => 'transaksi-stok.store',
    'show' => 'transaksi-stok.show',
    'edit' => 'transaksi-stok.edit',
    'update' => 'transaksi-stok.update',
    'destroy' => 'transaksi-stok.destroy',
]);

Route::resource('pembelian', PembelianController::class)->names([
    'index' => 'pembelian.index',
    'create' => 'pembelian.create',
    'store' => 'pembelian.store',
    'show' => 'pembelian.show',
    'edit' => 'pembelian.edit',
    'update' => 'pembelian.update',
    'destroy' => 'pembelian.destroy',
]);

Route::resource('supplier', SupplierController::class)->names([
    'index' => 'supplier.index',
    'create' => 'supplier.create',
    'store' => 'supplier.store',
    'show' => 'supplier.show',
    'edit' => 'supplier.edit',
    'update' => 'supplier.update',
    'destroy' => 'supplier.destroy',
]);

Route::resource('kategori', KategoriController::class)->names([
    'index' => 'kategori.index',
    'create' => 'kategori.create',
    'store' => 'kategori.store',
    'show' => 'kategori.show',
    'edit' => 'kategori.edit',
    'update' => 'kategori.update',
    'destroy' => 'kategori.destroy',
]);

Route::resource('stok', StokController::class)->names([
    'index' => 'stok.index',
    'create' => 'stok.create',
    'store' => 'stok.store',
    'show' => 'stok.show',
    'edit' => 'stok.edit',
    'update' => 'stok.update',
    'destroy' => 'stok.destroy',
]);

Route::resource('produk', ProdukController::class)->names([
    'index' => 'produk.index',
    'create' => 'produk.create',
    'store' => 'produk.store',
    'show' => 'produk.show',
    'edit' => 'produk.edit',
    'update' => 'produk.update',
    'destroy' => 'produk.destroy',
]);
