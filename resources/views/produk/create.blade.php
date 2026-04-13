@extends('layouts.app')

@section('content')

<h2 class="text-2xl font-bold text-blue-800 mb-6">
    Tambah Produk
</h2>

<form action="{{ route('produk.store') }}" method="POST" class="space-y-5">
    @csrf

    <div>
        <label class="block mb-2 font-medium">Nama Produk</label>
        <input type="text" name="nama"
               value="{{ old('nama') }}"
               class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
    </div>

    <div>
        <label class="block mb-2 font-medium">Harga</label>
        <input type="number" name="harga"
               value="{{ old('harga') }}"
               class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
    </div>

    <div class="flex gap-3">
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl shadow">
            Simpan
        </button>

        <a href="{{ route('produk.index') }}"
           class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-xl">
            Kembali
        </a>
    </div>

</form>

@endsection