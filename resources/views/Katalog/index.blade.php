@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold text-blue-800 mb-2">
    Katalog Hotel & Villa
</h1>

<p class="text-gray-600 mb-10">
    {{ $deskripsi }}
</p>

<!-- HOTEL -->
<div class="mb-12">

    <h2 class="text-2xl font-bold mb-5">
        Hotel Populer
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        @foreach($hotels as $p)

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

            <img src="https://source.unsplash.com/400x250/?hotel"
                 class="w-full h-52 object-cover">

            <div class="p-4">

                <h3 class="font-bold text-lg text-blue-700">
                    {{ $p->nama }}
                </h3>

                <p class="text-gray-500 text-sm mt-1">
                    Hotel Premium
                </p>

                <div class="flex justify-between items-center mt-4">

                    <span class="font-bold text-blue-600">
                        Rp {{ number_format($p->harga,0,',','.') }}
                    </span>

                    <a href="#"
                       class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm hover:bg-blue-700">
                        Booking
                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

<!-- VILLA -->
<div>

    <h2 class="text-2xl font-bold mb-5">
        Villa Populer
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        @foreach($villas as $p)

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

            <img src="https://source.unsplash.com/400x250/?villa"
                 class="w-full h-52 object-cover">

            <div class="p-4">

                <h3 class="font-bold text-lg text-blue-700">
                    {{ $p->nama }}
                </h3>

                <p class="text-gray-500 text-sm mt-1">
                    Villa Premium
                </p>

                <div class="flex justify-between items-center mt-4">

                    <span class="font-bold text-blue-600">
                        Rp {{ number_format($p->harga,0,',','.') }}
                    </span>

                    <a href="#"
                       class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm hover:bg-blue-700">
                        Booking
                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection