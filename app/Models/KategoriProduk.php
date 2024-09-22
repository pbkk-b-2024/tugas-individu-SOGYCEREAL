<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    use HasFactory;

    protected $table = 'kategori_produk';
    protected $primaryKey = 'id_kategori';  // Nama primary key
    public $incrementing = false;           // Nonaktifkan auto-increment
    protected $keyType = 'string';          // Set primary key type ke string

    protected $fillable = [
        'id_kategori',
        'nama_kategori',
        'deskripsi',
    ];

    public static function boot()
    {
        parent::boot();

        // Automatically generate ID with format 'SUP-xxx' before create
        static::creating(function ($model) {
            if (empty($model->id_kategori)) {
                $model->id_kategori = 'KAT-' . str_pad(
                    (string) random_int(1, 999), 
                    3, 
                    '0', 
                    STR_PAD_LEFT
                );
            }
        });
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_kategori', 'id_kategori');
    }
}
