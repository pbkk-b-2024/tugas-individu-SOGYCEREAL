<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    // protected $table = 'pembelian';
    // protected $primaryKey = 'id_pembelian';
    // public $timestamps = true;

    protected $table = 'pembelian';
    protected $primaryKey = 'id_pembelian';  // Nama primary key
    public $incrementing = false;           // Nonaktifkan auto-increment
    protected $keyType = 'string';          // Set primary key type ke string

    protected $fillable = [
        'id_supplier',
        'tanggal_pembelian',
        'total_harga',
        'status',
    ];



    // Definisikan relasi ke supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    // Definisikan relasi many-to-many ke produk
    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'pembelian_produk')
                    ->withPivot('jumlah', 'harga');
    }
}
