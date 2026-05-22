<?php

namespace App\Models;
use App\Models\Tag;

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

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}