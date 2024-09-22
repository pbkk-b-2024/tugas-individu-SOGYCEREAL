<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'stok';
    protected $primaryKey = 'id_stok';    // Primary key name
    public $incrementing = false;           // Disable auto-increment
    protected $keyType = 'string';          // Set primary key type to string

    protected $fillable = [
        'id_produk',
        'jumlah',
    ];

    // Define relationship to produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    // Define relationship to transaksi_stok
    public function transaksi()
    {
        return $this->hasMany(TransaksiStok::class, 'id_stok');
    }

    public static function boot()
    {
        parent::boot();

        // Automatically generate ID with format 'STK-xxx' before create
        static::creating(function ($model) {
            if (empty($model->id_stok)) {
                $model->id_stok = 'STK-' . str_pad(
                    (string) random_int(1, 999), 
                    3, 
                    '0', 
                    STR_PAD_LEFT
                );
            }
        });
    }
}
