@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    <h1 class="text-4xl font-bold text-gray-800 mb-8">
        Booking Penginapan
    </h1>

    <div class="grid lg:grid-cols-3 gap-8">

        <!-- DETAIL PRODUK -->
        <div class="lg:col-span-1">

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                <img src="{{ asset('images/'.$produk->foto) }}"
                     alt="{{ $produk->nama }}"
                     class="w-full h-64 object-cover">

                <div class="p-6">

                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                        {{ $produk->kategori }}
                    </span>

                    <h2 class="text-2xl font-bold mt-4">
                        {{ $produk->nama }}
                    </h2>

                    <p class="text-gray-500 mt-3">
                        📍 {{ $produk->lokasi ?? 'Lokasi belum tersedia' }}
                    </p>

                    <p class="text-gray-500 mt-2">
                        👥 Kapasitas {{ $produk->kapasitas ?? '-' }} Orang
                    </p>

                    <div class="mt-6 border-t pt-4">

                        <p class="text-gray-500">
                            Harga per malam
                        </p>

                        <h3 class="text-3xl font-bold text-blue-600 mt-2">
                            Rp {{ number_format($produk->harga) }}
                        </h3>

                    </div>

                </div>

            </div>

        </div>

        <!-- FORM BOOKING -->
        <div class="lg:col-span-2">

            <div class="bg-white rounded-3xl shadow-xl p-8">

                <h2 class="text-2xl font-bold mb-6">
                    Data Pemesan
                </h2>

                <form method="POST" action="{{ route('booking.store', $produk->id) }}">
                @csrf

                    <div class="grid md:grid-cols-2 gap-5">

                        <div>
                            <label class="block mb-2 font-medium">
                                Nama Lengkap
                            </label>

                            <input type="text"
                                   class="w-full border rounded-xl p-3"
                                   placeholder="Masukkan nama lengkap">
                        </div>

                        <div>
                            <label class="block mb-2 font-medium">
                                Email
                            </label>

                            <input type="email"
                                   class="w-full border rounded-xl p-3"
                                   placeholder="Masukkan email">
                        </div>

                    </div>

                    <div class="mt-5">
                        <label class="block mb-2 font-medium">
                            Nomor Telepon
                        </label>

                        <input type="text"
                               class="w-full border rounded-xl p-3"
                               placeholder="08xxxxxxxxxx">
                    </div>

                    <div class="grid md:grid-cols-2 gap-5 mt-5">

                        <div>
                            <label class="block mb-2 font-medium">
                                Check In
                            </label>

                            <input type="date"
                                   class="w-full border rounded-xl p-3">
                        </div>

                        <div>
                            <label class="block mb-2 font-medium">
                                Check Out
                            </label>

                            <input type="date"
                                   class="w-full border rounded-xl p-3">
                        </div>

                    </div>

                    <div class="grid md:grid-cols-2 gap-5 mt-5">

                        <div>
                            <label class="block mb-2 font-medium">
                                Jumlah Tamu
                            </label>

                            <input type="number"
                                   min="1"
                                   value="1"
                                   class="w-full border rounded-xl p-3">
                        </div>

                        <div>
                            <label class="block mb-2 font-medium">
                                Metode Pembayaran
                            </label>

                            <select class="w-full border rounded-xl p-3">
                                <option>Transfer Bank</option>
                                <option>E-Wallet</option>
                                <option>QRIS</option>
                                <option>Bayar di Tempat</option>
                            </select>
                        </div>

                    </div>

                    <div class="mt-8 bg-blue-50 border border-blue-200 rounded-2xl p-5">

                        <h3 class="font-bold text-lg mb-2">
                            Ringkasan Pesanan
                        </h3>

                        <div class="flex justify-between mb-2">
                            <span>Penginapan</span>
                            <span>{{ $produk->nama }}</span>
                        </div>

                        <div class="flex justify-between mb-2">
                            <span>Kategori</span>
                            <span>{{ $produk->kategori }}</span>
                        </div>

                        <div class="flex justify-between mb-2">
                            <span>Harga / malam</span>
                            <span>Rp {{ number_format($produk->harga) }}</span>
                        </div>

                    </div>

                    <button type="submit"
                        class="w-full mt-8 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 rounded-2xl transition">

                        Konfirmasi Booking

                    </button>

                    @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-5">
                    {{ $errors->first() }}
                </div>
            @endif

                </form>

            </div>

        </div>

    </div>

</div>

@endsection