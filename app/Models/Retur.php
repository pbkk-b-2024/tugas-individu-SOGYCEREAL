<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    use HasFactory;

    protected $table = 'retur';
    protected $primaryKey = 'id_retur';    // Nama primary key
    public $incrementing = false;           // Nonaktifkan auto-increment
    protected $keyType = 'string';          // Set primary key type ke string

    protected $fillable = [
        'id_retur',
        'id_transaksi',
        'id_produk',
        'tanggal_retur',
        'alasan_retur',
        'jumlah',
    ];

    // Definisikan relasi ke transaksi stok
    public function transaksiStok()
    {
        return $this->belongsTo(TransaksiStok::class, 'id_transaksi');
    }

    // Definisikan relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public static function boot()
    {
        parent::boot();

        // Automatically generate ID with format 'RET-xxx' before create
        static::creating(function ($model) {
            if (empty($model->id_retur)) {
                $model->id_retur = 'RET-' . str_pad(
                    (string) random_int(1, 999), 
                    3, 
                    '0', 
                    STR_PAD_LEFT
                );
            }
        });
    }
}
