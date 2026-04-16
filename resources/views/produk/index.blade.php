@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-3xl font-bold text-blue-800 mb-2">
        Katalog Hotel & Villa
    </h2>
    <p class="text-gray-600 mb-6">
        Selamat datang di katalog Hotel & Villa kami...
    </p>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($produks as $p)
        <div class="bg-white shadow-lg rounded-2xl p-4 border border-gray-100 flex flex-col h-full">
            {{-- Foto Produk --}}
            <img src="{{ asset('images/' . ($p->foto ?? 'default.jpg')) }}" class="rounded-xl w-full h-48 object-cover mb-4">
            
            {{-- Info Produk --}}
            <h3 class="text-xl font-bold text-blue-900">{{ $p->nama }}</h3>
            <p class="text-gray-600 mb-4">Rp {{ number_format($p->harga, 0, ',', '.') }} / malam</p>

            {{-- Container Tombol (Bawah) --}}
            <div class="mt-auto flex gap-2">
               {{-- Gunakan route() agar diarahkan ke /produk/detail/{id} sesuai web.php --}}
                <a href="{{ route('produk.show', $p->id) }}" 
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex-1 text-center transition">
                    Detail
                </a>

                {{-- Form Hapus (Hanya SATU form di sini) --}}
                <form action="{{ route('produk.destroy', $p->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            onclick="return confirm('Yakin ingin menghapus {{ $p->nama }}?')"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                        Hapus
                    </button>
                </form>
            </div> 
        </div> {{-- Pastikan penutup div kartu di sini --}}
        @endforeach
    </div>

    {{-- Pesan Jika Kosong --}}
    @if($produks->isEmpty())
        <div class="text-center py-10">
            <p class="text-gray-500 italic">Belum ada produk yang ditambahkan.</p>
            <a href="/produk/tambah" class="text-blue-600 underline">Tambah produk sekarang</a>
        </div>
    @endif
</div>
@endsection