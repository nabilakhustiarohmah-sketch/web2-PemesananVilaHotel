@extends('layouts.app')

@section('content')

<div style="
    background-image: url('{{ asset('images/1776693635.jpg') }}');
    height: 400px;
    background-size: cover;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
">
    <h1>Temukan Hotel & Villa Terbaik</h1>
</div>

<div class="container mt-5">
    <h3>Rekomendasi</h3>

    <div class="row">
        @foreach($produks as $p)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/'.$p->foto) }}" class="card-img-top">
                <div class="card-body">
                    <h5>{{ $p->nama }}</h5>
                    <p>Rp {{ number_format($p->harga) }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection