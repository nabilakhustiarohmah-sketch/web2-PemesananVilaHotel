@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto py-12 px-6">

    <div class="bg-gradient-to-br from-sky-50 to-blue-100 rounded-3xl shadow-2xl p-10 border border-sky-200">

        <div class="text-center mb-8">

            <div class="w-24 h-24 mx-auto rounded-full bg-sky-500 flex items-center justify-center shadow-lg mb-5">
                <span class="text-white text-5xl">✓</span>
            </div>

            <h1 class="text-5xl font-bold text-sky-600">
                Booking Berhasil
            </h1>

            <p class="text-gray-500 mt-3">
                Terima kasih telah melakukan pemesanan.
            </p>

        </div>

        <div class="bg-white rounded-2xl p-8 shadow-lg border border-sky-100">

        <div class="bg-sky-500 text-white rounded-2xl p-5 mb-6 text-center shadow">

            <p class="text-sm opacity-80">
                Nomor Booking
            </p>

            <h2 class="text-2xl font-bold tracking-widest">
                VLH-{{ rand(000,1000) }}
            </h2>

        </div>

            <h2 class="text-xl font-bold mb-5">
                Detail Booking
            </h2>

            <div class="grid md:grid-cols-2 gap-4">

                <div>
                    <b>Nama</b><br>
                    {{ $booking->nama }}
                </div>

                <div>
                    <b>Email</b><br>
                    {{ $booking->email }}
                </div>

                <div>
                    <b>Telepon</b><br>
                    {{ $booking->telepon }}
                </div>

                <div>
                    <b>Jumlah Tamu</b><br>
                    {{ $booking->jumlah_tamu }}
                </div>

                <div>
                    <b>Check In</b><br>
                    {{ $booking->check_in }}
                </div>

                <div>
                    <b>Check Out</b><br>
                    {{ $booking->check_out }}
                </div>

                <div>
                    <b>Pembayaran</b><br>
                    {{ $booking->metode_pembayaran }}
                </div>

                <div>
                    <b>Status</b><br>
                    <span class="text-green-600 font-bold">
                        Terkonfirmasi
                    </span>
                </div>

            </div>

        </div>

        <div class="text-center mt-8">

            <a href="{{ route('home') }}"
            class="inline-block bg-sky-500 hover:bg-sky-600 text-white px-8 py-4 rounded-2xl shadow-lg transition">
                Kembali ke Beranda
            </a>

        </div>

    </div>

</div>

@endsection