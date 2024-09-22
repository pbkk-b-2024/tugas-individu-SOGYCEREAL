<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';  
    public $incrementing = false;           
    protected $keyType = 'string';         

    protected $fillable = [
        'id_supplier', 
        'nama_supplier', 
        'alamat', 
        'telepon', 
        'email'
    ];

    public static function boot()
    {
        parent::boot();

        // Automatically generate ID with format 'SUP-xxx' before create
        static::creating(function ($model) {
            if (empty($model->id_supplier)) {
                $model->id_supplier = 'SUP-' . str_pad(
                    (string) random_int(1, 999), 
                    3, 
                    '0', 
                    STR_PAD_LEFT
                );
            }
        });
    }
}
