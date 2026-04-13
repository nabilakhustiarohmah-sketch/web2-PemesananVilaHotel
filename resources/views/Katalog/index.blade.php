@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold text-blue-800 mb-2">
    Katalog Hotel & Villa
</h1>

<p class="text-gray-600 mb-6">
    {{ $deskripsi }}
</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    @foreach($produk as $p)
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

        <!-- Gambar dummy -->
        <img src="https://source.unsplash.com/400x250/?hotel" class="w-full h-48 object-cover">

        <div class="p-5">
            <h2 class="text-xl font-semibold text-blue-700">
                {{ $p['nama'] }}
            </h2>

            <p class="text-gray-500 mt-1">
                Rp {{ number_format($p['harga'],0,',','.') }} / malam
            </p>

            <a href="{{ route('katalog.show',$p['id']) }}"
               class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Lihat Detail
            </a>
        </div>

    </div>
    @endforeach

</div>

@endsection