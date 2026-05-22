@extends('layouts.app')

@section('content')

<div class="container mx-auto mt-10">

    <h2 class="text-3xl font-bold mb-6">
        Hasil Pencarian Hotel dan villa
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        @forelse($hasil as $p)

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

            <a href="{{ route('produk.show', $p->id) }}">
                <img src="{{ asset('images/'.$p->foto) }}"
                     class="w-full h-56 object-cover">
            </a>
            <div class="p-4">
                <h3 class="text-xl font-bold">{{ $p->nama }}</h3>

                <p class="text-gray-500 mt-2">
                    {{ $p->lokasi }}
                </p>

                <p class="text-blue-600 font-semibold mt-2">
                    Kapasitas {{ $p->kapasitas }} Orang
                </p>
            </div>

        </div>
        <div class="flex flex-wrap gap-2 mt-2">

                @foreach($p->tags as $tag)

                    <span class="bg-gray-200 text-xs px-2 py-1 rounded-full">

                        #{{ $tag->nama }}

                    </span>

                @endforeach

            </div>
        @empty

        <p>Tidak ada hotel ditemukan.</p>

        @endforelse

    </div>
</div>

@endsection