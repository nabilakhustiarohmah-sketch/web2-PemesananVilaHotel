@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-blue-800">Tambah Produk Baru</h2>

<form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf

    {{-- Nama --}}
    <div>
        <label class="block font-medium mb-1">Nama Hotel/Villa</label>
        <input type="text" name="nama" value="{{ old('nama') }}"
               class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
        
        @error('nama')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Harga --}}
    <div>
        <label class="block font-medium mb-1">Harga per Malam</label>
        <input type="number" name="harga" value="{{ old('harga') }}"
               class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
        
        @error('harga')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Foto --}}
    <div>
        <label class="block font-medium mb-1">Upload Foto</label>
        <input type="file" name="foto"
               class="w-full border rounded-lg p-2">
        
        @error('foto')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Button --}}
    <div>
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
            Simpan Produk
        </button>
    </div>
</form>
@endsection