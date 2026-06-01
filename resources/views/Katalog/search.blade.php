@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold text-blue-800 mb-2">
    Hasil Pencarian
</h1>

<p class="text-gray-600 mb-10">
    Hotel dan villa yang sesuai dengan pencarianmu
</p>

{{-- HOTEL --}}
<div class="mb-14">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Hotel
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        @forelse($hotels as $p)

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition">

            <div class="relative">
                <a href="{{ route('produk.show', $p->id) }}">
                    <img src="{{ asset('images/' . ($p->foto ?? 'default.jpg')) }}"
                         class="w-full h-58 object-cover">
                </a>

                <div class="absolute top-3 right-3 bg-white px-3 py-1 rounded-full text-sm font-semibold shadow">
                    🏨 Hotel
                </div>
            </div>

            <div class="p-5">

                <h3 class="text-lg font-bold">
                    {{ $p->nama }}
                </h3>

                <p class="text-gray-500 text-sm mt-2">
                    📍 {{ $p->lokasi }}
                </p>

                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach($p->tags as $tag)
                        <span class="bg-gray-200 text-xs px-2 py-1 rounded-full">
                            #{{ $tag->nama }}
                        </span>
                    @endforeach
                </div>

                <div class="mt-4 flex justify-between items-center">
                    <span class="text-blue-600 font-bold">
                        Rp {{ number_format($p->harga,0,',','.') }}
                    </span>
                </div>

            </div>

        </div>

        @empty
            <p class="text-gray-500">Tidak ada hotel ditemukan.</p>
        @endforelse

    </div>

</div>

{{-- VILLA --}}
<div>

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Villa
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        @forelse($villas as $p)

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition">

            <div class="relative">
                <a href="{{ route('produk.show', $p->id) }}">
                    <img src="{{ asset('images/' . ($p->foto ?? 'default.jpg')) }}"
                         class="w-full h-58 object-cover">
                </a>

                <div class="absolute top-3 right-3 bg-white px-3 py-1 rounded-full text-sm font-semibold shadow">
                    🏡 Villa
                </div>
            </div>

            <div class="p-5">

                <h3 class="text-lg font-bold">
                    {{ $p->nama }}
                </h3>

                <p class="text-gray-500 text-sm mt-2">
                    📍 {{ $p->lokasi }}
                </p>

                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach($p->tags as $tag)
                        <span class="bg-gray-200 text-xs px-2 py-1 rounded-full">
                            #{{ $tag->nama }}
                        </span>
                    @endforeach
                </div>

                <div class="mt-4 flex justify-between items-center">
                    <span class="text-blue-600 font-bold">
                        Rp {{ number_format($p->harga,0,',','.') }}
                    </span>
                </div>

            </div>

        </div>

        @empty
            <p class="text-gray-500">Tidak ada villa ditemukan.</p>
        @endforelse

    </div>

</div>

@endsection