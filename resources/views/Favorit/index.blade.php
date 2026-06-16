@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-lg p-6">

        <!-- Header -->
        <h1 class="text-2xl font-bold mb-6 flex items-center gap-2">
            ❤️ Produk Favorit Saya
        </h1>

        @if($favorites->isEmpty())
            <div class="text-center py-10 text-gray-500">
                Belum ada produk favorit 😢
            </div>
        @else

        <!-- List -->
        <div class="space-y-4">

            @foreach($favorites as $item)

                @if($item->produk)

                <div class="flex items-center gap-4 p-4 border rounded-xl bg-white hover:shadow transition">

                    <!-- Gambar -->
                    <img src="{{ asset('images/' . ($item->produk->foto_utama ?? $item->produk->foto ?? 'default.jpg')) }}"
                        alt="{{ $item->produk->nama_produk }}"
                        class="w-24 h-24 object-cover rounded-lg">

                    <!-- Info -->
                    <div class="flex-1">

                        <h3 class="font-semibold text-lg">
                            {{ $item->produk->nama_produk }}
                        </h3>

                        <p class="text-sm text-gray-500">
                            {{ $item->produk->kategori }}
                        </p>

                        <!-- Lokasi -->
                        <p class="text-sm text-gray-600 mt-1">
                            📍 {{ $item->produk->lokasi ?? '-' }}
                        </p>

                        <!-- Harga -->
                        @if(isset($item->produk->harga))
                        <p class="text-sm font-semibold text-blue-600 mt-1">
                            Rp {{ number_format($item->produk->harga,0,',','.') }}
                        </p>
                        @endif

                        <!-- Tags -->
                        @if($item->produk->tags->count())
                        <div class="flex flex-wrap gap-1 mt-2">
                            @foreach($item->produk->tags->take(2) as $tag)
                                <span class="bg-blue-50 text-blue-600 text-[10px] px-2 py-1 rounded-full">
                                    #{{ $tag->nama }}
                                </span>
                            @endforeach
                        </div>
                        @endif

                    </div>

                    <!-- Aksi -->
                    <div class="flex flex-col gap-2">

                        <!-- Detail -->
                        <a href="{{ route('produk.show', $item->produk->id) }}"
                           class="px-3 py-2 bg-blue-500 text-white rounded-lg text-sm hover:bg-blue-600 text-center">
                            Detail
                        </a>

                        <!-- Hapus -->
                        <form action="{{ route('favorite.toggle', $item->produk->id) }}" method="POST">
                            @csrf
                            <button class="px-3 py-2 bg-red-500 text-white rounded-lg text-sm hover:bg-red-600 w-full">
                                Hapus
                            </button>
                        </form>

                    </div>

                </div>

                @endif

            @endforeach

        </div>

        @endif

    </div>
</div>
@endsection