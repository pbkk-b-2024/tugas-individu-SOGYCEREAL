<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_penjualan'; // Primary key
    public $incrementing = false;           // Non-incrementing since it's a string
    protected $keyType = 'string';          // Primary key type

    protected $table = 'penjualan';

    protected $fillable = [
        'id_penjualan',
        'id_produk',
        'id_pemesanan',
        'jumlah',
        'harga_jual',
        'diskon',
        'tanggal_penjualan',
    ];

    /**
     * Define relationship to Produk.
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    /**
     * Define relationship to Pemesanan.
     */
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }
    public static function boot()
    {
        parent::boot();

        // Automatically generate ID with format 'SUP-xxx' before create
        static::creating(function ($model) {
            if (empty($model->id_penjualan)) {
                $model->id_penjualan = 'JUAL-' . str_pad(
                    (string) random_int(1, 999), 
                    3, 
                    '0', 
                    STR_PAD_LEFT
                );
            }
        });
    }
}
