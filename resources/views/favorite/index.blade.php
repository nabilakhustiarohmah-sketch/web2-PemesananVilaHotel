@extends('layouts.app')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-blue-800 mb-2">❤️ Favorit Saya</h1>
    <p class="text-gray-500">Hotel & villa yang kamu simpan</p>
</div>

@if($favorites->isEmpty())
    <div class="flex flex-col items-center justify-center py-24 text-center">
        <div class="text-6xl mb-4">💔</div>
        <h2 class="text-xl font-semibold text-gray-700 mb-2">Belum ada favorit</h2>
        <p class="text-gray-400 mb-6">Klik tombol ❤️ pada hotel atau villa untuk menyimpannya di sini.</p>
        <a href="{{ route('produk.index') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-semibold transition">
            Jelajahi Katalog
        </a>
    </div>

@else

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($favorites as $p)
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition group">

            <div class="relative">
                <a href="{{ route('produk.show', $p->id) }}">
                    <img src="{{ $p->foto_utama }}"class="w-full h-full object-cover">
                </a>

                <div class="absolute top-3 left-3 bg-white/90 px-3 py-1 rounded-full text-sm font-semibold shadow">
                    ⭐ 4.9
                </div>

                <form action="{{ route('favorite.toggle', $p->id) }}" method="POST"
                      class="absolute top-3 right-3">
                    @csrf
                    <button type="submit"
                        title="Hapus dari favorit"
                        class="bg-pink-500 hover:bg-red-600 text-white w-9 h-9 rounded-full
                               flex items-center justify-center shadow-lg transition-all hover:scale-110">
                        ❤️
                    </button>
                </form>
            </div>

            <div class="p-5">
                <h3 class="text-lg font-bold text-gray-800">{{ $p->nama }}</h3>
                <p class="text-gray-500 text-sm mt-3">📍 {{ $p->lokasi }}</p>

                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach($p->tags as $tag)
                        <span class="bg-blue-50 text-blue-600 text-xs px-2 py-1 rounded-full font-medium">
                            #{{ $tag->nama }}
                        </span>
                    @endforeach
                </div>

                <div class="mt-4 flex justify-between items-center">
                    <div>
                        <span class="text-blue-600 font-bold text-lg">
                            Rp {{ number_format($p->harga, 0, ',', '.') }}
                        </span>
                        <p class="text-xs text-gray-400">/ malam</p>
                    </div>
                    <a href="{{ route('produk.show', $p->id) }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-xl font-semibold transition">
                        Lihat
                    </a>
                </div>
            </div>

        </div>
        @endforeach
    </div>

@endif

@endsection