@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Semua Hotel
</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

@foreach($hotels as $p)

<div class="bg-white rounded-3xl shadow-lg overflow-hidden">

    <div class="relative">

        <a href="{{ route('produk.show', $p->id) }}" class="block">
            <img src="{{ $p->foto_utama }}">
        </a>

        {{-- FAVORIT --}}
                    @auth
                        @if(auth()->user()->role !== 'admin')
                            <form action="{{ route('favorite.toggle', $p->id) }}"
                                method="POST"
                                class="absolute top-3 left-3 z-10">
                                @csrf

                                <button type="submit"
                                    class="group flex items-center gap-1
                                        {{ in_array($p->id, $favoriteIds ?? [])
                                            ? 'bg-pink-500 text-white border-pink-500'
                                            : 'bg-white/90 text-pink-500 border-pink-300' }}
                                        backdrop-blur hover:bg-pink-500 hover:text-white
                                        border px-3 py-1.5 rounded-full text-sm font-semibold
                                        shadow transition-all duration-200">

                                    <span class="group-hover:scale-110 transition-transform">❤️</span>

                                    {{ in_array($p->id, $favoriteIds ?? [])
                                        ? 'Tersimpan'
                                        : 'Favorit' }}
                                </button>
                            </form>
                        @endif
                    @endauth

        {{-- RATING --}}
        <div class="absolute top-3 right-3 bg-white px-3 py-1 rounded-full text-sm shadow">
            ⭐ 4.9
        </div>

    </div>

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
            Rp {{ number_format($p->harga,0,',','.') }}
        </p>

        <p class="text-xs text-gray-400">
            / malam
        </p>

    </div>

</div>

@endforeach

</div>

@endsection