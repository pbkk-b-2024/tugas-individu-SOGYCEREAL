<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
 
    protected $primaryKey = 'id_produk';    // Primary key name
    public $incrementing = false;           // Disable auto-increment
    protected $keyType = 'string';          // Set primary key type to string

    protected $fillable = [
        'id_produk',
        'nama_produk',
        'deskripsi',
        'id_kategori',
        'harga_jual',
        'harga_beli',
        'stok_tersedia',
        'id_supplier',
    ];

    // Define relationship to kategori_produk
    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'id_kategori');
    }

    // Define relationship to supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    // Define relationship to stok
    public function stok()
    {
        return $this->hasMany(Stok::class, 'id_produk');
    }

    // Define relationship to pembelian
    public function pembelian()
    {
        return $this->belongsToMany(Pembelian::class, 'pembelian_produk')
                    ->withPivot('jumlah', 'harga');
    }

    // Define relationship to penjualan
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'id_produk');
    }

    public static function boot()
    {
        parent::boot();

        // Automatically generate ID with format 'PROD-xxx' before create
        static::creating(function ($model) {
            if (empty($model->id_produk)) {
                $model->id_produk = 'PROD-' . str_pad(
                    (string) random_int(1, 999), 
                    3, 
                    '0', 
                    STR_PAD_LEFT
                );
            }
        });
    }
}
