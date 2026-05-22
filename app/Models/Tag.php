<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Tag extends Model
{
    public function produks()
    {
        return $this->belongsToMany(Produk::class);
    }
}