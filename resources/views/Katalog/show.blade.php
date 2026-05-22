@extends('layouts.app')

@section('content')

<div>

    <!-- JUDUL -->
    <div class="mb-8">

        <h1 class="text-5xl font-bold text-gray-800">
            {{ $data->nama }}
        </h1>

        <div class="flex items-center gap-3 mt-3">

            <span class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm">
                {{ $data->kategori }}
            </span>

            <span class="text-yellow-500 font-semibold">
                ⭐ 4.8
            </span>

        </div>

        <div class="flex gap-2 mt-4 flex-wrap">

            @foreach($data->tags as $tag)

                <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">
                    #{{ $tag->nama }}
                </span>

            @endforeach

        </div>

    </div>

    <!-- GRID -->
    <div class="grid lg:grid-cols-3 gap-8">

        <!-- ====================== -->
        <!-- KIRI -->
        <!-- ====================== -->

        <div class="lg:col-span-2">

            <!-- FOTO UTAMA -->
            <div class="overflow-hidden rounded-3xl shadow-xl">

                <img src="{{ asset('images/'.$data->foto) }}"
                    class="w-full h-[500px] object-cover">

            </div>

            <!-- SLIDER -->
            <div class="flex gap-4 mt-5 overflow-x-auto pb-2">
                @foreach($data->fotos as $foto)

                <img src="{{ asset('images/' . $foto->foto) }}"
                    class="w-full h-40 object-cover rounded-lg">

                @endforeach

            </div>

           <!-- DESKRIPSI -->
            <div class="bg-white shadow-xl rounded-3xl p-8 mt-8">

                <h2 class="text-2xl font-bold mb-4">

                    @if(strtolower(trim($data->kategori)) == 'hotel')
                        Tentang Hotel
                    @else
                        Tentang Villa
                    @endif

                </h2>

                <p class="text-gray-600 leading-8">

                    {{ $data->deskripsi ?? 
                        (strtolower(trim($data->kategori)) == 'hotel' 
                            ? 'Nikmati pengalaman menginap hotel terbaik dengan fasilitas lengkap dan lokasi strategis.' 
                            : 'Nikmati pengalaman menginap villa private dengan suasana tenang dan nyaman.' ) 
                    }}

                </p>

            </div>

        </div>

        <!-- ====================== -->
        <!-- KANAN -->
        <!-- ====================== -->

        <div class="space-y-5">

            <!-- LOKASI -->
            <div class="bg-white shadow-xl rounded-3xl p-6">

                <div class="mb-5">

                    <p class="text-gray-400 text-sm">
                        📍 Lokasi
                    </p>

                    <h3 class="font-bold text-xl mt-2">
                        {{ $data->lokasi ?? 'Belum diisi' }}
                    </h3>

                </div>

                <div>

                    <p class="text-gray-400 text-sm">
                        👥 Kapasitas
                    </p>

                    <h3 class="font-bold text-xl mt-2">
                        {{ $data->kapasitas ?? '0' }} Orang
                    </h3>

                </div>

            </div>

            <!-- FASILITAS + TIPE -->
            <div class="{{ $data->kategori == 'hotel' ? 'grid grid-cols-2 gap-7' : 'grid grid-cols-1' }}">

                <!-- FASILITAS -->
                <div class="bg-white shadow-xl rounded-3xl p-6 
                            {{ $data->kategori == 'Villa' ? 'w-full max-w-4xl mx-auto' : '' }}">

                    <h3 class="font-bold text-lg mb-4">
                        Fasilitas {{ $data->kategori }}
                    </h3>

                    <div class="space-y-1 text-gray-700 text-sm">

                        @foreach(explode(',', $data->fasilitas) as $item)
                            <div>
                                ✅ {{ trim($item) }}
                            </div>
                        @endforeach

                    </div>
                </div>

                <!-- TIPE KAMAR (KHUSUS HOTEL) -->
                @if(strtolower(trim($data->kategori)) == 'hotel')

                <div class="bg-white shadow-xl rounded-3xl p-6">

                    <h3 class="font-bold text-lg mb-4">
                        Tipe Kamar
                    </h3>

                    <div class="space-y-2 text-gray-700 text-sm">

                        @foreach(explode(',', $data->tipe_kamar) as $item)
                            <div class="bg-blue-50 p-2 rounded-lg">
                                🛏️ {{ trim($item) }}
                            </div>
                        @endforeach

                    </div>

                </div>

                @endif

            </div>
            <!-- HARGA -->
            <div class="bg-blue-600 text-white rounded-3xl shadow-xl p-6">

                <p class="opacity-80">
                    Harga / malam
                </p>

                <h1 class="text-4xl font-bold mt-2">

                    Rp {{ number_format($data->harga ?? 0) }}

                </h1>

            </div>

            <!-- BUTTON -->
            <button class="w-full bg-blue-600 hover:bg-blue-700 transition text-white py-4 rounded-3xl font-bold shadow-xl text-lg">

                Booking Sekarang

            </button>

        </div>

    </div>

</div>

@endsection