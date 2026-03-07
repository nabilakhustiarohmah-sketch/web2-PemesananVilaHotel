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

Route::get('/khobir', function () {
    return "Perkenalan Muhammad Khobir Sastrawan";
});