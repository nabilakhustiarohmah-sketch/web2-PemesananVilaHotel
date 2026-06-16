<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FotoProduk;
use App\Models\Tag;

class Produk extends Model
{
    protected $fillable = [
        'nama',
        'kategori',
        'lokasi',
        'kapasitas',
        'harga',
        'fasilitas',
        'tipe_kamar',
        'foto_utama'
    ];

    public function fotos()
    {
        return $this->hasMany(FotoProduk::class, 'produk_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}