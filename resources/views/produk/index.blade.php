@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-blue-800">
        Daftar Produk
    </h2>

    <a href="{{ route('produk.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl shadow transition">
        + Tambah Produk
    </a>
</div>

@if($produks->count() > 0)
    <div class="overflow-x-auto">
        <table class="w-full bg-white rounded-2xl overflow-hidden shadow">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="p-3 text-left">No</th>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Harga</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produks as $index => $produk)
                <tr class="border-b hover:bg-blue-50 transition">
                    <td class="p-3">{{ $index + 1 }}</td>
                    <td class="p-3 font-medium">{{ $produk->nama }}</td>
                    <td class="p-3 text-blue-700 font-semibold">
                        Rp {{ number_format($produk->harga,0,',','.') }}
                    </td>
                    <td class="p-3 text-center space-x-2">

                        <a href="{{ route('produk.edit', $produk->id) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm">
                           Edit
                        </a>

                        <form action="{{ route('produk.destroy', $produk->id) }}"
                              method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="text-center py-10 text-gray-500">
        Belum ada produk.
    </div>
@endif

@endsection