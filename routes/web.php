<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Route Perkenalan
|--------------------------------------------------------------------------
*/
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
    return '<h1>Halo! Nama saya Muhammad Khobir Sastrawan</h1>
            <p>NIM: 4124038 | Prodi: Sistem Informasi</p>
            <p>Saya siap belajar Laravel! 🚀</p>';
});


use App\Http\Controllers\KatalogController;

/*
|--------------------------------------------------------------------------
| Route Utama
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Route Produk
|--------------------------------------------------------------------------
*/
Route::get('/produk', [KatalogController::class, 'index'])->name('produk.index');

Route::get('/produk/tambah', [KatalogController::class, 'create'])->name('produk.create');

Route::post('/produk/simpan', [KatalogController::class, 'store'])->name('produk.store');

Route::get('/produk/detail/{id}', [KatalogController::class, 'show'])->name('produk.show');

Route::delete('/produk/{id}', [KatalogController::class, 'destroy'])->name('produk.destroy');

/*
|--------------------------------------------------------------------------
| Route About
|--------------------------------------------------------------------------
*/
Route::view('/about', 'about');

Route::get('/home', [KatalogController::class, 'home'])->name('home');