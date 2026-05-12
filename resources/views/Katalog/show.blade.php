@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 60px;">

    <div class="row g-4">

        <!-- KIRI: GAMBAR -->
        <div class="col-md-7">

            <!-- FOTO UTAMA -->
            <div class="card shadow" style="border-radius: 15px; overflow: hidden;">
                <img src="{{ asset('images/'.$data->foto) }}"
                    style="width: 100%; height: 400px; object-fit: cover;">
            </div>

            <!-- GALERI -->
            <div class="d-flex gap-2 mt-3 flex-wrap">


                    @if($data->foto1)
                        <img src="{{ asset('images/'.$data->foto1) }}" class="img-thumbnail">
                    @endif

                    @if($data->foto2)
                        <img src="{{ asset('images/'.$data->foto2) }}" class="img-thumbnail">
                    @endif

                    @if($data->foto3)
                        <img src="{{ asset('images/'.$data->foto3) }}" class="img-thumbnail">
                    @endif
            </div>

        </div>

        <!-- KANAN: INFO -->
        <div class="col-md-5">

            <div class="card shadow p-4" style="border-radius: 15px;">

               <!-- NAMA -->
<h3 class="fw-bold mb-1">
    {{ $data->nama ?? '-' }}
</h3>

<!-- KATEGORI -->
<span class="badge bg-primary mb-3">
    {{ $data->kategori ?? '-' }}
</span>

<hr>

<!-- INFO -->
<p class="mb-2">
    📍 <b>Lokasi:</b>
    {{ $data->lokasi ?? 'Belum diisi' }}
</p>

<p class="mb-2">
    👥 <b>Kapasitas:</b>
    {{ $data->kapasitas ?? '0' }} orang
</p>

<p class="mb-3 fs-5 text-primary">
    💰 Rp {{ number_format($data->harga ?? 0) }} / malam
</p>

<hr>

<!-- DESKRIPSI -->
<p class="text-muted">
    Nikmati pengalaman menginap terbaik dengan fasilitas lengkap dan lokasi strategis.
</p>

<!-- BUTTON -->
<button class="btn btn-primary w-100 mt-3" style="padding: 12px;">
    Booking Sekarang
</button>

            </div>

        </div>

    </div>

</div>

@endsection