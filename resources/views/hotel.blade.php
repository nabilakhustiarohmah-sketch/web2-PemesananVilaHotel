@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Semua Hotel
</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

@foreach($hotels as $p)

<div class="bg-white rounded-3xl shadow-lg overflow-hidden">

    <a href="{{ route('produk.show', $p->id) }}" class="blok">
       <img src="{{ asset('images/'.$p->foto) }}">
    </a>

    <div class="p-4">

        <h3 class="font-bold text-lg">
            {{ $p->nama }}
        </h3>

        <p class="text-gray-500 text-sm mt-1">
            📍 {{ $p->lokasi }}
        </p>

        <div class="flex flex-wrap gap-2 mt-3">

            @foreach($p->tags as $tag)

                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">
                    #{{ $tag->nama }}
                </span>

            @endforeach

        </div>

        <p class="text-blue-600 font-bold text-lg mt-3">
            Rp {{ number_format($p->harga, 0, ',', '.') }}
        </p>

        <p class="text-xs text-gray-400">
            / malam
        </p>

    </div>

</div>

@endforeach

</div>

@endsection