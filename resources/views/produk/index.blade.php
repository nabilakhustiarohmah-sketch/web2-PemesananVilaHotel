@extends('layouts.app')

@section('content')
<h2 class="text-3xl font-bold text-blue-800 mb-2">
    Katalog Hotel & Villa
</h2>

<p class="text-gray-600 mb-6">
    Selamat datang di katalog Hotel & Villa kami...
</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @forelse($produks as $p)
        <div class="bg-white shadow-lg rounded-2xl p-4 border border-gray-100 flex flex-col h-full">

            <img src="{{ asset('images/' . ($p->foto ?? 'default.jpg')) }}"
                 alt="{{ $p->nama }}"
                 class="rounded-xl w-full h-48 object-cover mb-4">

            <h3 class="text-xl font-bold text-blue-900">{{ $p->nama }}</h3>
            <p class="text-gray-600 mb-4">
                Rp {{ number_format($p->harga, 0, ',', '.') }} / malam
            </p>

            <div class="mt-auto flex gap-2">
                <a href="{{ route('produk.show', $p->id) }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex-1 text-center transition">
                    Detail
                </a>

                <form action="{{ route('produk.destroy', $p->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Yakin ingin menghapus {{ $p->nama }}?')"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                        Hapus
                    </button>
                </form>
            </div>
        </div>

    @empty
        <div class="col-span-3 text-center py-10">
            <p class="text-gray-500 italic">Belum ada produk yang ditambahkan.</p>
            <a href="{{ route('produk.create') }}" class="text-blue-600 underline">
                Tambah produk sekarang
            </a>
        </div>
    @endforelse
</div>
@endsection