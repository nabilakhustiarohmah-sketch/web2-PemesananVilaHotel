@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold text-blue-800 mb-2">
    Katalog Hotel & Villa
</h1>

<p class="text-gray-600 mb-10">
    Temukan hotel dan villa terbaik untuk liburanmu
</p>

<!-- HOTEL -->
<div class="mb-14">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold text-gray-800">
            Hotel Populer
        </h2>

        <a href="{{ route('villa.all') }}" 
        class="text-blue-600 font-semibold">
            Lihat Semua
        </a>

    </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-5">

        @forelse($hotels as $p)

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">

            <!-- FOTO -->
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

            <!-- CONTENT -->
            <div class="p-5">

                <h3 class="text-lg font-bold text-gray-800">
                    {{ $p->nama }}
                </h3>

                <p class="text-gray-500 text-sm mt-1">
                    Hotel Premium
                </p>

                <div class="flex justify-between items-center mt-5">

                    <div>

                        <p class="text-gray-500 text-sm">
                        📍 {{ $p->lokasi }}
                        </p>

                        <div class="flex flex-wrap gap-2 mt-2">

                        @foreach($p->tags as $tag)

                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">
                                #{{ $tag->nama }}
                            </span>

                        @endforeach

                    </div>
                        <span class="text-blue-600 font-bold text-lg">
                            Rp {{ number_format($p->harga,0,',','.') }}
                        </span>

                        <p class="text-xs text-gray-400">
                            / malam
                        </p>
                    </div>
                    

                    <div class="flex gap-2">
                        <form action="{{ route('produk.destroy', $p->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus {{ $p->nama }}?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-xl text-sm transition">
                                Hapus
                            </button>

                        </form>

                    </div>

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

<!-- VILLA -->
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

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">

        @forelse($villas as $p)

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">

            <!-- FOTO -->
            <div class="relative">
                <a href="{{ route('produk.show', $p->id) }}">
                <img src="{{ asset('images/' . ($p->foto ?? 'default.jpg')) }}"
                     alt="{{ $p->nama }}"
                     class="w-full h-56 object-cover">
                </a>
                <div class="absolute top-3 right-3 bg-white px-3 py-1 rounded-full text-sm font-semibold shadow">
                    ⭐ 4.9
                </div>

            </div>

            <!-- CONTENT -->
            <div class="p-5">

                <h3 class="text-lg font-bold text-gray-800">
                    {{ $p->nama }}
                </h3>

                <p class="text-gray-500 text-sm mt-1">
                    Villa Premium
                </p>

                <div class="flex justify-between items-center mt-5">

                    <div>
                        <p class="text-gray-500 text-sm">
                        📍 {{ $p->lokasi }}
                        </p>

                        <div class="flex flex-wrap gap-2 mt-2">

                        @foreach($p->tags as $tag)

                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">
                                #{{ $tag->nama }}
                            </span>

                        @endforeach

                    </div>

                        <span class="text-blue-600 font-bold text-lg">
                            Rp {{ number_format($p->harga,0,',','.') }}
                        </span>

                        <p class="text-xs text-gray-400">
                            / malam
                        </p>
                    </div>

                    <div class="flex gap-2">


                        <form action="{{ route('produk.destroy', $p->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus {{ $p->nama }}?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-xl text-sm transition">
                                Hapus
                            </button>

                        </form>

                    </div>

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