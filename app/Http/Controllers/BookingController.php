<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

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

    return view('booking-success', [
        'nama' => $request->nama,
        'email' => $request->email,
        'telepon' => $request->telepon,
        'check_in' => $request->check_in,
        'check_out' => $request->check_out,
        'jumlah_tamu' => $request->jumlah_tamu,
        'metode' => $request->metode_pembayaran,
    ]);
}
    /**
     * Tampilkan halaman struk booking.
     */
    public function receipt($id)
    {
        $booking = Booking::with('items')->findOrFail($id);

        // Pastikan hanya pemilik booking yang bisa akses
        // abort_if(auth()->id() !== $booking->user_id, 403);

        return view('bookings.receipt', compact('booking'));
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
