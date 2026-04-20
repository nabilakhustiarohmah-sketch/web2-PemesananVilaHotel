@extends('layouts.app')

@section('title', '404')

@section('content')

<div class="text-center py-20">
    <h1 class="text-6xl font-bold text-blue-800 mb-4">
        404
    </h1>

    <p class="text-gray-600 mb-6">
        Oops! Halaman yang kamu cari tidak ditemukan.
    </p>

    <a href="/" 
       class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
        Kembali ke Beranda
    </a>
</div>

@endsection