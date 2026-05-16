<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FotoProduk;

class Produk extends Model
{
    protected $fillable = [
        'nama',
        'harga',
        'lokasi',
    ];

    public function fotos()
    {
        return $this->hasMany(FotoProduk::class);
    }
}