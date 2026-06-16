<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'produk_id'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
