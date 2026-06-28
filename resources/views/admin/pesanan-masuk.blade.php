@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-blue-700">
            📋 Pesanan Masuk
        </h1>

        <p class="text-gray-500 mt-2">
            Kelola seluruh booking hotel & villa dari pelanggan.
        </p>
    </div>

    {{-- STATISTIK --}}
    <div class="grid md:grid-cols-3 gap-5 mb-8">

        <div class="bg-blue-500 text-white p-6 rounded-2xl shadow-lg">
            <h3 class="text-lg opacity-80">
                Total Pesanan
            </h3>

            <p class="text-4xl font-bold mt-2">
                {{ $bookings->count() }}
            </p>
        </div>

        <div class="bg-green-500 text-white p-6 rounded-2xl shadow-lg">
            <h3 class="text-lg opacity-80">
                Booking Aktif
            </h3>

            <p class="text-4xl font-bold mt-2">
                {{ $bookings->count() }}
            </p>
        </div>

        <div class="bg-yellow-500 text-white p-6 rounded-2xl shadow-lg">
            <h3 class="text-lg opacity-80">
                Pelanggan
            </h3>

            <p class="text-4xl font-bold mt-2">
                {{ $bookings->unique('user_id')->count() }}
            </p>
        </div>

    </div>

    {{-- LIST BOOKING --}}
    <div class="space-y-6">

        @forelse($bookings as $booking)

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-xl transition">

            <div class="grid md:grid-cols-4">

                {{-- FOTO --}}
                <div>
                    <img src="{{ $data->foto_utama }}">

                </div>

                {{-- DETAIL --}}
                <div class="md:col-span-3 p-6">

                    <div class="flex justify-between items-start">

                        <div>

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                                {{ $booking->produk->kategori ?? 'Hotel/Villa' }}
                            </span>

                            <h2 class="text-2xl font-bold mt-3">
                                {{ $booking->produk->nama ?? '-' }}
                            </h2>

                            <p class="text-gray-500">
                                📍 {{ $booking->produk->lokasi ?? '-' }}
                            </p>

                        </div>

                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">
                            Terkonfirmasi
                        </span>

                    </div>

                    <hr class="my-5">

                    <div class="grid md:grid-cols-2 gap-4">

                        <div>
                            <p class="text-gray-500 text-sm">Nama Pemesan</p>
                            <p class="font-semibold">{{ $booking->nama }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Email</p>
                            <p class="font-semibold">{{ $booking->email }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Telepon</p>
                            <p class="font-semibold">{{ $booking->telepon }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Jumlah Tamu</p>
                            <p class="font-semibold">{{ $booking->jumlah_tamu }} Orang</p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Check In</p>
                            <p class="font-semibold">{{ $booking->check_in }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Check Out</p>
                            <p class="font-semibold">{{ $booking->check_out }}</p>
                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="flex gap-3 mt-6">

                        <a href="{{ route('booking.success', $booking->id) }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold">

                            Lihat Struk

                        </a>

                        <a href="https://wa.me/{{ $booking->telepon }}"
                           target="_blank"
                           class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl font-semibold">

                            Hubungi Customer

                        </a>

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="bg-white rounded-3xl shadow p-16 text-center">

            <div class="text-6xl mb-4">
                🏨
            </div>

            <h2 class="text-3xl font-bold text-gray-700">
                Belum Ada Pesanan
            </h2>

            <p class="text-gray-500 mt-2">
                Saat ini belum ada booking yang masuk.
            </p>

        </div>

        @endforelse

    </div>

</div>

@endsection