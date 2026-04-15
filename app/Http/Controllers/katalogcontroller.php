<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index()
    {
        $deskripsi = "Selamat datang di katalog Hotel & Villa kami...";

        $produk = [
            ['id'=>1,'nama'=>'Hotel Star 5','harga'=>1999000],
            ['id'=>2,'nama'=>'Villa East Mountain','harga'=>750000],
            ['id'=>3,'nama'=>'Hotel Purnama','harga'=>500000],
            ['id'=>4,'nama'=>'Villa Pegunungan','harga'=>650000],
            ['id'=>5,'nama'=>'Hotel Family Room','harga'=>400000],
            ['id'=>6,'nama'=>'Villa low budget','harga'=>200000]
        ];

        return view('Katalog.index', compact('produk','deskripsi'));
    }

    public function show($id)
    {
        $produk = [
            1 => ['nama'=>'Hotel Star 5','harga'=>1999000],
            2 => ['nama'=>'Villa East Mountain','harga'=>750000],
            3 => ['nama'=>'Hotel Purnama','harga'=>500000],
            4 => ['nama'=>'Villa Pegunungan','harga'=>650000],
            5 => ['nama'=>'Hotel Family Room','harga'=>400000],
            6 => ['nama'=>'Villa Family Room','harga'=>200000]
        ];

        $data = $produk[$id];

        return view('Katalog.show', compact('data'));
    }
}