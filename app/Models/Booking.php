<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'produk_id',
        'nama',
        'email',
        'telepon',
        'check_in',
        'check_out',
        'jumlah_tamu',
        'metode_pembayaran',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}