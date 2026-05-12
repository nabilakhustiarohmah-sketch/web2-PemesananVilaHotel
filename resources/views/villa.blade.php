@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Semua Villa
</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

@foreach($villas as $p)

<div class="bg-white rounded-3xl shadow-lg overflow-hidden">

    <img src="{{ asset('images/'.$p->foto) }}"
         class="w-full h-52 object-cover">

    <div class="p-4">

        <h3 class="font-bold text-lg">
            {{ $p->nama }}
        </h3>

        <p class="text-gray-500">
            Rp {{ number_format($p->harga,0,',','.') }}
        </p>

    </div>

</div>

@endforeach

</div>

@endsection