<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    \App\Models\Produk::create([
        'nama' => 'Hotel Star 5',
        'harga' => 1999000,
        'foto' => 'Hotelstar5.jpg'
    ]);

    \App\Models\Produk::create([
        'nama' => 'Villa East Mountain',
        'harga' => 750000,
        'foto' => 'Villaeastmountain.jpg'
    ]);
    
    // Tambahkan hotel lainnya di sini...
}
}
