<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

public function store(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'email' => 'required',
        'telepon' => 'required',
        'check_in' => 'required',
        'check_out' => 'required',
        'jumlah_tamu' => 'required',
        'metode_pembayaran' => 'required',
    ]);

    $booking = Booking::create([
        'user_id' => Auth::id(),
        'produk_id' => $id,

        'nama' => $request->nama,
        'email' => $request->email,
        'telepon' => $request->telepon,

        'check_in' => $request->check_in,
        'check_out' => $request->check_out,

        'jumlah_tamu' => $request->jumlah_tamu,
        'metode_pembayaran' => $request->metode_pembayaran,
    ]);

    return redirect()->route('booking.success', $booking->id);
}

public function history()
{
    $bookings = Booking::with('produk')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('riwayatbooking', compact('bookings'));
}

public function pesananMasuk()
{
    $bookings = Booking::with(['produk', 'user'])
        ->latest()
        ->get();

    return view('admin.pesanan-masuk', compact('bookings'));
}

    /**
     * Tampilkan halaman struk booking.
     */
    public function receipt($id)
{
    $booking = Booking::with('produk')->findOrFail($id);
    return view('booking-success', compact('booking'));
}

    /**
     * Download struk sebagai PDF menggunakan barryvdh/laravel-dompdf.
     * Jalankan: composer require barryvdh/laravel-dompdf
     */
    public function download($id)
    {
        $booking = Booking::with('items')->findOrFail($id);

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('bookings.receipt', compact('booking'))
            ->setPaper('a4', 'portrait')
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

        return $pdf->download("struk-{$booking->order_id}.pdf");
    }
}
