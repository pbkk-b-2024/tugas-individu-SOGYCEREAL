<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiStok extends Model
{
    use HasFactory;

    protected $table = 'transaksi_stok';
    protected $primaryKey = 'id_transaksi';  // Nama primary key
    public $incrementing = false;            // Nonaktifkan auto-increment
    protected $keyType = 'string';           // Set primary key type ke string

    protected $fillable = [
        'id_transaksi',
        'id_produk',
        'id_stok',
        'tanggal_transaksi',
        'jumlah',
        'tipe_transaksi',
        'keterangan',
    ];

    public static function boot()
    {
        parent::boot();

        // Automatically generate ID with format 'TRX-xxx' before create
        static::creating(function ($model) {
            if (empty($model->id_transaksi)) {
                $model->id_transaksi = 'TRX-' . str_pad(
                    (string) random_int(1, 999), 
                    3, 
                    '0', 
                    STR_PAD_LEFT
                );
            }
        });
    }

    // Definisikan relasi ke stok
    public function stok()
    {
        return $this->belongsTo(Stok::class, 'id_stok');
    }

    // Definisikan relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
