@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold text-blue-800 mb-8">
    Semua Hotel & Villa
</h1>

{{-- HOTEL --}}
<h2 class="text-2xl font-bold text-gray-800 mb-6">
    Semua Hotel
</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4 mb-12">

    @forelse($hotels as $p)

    <div class="bg-white rounded-2xl shadow overflow-hidden hover:shadow-lg transition">

        <a href="{{ route('produk.show', $p->id) }}">
            <img src="{{ asset('images/' . ($p->foto ?? 'default.jpg')) }}"
                 alt="{{ $p->nama }}"
                 class="w-full h-44 object-cover">
        </a>

        <div class="p-4">

            <h3 class="font-bold text-gray-800">
                {{ $p->nama }}
            </h3>

            <p class="text-sm text-gray-500">
                📍 {{ $p->lokasi }}
            </p>

            <div class="flex flex-wrap gap-1 mt-2">

                @foreach($p->tags as $tag)
                    <span class="bg-gray-200 text-xs px-2 py-1 rounded-full">
                        #{{ $tag->nama }}
                    </span>
                @endforeach

            </div>

            <p class="text-blue-600 font-bold mt-3">
                Rp {{ number_format($p->harga,0,',','.') }}
            </p>

        </div>

    </div>

    @empty

    <p class="text-gray-500 italic">
        Belum ada hotel ditambahkan.
    </p>

    @endforelse

</div>

{{-- VILLA --}}
<h2 class="text-2xl font-bold text-gray-800 mb-6">
    Semua Villa
</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4">

    @forelse($villas as $p)

    <div class="bg-white rounded-2xl shadow overflow-hidden hover:shadow-lg transition">

        <a href="{{ route('produk.show', $p->id) }}">
            <img src="{{ asset('images/' . ($p->foto ?? 'default.jpg')) }}"
                 alt="{{ $p->nama }}"
                 class="w-full h-44 object-cover">
        </a>

        <div class="p-4">

            <h3 class="font-bold text-gray-800">
                {{ $p->nama }}
            </h3>

            <p class="text-sm text-gray-500">
                📍 {{ $p->lokasi }}
            </p>

            <div class="flex flex-wrap gap-1 mt-2">

                @foreach($p->tags as $tag)
                    <span class="bg-gray-200 text-xs px-2 py-1 rounded-full">
                        #{{ $tag->nama }}
                    </span>
                @endforeach

            </div>

            <p class="text-blue-600 font-bold mt-3">
                Rp {{ number_format($p->harga,0,',','.') }}
            </p>

        </div>

    </div>

    @empty

    <p class="text-gray-500 italic">
        Belum ada villa ditambahkan.
    </p>

    @endforelse

</div>

@endsection