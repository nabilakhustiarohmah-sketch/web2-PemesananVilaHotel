@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Tambah Produk Baru</h2>

<form action="{{ url('/produk/simpan') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label class="block">Nama Hotel/Villa</label>
        <input type="text" name="nama" class="w-full border p-2 rounded" required>
    </div>
    <div class="mb-4">
        <label class="block">Harga per Malam</label>
        <input type="number" name="harga" class="w-full border p-2 rounded" required>
    </div>
    <div class="mb-4">
        <label class="block">Upload Foto</label>
        <input type="file" name="foto" class="w-full border p-2 rounded">
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Produk</button>
</form>
@endsection