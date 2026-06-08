@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold text-blue-800 mb-2">
    Katalog Hotel & Villa
</h1>

<p class="text-gray-600 mb-10">
    Temukan hotel dan villa terbaik untuk liburanmu
</p>

{{-- HOTEL --}}
<div class="mb-14">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Hotel Populer
        </h2>

        <a href="{{ route('hotel.all') }}"
           class="text-blue-600 font-semibold">
            Lihat Semua
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        @forelse($hotels as $p)

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition">

            <div class="relative">
                <a href="{{ route('produk.show', $p->id) }}">
                    <img src="{{ asset('images/' . ($p->foto ?? 'default.jpg')) }}" 
                            alt="{{ $p->nama }}" 
                            class="w-full h-58 object-cover">
                </a>
                </a>

                <div class="absolute top-3 right-3 bg-white px-3 py-1 rounded-full text-sm font-semibold shadow">
                    ⭐ 4.9
                </div>
            </div>

            <div class="p-5">

                <h3 class="text-lg font-bold text-gray-800">
                    {{ $p->nama }}
                </h3>

                <p class="text-gray-500 text-sm mt-1">
                    Hotel Premium
                </p>

                <p class="text-gray-500 text-sm mt-3">
                    📍 {{ $p->lokasi }}
                </p>

                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach($p->tags as $tag)
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">
                            #{{ $tag->nama }}
                        </span>
                    @endforeach
                </div>

                <div class="mt-4 flex justify-between items-center">

                    <div>
                        <span class="text-blue-600 font-bold text-lg">
                            Rp {{ number_format($p->harga,0,',','.') }}
                        </span>

                        <p class="text-xs text-gray-400">
                            / malam
                        </p>
                    </div>

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <div class="mt-4 flex justify-end gap-2">
                            <a href="{{ route('produk.edit', $p->id) }}"
                                class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-xl text-sm font-medium transition">
                                Edit
                            </a>

                                <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus {{ $p->nama }}?')"
                                class="bg-gray-100 hover:bg-red-50 text-red-600 border border-red-200 px-4 py-2 rounded-xl text-sm font-medium transition">
                                Hapus
                                </button>
                            </div>
                        @endif
                    @endauth

                </div>

            </div>

        </div>

        @empty

        <p class="text-gray-500 italic">
            Belum ada hotel ditambahkan.
        </p>

        @endforelse

    </div>

</div>

{{-- VILLA --}}
<div>

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold text-gray-800">
            Villa Populer
        </h2>

        <a href="{{ route('villa.all') }}"
           class="text-blue-600 font-semibold">
            Lihat Semua
        </a>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        @forelse($villas as $p)

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition">

            <div class="relative">

                <a href="{{ route('produk.show', $p->id) }}">
                    <img src="{{ asset('images/' . ($p->foto ?? 'default.jpg')) }}" 
                    alt="{{ $p->nama }}" 
                    class="w-full h-58 object-cover">
                </a>

                <div class="absolute top-3 right-3 bg-white px-3 py-1 rounded-full text-sm font-semibold shadow">
                    ⭐ 4.9
                </div>

            </div>

            <div class="p-5">

                <h3 class="text-lg font-bold text-gray-800">
                    {{ $p->nama }}
                </h3>

                <p class="text-gray-500 text-sm mt-1">
                    Villa Premium
                </p>

                <p class="text-gray-500 text-sm mt-3">
                    📍 {{ $p->lokasi }}
                </p>

                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach($p->tags as $tag)
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">
                            #{{ $tag->nama }}
                        </span>
                    @endforeach
                </div>

                <div class="mt-4 flex justify-between items-center">

                    <div>
                        <span class="text-blue-600 font-bold text-lg">
                            Rp {{ number_format($p->harga,0,',','.') }}
                        </span>

                        <p class="text-xs text-gray-400">
                            / malam
                        </p>
                    </div>

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <div class="mt-4 flex justify-end gap-2">
                            <a href="{{ route('produk.edit', $p->id) }}"
                                class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-xl text-sm font-medium transition">
                                Edit
                            </a>

                                <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus {{ $p->nama }}?')"
                                class="bg-gray-100 hover:bg-red-50 text-red-600 border border-red-200 px-4 py-2 rounded-xl text-sm font-medium transition">
                                Hapus
                                </button>
                            </div>
                        @endif
                    @endauth

                </div>

            </div>

        </div>

        @empty

        <p class="text-gray-500 italic">
            Belum ada villa ditambahkan.
        </p>

        @endforelse

    </div>

</div>

@endsection

<style>
.btn-action{
    min-width: 80px;
    text-align: center;
    font-weight: 600;
    border-radius: 12px;
    padding: 8px 16px;
}
</style>