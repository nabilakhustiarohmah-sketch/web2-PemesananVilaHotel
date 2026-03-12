<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class katalogcontroller extends Controller
{
    public function index()
    {
        $deskripsi = "Selamat datang di katalog Hotel & Villa kami. Pada halaman ini Anda dapat menemukan berbagai pilihan penginapan yang nyaman, mulai dari hotel berbintang hingga villa dengan pemandangan indah. Setiap penginapan menawarkan fasilitas dan harga yang berbeda sesuai kebutuhan Anda. Pilih penginapan yang diinginkan dan lihat detailnya untuk mendapatkan informasi lebih lengkap sebelum melakukan pemesanan.";
        $produk = [
            ['id'=>1,'nama'=>'Hotel Bintang 5','harga'=>500000],
            ['id'=>2,'nama'=>'Villa Pantai','harga'=>750000],
            ['id'=>3,'nama'=>'Hotel Budget','harga'=>200000],
            ['id'=>4,'nama'=>'Villa Pegunungan','harga'=>650000],
            ['id'=>5,'nama'=>'Hotel Family Room','harga'=>400000]
        ];

        return view('katalog.index', compact('produk','deskripsi'));
    }

    public function show($id)
    {
        $produk = [
            1 => ['nama'=>'Hotel Bintang 5','harga'=>500000],
            2 => ['nama'=>'Villa Pantai','harga'=>750000],
            3 => ['nama'=>'Hotel Budget','harga'=>200000],
            4 => ['nama'=>'Villa Pegunungan','harga'=>650000],
            5 => ['nama'=>'Hotel Family Room','harga'=>400000]
        ];

        $data = $produk[$id];

        return view('katalog.show', compact('data'));
    }
}
?>