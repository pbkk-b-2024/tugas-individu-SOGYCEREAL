<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    // protected $table = 'pengiriman';
    // protected $primaryKey = 'id_pengiriman';
    // public $timestamps = true;

    protected $primaryKey = 'id_pengiriman';  // Nama primary key
    public $incrementing = false;           // Nonaktifkan auto-increment
    protected $keyType = 'string';          // Set primary key type ke string

    protected $table = 'pengiriman';

    protected $fillable = [
        'id_pemesanan',
        'tanggal_pengiriman',
        'kurir',
        'biaya_pengiriman',
        'status_pengiriman',
    ];

    public static function boot()
    {
        parent::boot();

        // Automatically generate ID with format 'TRX-xxx' before create
        static::creating(function ($model) {
            if (empty($model->id_pengiriman)) {
                $model->id_pengiriman = 'SND-' . str_pad(
                    (string) random_int(1, 999), 
                    3, 
                    '0', 
                    STR_PAD_LEFT
                );
            }
        });
    }


    // Definisikan relasi ke pemesanan
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }

    // Definisikan relasi ke penjualan
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'id_penjualan');
    }
}
