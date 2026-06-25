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

Route::get('/search', [KatalogController::class, 'search'])->name('produk.search');

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Models\Produk;
use App\Models\Booking;


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

Route::get('/produk', [KatalogController::class, 'index'])->name('produk.index');

Route::get('/produk/tambah', [KatalogController::class, 'create'])->name('produk.create');

Route::post('/produk/simpan', [KatalogController::class, 'store'])->name('produk.store');

Route::get('/produk/{id}/edit', [KatalogController::class, 'edit'])->name('produk.edit');

Route::put('/produk/{id}', [KatalogController::class, 'update'])->name('produk.update');

Route::delete('/produk/{id}', [KatalogController::class, 'destroy'])->name('produk.destroy');

Route::get('/produk/detail/{id}', [KatalogController::class, 'show'])->name('produk.show');

// Route khusus USER yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/booking/{id}', function ($id) {
        $produk = Produk::findOrFail($id);
        return view('booking', compact('produk'));
    })->name('booking');

    Route::post('/booking/{id}', [BookingController::class, 'store'])
        ->name('booking.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/riwayat-booking',
        [BookingController::class, 'history'])
        ->name('booking.history');

    Route::get('/booking/struk/{id}',
    [BookingController::class, 'receipt'])
    ->name('booking.receipt');
});

Route::get('/booking-success/{id}', function ($id) {
    $booking = Booking::findOrFail($id);
    return view('booking-success', compact('booking'));
})->name('booking.success');

Route::get('/admin/pesanan',
    [BookingController::class, 'pesananMasuk'])
    ->name('booking.admin');


// Wajib tambahkan ->name('captcha.image') agar tidak error di blade
Route::get('/captcha-image', [AuthController::class, 'generateImage'])->name('captcha.image');

use App\Http\Controllers\FavoriteController;

Route::middleware('auth')->group(function () {
    Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorite.index');
    Route::post('/favorite/{id}', [FavoriteController::class, 'toggle'])->name('favorite.toggle');
});

Route::get('/forgot-password', function () {
    return view('forgot-password');
});