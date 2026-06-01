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

Route::get('/', [KatalogController::class, 'home'])->name('home');

Route::get('/produk', [KatalogController::class, 'index'])->name('produk.index');

Route::get('/produk/detail/{id}', [KatalogController::class, 'show'])->name('produk.show');

Route::view('/about', 'about');

Route::get('/hotel', [KatalogController::class, 'hotel'])->name('hotel.all');

Route::get('/villa', [KatalogController::class, 'villa'])->name('villa.all');

Route::get('/produk/{id}', [KatalogController::class, 'show'])->name('produk.show');

Route::get('/search', [KatalogController::class, 'search'])->name('produk.search');

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', [KatalogController::class, 'home'])->name('home');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);


/* PROFILE */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route khusus ADMIN
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/produk/tambah', [KatalogController::class, 'create'])->name('produk.create');
    Route::post('/produk/simpan', [KatalogController::class, 'store'])->name('produk.store');
    Route::delete('/produk/{id}', [KatalogController::class, 'destroy'])->name('produk.destroy');
});