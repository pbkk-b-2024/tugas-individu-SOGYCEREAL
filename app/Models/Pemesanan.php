<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    // protected $table = 'pemesanan';
    // protected $primaryKey = 'id_pemesanan';
    // public $timestamps = true;

    protected $primaryKey = 'id_pemesanan';  // Nama primary key
    public $incrementing = false;           // Nonaktifkan auto-increment
    protected $keyType = 'string';          // Set primary key type ke string

    protected $table = 'pemesanan';

    protected $fillable = [
        'id_pemesanan',
        'tanggal_pemesanan',
        'total_harga',
        'status',
    ];

    public static function boot()
    {
        parent::boot();

        // Automatically generate ID with format 'TRX-xxx' before create
        static::creating(function ($model) {
            if (empty($model->id_pemesanan)) {
                $model->id_pemesanan = 'PEM-' . str_pad(
                    (string) random_int(1, 999), 
                    3, 
                    '0', 
                    STR_PAD_LEFT
                );
            }
        });
    }


    // Definisikan relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Definisikan relasi ke penjualan
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'id_pemesanan');
    }
}
