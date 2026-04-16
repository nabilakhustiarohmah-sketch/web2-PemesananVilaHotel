@extends('layouts.app')

@section('content')

<div class="p-6">
    <h2 class="text-3xl font-bold text-blue-800 mb-2">
        Katalog Hotel & Villa
    </h2>
    <p class="text-gray-600 mb-6">
        Selamat datang di katalog Hotel & Villa kami...
    </p>

    @php
        $produks = [
            [
                'nama' => 'Hotel Star 5',
                'harga' => 1999000,
                'gambar' => 'Hotelstar5.jpg'
            ],
            [
                'nama' => 'Villa East Mountain',
                'harga' => 750000,
                'gambar' => 'Villaeastmountain.jpg'
            ],
            [
                'nama' => 'Hotel Purnama',
                'harga' => 500000,
                'gambar' => 'Hotelpurnama.jpg'
            ],
            [
                'nama' => 'Hotel Family Room',
                'harga' => 600000,
                'gambar' => 'Hotelfamilyroom.jpg'
            ],
            [
                'nama' => 'Villa Low Budget',
                'harga' => 300000,
                'gambar' => 'Villalowbudget.jpg'
            ],
            [
                'nama' => 'Villa Pegunungan',
                'harga' => 850000,
                'gambar' => 'Villapegunungan.jpg'
            ],
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        @foreach($produks as $produk)
        <div class="bg-white rounded-2xl shadow overflow-hidden">

            {{-- GAMBAR --}}
            <img src="{{ asset('images/'.$produk['gambar']) }}" 
                 class="w-full h-48 object-cover">

            <div class="p-4">
                <h3 class="text-lg font-bold text-blue-700">
                    {{ $produk['nama'] }}
                </h3>

                <p class="text-gray-600">
                    Rp {{ number_format($produk['harga'],0,',','.') }} / malam
                </p>

                <a href="#"
                   class="inline-block mt-3 bg-blue-600 text-white px-4 py-2 rounded-lg">
                   Lihat Detail
                </a>
            </div>

        </div>
        @endforeach

    </div>
</div>

@endsection