<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route baru – wajib ditambahkan!
Route::get('/perkenalan', function () {
    return '<h1>Halo! Nama saya Nabila Khustia Rohmah</h1>
            <p>NIM: 4124021 | Prodi: Sistem Informasi</p>
            <p>Saya siap belajar Laravel! 🚀</p>';
});

Route::get('/fauziahmartha', function () {
    return '<h1>Halo! Nama saya Fauziah Martha Aula</h1>
            <p>NIM: 4124006 | Prodi: Sistem Informasi</p>
            <p>Saya siap belajar Laravel! 🚀</p>';
});

Route::get('/khobirsastrawan', function () {
    return '<h1>Halo! Nama saya Muhammad Khobir sastrawan</h1>
            <p>NIM: 4124038 | Prodi: Sistem Informasi</p>
            <p>Saya siap belajar Laravel! 🚀</p>';
});


Route::get('/', function () {
    return "Selamat datang di website Booking Hotel & Villa";
});

Route::get('/hotel', function () {
    return "Halaman daftar hotel";
});

Route::get('/villa', function () {
    return "Halaman daftar villa";
});

Route::get('/booking', function () {
    return "Halaman booking";
});

use App\Http\Controllers\HotelController;

Route::get('/', function () {
    return "Selamat datang di website booking hotel";
});

Route::get('/hotel', [HotelController::class, 'index']);