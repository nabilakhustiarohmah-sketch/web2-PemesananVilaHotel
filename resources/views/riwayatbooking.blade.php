@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="mb-10">
        <h1 class="text-4xl font-bold text-sky-700">
            Riwayat Booking
        </h1>

        <p class="text-gray-500 mt-2">
            Lihat seluruh pesanan hotel dan villa yang pernah Anda lakukan.
        </p>
    </div>

    @if($bookings->count() == 0)

        <div class="bg-white rounded-3xl shadow-lg p-12 text-center">

            <div class="text-6xl mb-4">
                🏨
            </div>

            <h2 class="text-2xl font-bold text-gray-700">
                Belum Ada Booking
            </h2>

            <p class="text-gray-500 mt-2">
                Anda belum memiliki riwayat pemesanan.
            </p>

            <a href="{{ route('produk.index') }}"
               class="inline-block mt-6 bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-xl">

                Cari Penginapan

            </a>

        </div>

    @else

        <div class="space-y-6">

            @foreach($bookings as $booking)

            <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-xl transition">

                <div class="grid md:grid-cols-4">

                    {{-- FOTO --}}
                    <div>

                        <img src="{{ $booking->produk->foto_utama }}">

                    </div>

                    {{-- DETAIL --}}
                    <div class="md:col-span-3 p-6">

                        <div class="flex flex-col md:flex-row md:justify-between">

                            <div>

                                <span class="bg-sky-100 text-sky-700 px-3 py-1 rounded-full text-sm">
                                    {{ $booking->produk->kategori }}
                                </span>

                                <h2 class="text-2xl font-bold mt-3">
                                    {{ $booking->produk->nama }}
                                </h2>

                                <p class="text-gray-500 mt-2">
                                    📍 {{ $booking->produk->lokasi }}
                                </p>

                            </div>

                            <div class="mt-4 md:mt-0">

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    Booking Berhasil
                                </span>

                            </div>

                        </div>

                        <div class="grid md:grid-cols-4 gap-5 mt-6">

                            <div>
                                <p class="text-gray-400 text-sm">
                                    Check In
                                </p>

                                <h4 class="font-semibold">
                                    {{ $booking->check_in }}
                                </h4>
                            </div>

                            <div>
                                <p class="text-gray-400 text-sm">
                                    Check Out
                                </p>

                                <h4 class="font-semibold">
                                    {{ $booking->check_out }}
                                </h4>
                            </div>

                            <div>
                                <p class="text-gray-400 text-sm">
                                    Jumlah Tamu
                                </p>

                                <h4 class="font-semibold">
                                    {{ $booking->jumlah_tamu }} Orang
                                </h4>
                            </div>

                            <div>
                                <p class="text-gray-400 text-sm">
                                    Pembayaran
                                </p>

                                <h4 class="font-semibold">
                                    {{ $booking->metode_pembayaran }}
                                </h4>
                            </div>

                        </div>

                        <div class="border-t mt-6 pt-5 flex flex-col md:flex-row md:justify-between md:items-center">

                            <div>

                                <p class="text-gray-500">
                                    Total Pembayaran
                                </p>

                                <h3 class="text-3xl font-bold text-sky-600">
                                    Rp {{ number_format($booking->produk->harga) }}
                                </h3>

                            </div>

                            <div class="flex gap-3 mt-4 md:mt-0">

                                <a href="{{ route('booking.receipt', $booking->id) }}"
                                class="inline-flex items-center justify-center bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-xl min-w-[140px]">
                                    Lihat Struk
                                </a>

                                <a href="{{ route('produk.show', $booking->produk_id) }}"
                                   class="border border-sky-600 text-sky-600 hover:bg-sky-50 px-5 py-3 rounded-xl">
                                    Detail Hotel
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    @endif

</div>

@endsection