@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="hero-section">

    <div class="hero-content">
        <h1>Temukan Hotel & Villa Terbaik</h1>
        <p>
            Nikmati pengalaman menginap nyaman dan mewah bersama VilHo
        </p>
    </div>

</section>

<!-- SEARCH BOX -->
<section class="search-wrapper container">

    <form action="{{ route('produk.search') }}" method="GET" class="search-box">

    <!-- Lokasi -->
    <div>
        <label>Lokasi</label>
        <input type="text" name="lokasi" placeholder="Cari kota atau lokasi"
               class="border p-2 rounded-lg w-full">
    </div>

    <!-- Tanggal Check In -->
    <div>
        <label>Check In</label>
        <input type="date" name="checkin"
               class="border p-2 rounded-lg w-full">
    </div>
    <!-- Tanggal Check Out -->
    <div>
        <label>Check Out</label>
        <input type="date" name="checkout"
               class="border p-2 rounded-lg w-full">
    </div>

    <!-- Peserta -->
    <div>
        <label>Peserta</label>
        <input type="number" name="peserta" placeholder="Jumlah peserta"
               class="border p-2 rounded-lg w-full">
    </div>
    <!-- Tombol Search -->
    <div>
        <button type="submit"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg w-full mt-6">
            Cari 
        </button>
    </div>

</form>

</section>

<!-- REKOMENDASI -->
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Hotel Populer</h2>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">

        @foreach($hotels as $p)

        <div>

            <div class="mini-card">

                <div class="mini-img">
                    <a href="{{ route('produk.show', $p->id) }}" class="blok">
                        <img src="{{ asset('images/'.$p->foto) }}">
                    </a>
                    <div class="rating">
                        ⭐ 4.9
                    </div>

                </div>

                <div class="mini-content">

                    <h6>{{ $p->nama }}</h6>

                    <p class="text-gray-500 text-sm">
                        📍 {{ $p->lokasi }}
                    </p>

                    <span>
                        Rp {{ number_format($p->harga) }}
                    </span>

                </div>
                <div class="flex flex-wrap gap-2 mt-2">

                        @foreach($p->tags as $tag)

                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">
                                #{{ $tag->nama }}
                            </span>

                        @endforeach

                    </div>
        </div>

        </div>

        @endforeach

    </div>

</div>

<!-- VILLA -->
<div class="container pb-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Villa Populer</h2>
    </div>

   <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">

        @foreach($villas as $p)

        <div>

            <div class="mini-card">

                <div class="mini-img">
                    <a href="{{ route('produk.show', $p->id) }}" class="blok">
                        <img src="{{ asset('images/'.$p->foto) }}">
                </a>

                    <div class="rating">
                        ⭐ 4.9
                    </div>

                </div>

                <div class="mini-content">

    <h6>{{ $p->nama }}</h6>

    <p class="text-gray-500 text-sm">
        📍 {{ $p->lokasi }}
    </p>

    <div class="flex flex-wrap gap-2 mt-2">

        @foreach($p->tags as $tag)

            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">
                #{{ $tag->nama }}
            </span>

        @endforeach

    </div>

    <span>
        Rp {{ number_format($p->harga) }}
    </span>

</div>

            </div>

        </div>

        @endforeach

    </div>

</div>

<div class="hero-buttons">
    
    <a href="{{ route('produk.index') }}" class="btn-explore">
        Jelajahi Produk
    </a>

</div>

<!-- CONTACT -->
<a href="https://wa.me/6281234567890" class="floating-contact">
    💬
</a>

<style>

body{
    background: #f5f7fb;
}
.mini-card{
    background: white;
    border-radius: 25px;
    overflow: hidden;
    transition: 0.3s;
    box-shadow: 0 5px 18px rgba(0,0,0,0.08);
}

.mini-card:hover{
    transform: translateY(-5px);
}

.mini-img{
    position: relative;
    overflow: hidden;
}

.mini-img img{
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: 0.4s;
    border-radius: 12px;
}

.mini-card:hover img{
    transform: scale(1.05);
}

.rating{
    position: absolute;
    top: 12px;
    right: 12px;

    background: white;
    padding: 5px 10px;

    border-radius: 30px;

    font-size: 13px;
    font-weight: 600;
}

.mini-content{
    padding: 15px;
}

.mini-content h6{
    font-weight: 700;
    margin-bottom: 5px;
}

.mini-content p{
    color: #777;
    font-size: 14px;
    margin-bottom: 10px;
}

.mini-content span{
    color: #0d6efd;
    font-weight: bold;
}

.hero-section{
    position: relative;
    height: 78vh;

    background-image:
        linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)),
        url("{{ asset('images/1776688141.jpg') }}");

    background-size: cover;
    background-position: center;

    display: flex;
    justify-content: center;
    align-items: center;

    text-align: center;
    color: white;
}

.hero-content{
    position: relative;
    z-index: 2;
}

.hero-content h1{
    font-size: 55px;
    font-weight: 700;
    margin-bottom: 15px;
}

.hero-content p{
    font-size: 20px;
    opacity: 0.95;
}

.hero-buttons{
    margin-top: 25px;
}

.btn-explore{
    display: inline-block;

    background: #0d6efd;
    color: white;

    padding: 14px 28px;

    border-radius: 40px;

    text-decoration: none;
    font-weight: 600;

    transition: 0.3s;
}

.btn-explore:hover{
    background: #0b5ed7;
    transform: translateY(-3px);
}

/* SEARCH */
.search-wrapper{
    margin-top: -45px;
    position: relative;
    z-index: 10;
}

.search-box{
    background: white;

    border-radius: 70px;

    padding: 18px 20px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 15px;

    box-shadow: 0 10px 30px rgba(0,0,0,0.12);

    max-width: 1000px;
    margin: auto;
}

.search-item{
    flex: 1;
    padding: 0 15px;
}

.search-item label{
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #222;
    margin-bottom: 3px;
}

.search-item input{
    width: 100%;
    border: none;
    outline: none;
    background: transparent;
    color: #666;
    font-size: 15px;
}

.divider{
    width: 1px;
    height: 40px;
    background: #ddd;
}

.btn-search{
    width: 60px;
    height: 60px;

    border: none;
    border-radius: 50%;

    background: #0d6efd;
    color: white;

    font-size: 22px;

    display: flex;
    justify-content: center;
    align-items: center;

    transition: 0.3s;
}

.btn-search:hover{
    transform: scale(1.08);
    background: #0b5ed7;
}


/* RESPONSIVE */
@media(max-width: 768px){

    .hero-content h1{
        font-size: 38px;
    }

    .hero-content p{
        font-size: 16px;
    }

    .search-box{
        flex-direction: column;
        border-radius: 30px;
    }

    .divider{
        display: none;
    }

    .search-item{
        width: 100%;
    }

    .btn-search{
        width: 100%;
        border-radius: 20px;
    }

}

/* CONTACT */

.floating-contact{
    position: fixed;

    right: 25px;
    bottom: 25px;

    width: 70px;
    height: 70px;

    background: #25D366;
    color: white;

    border-radius: 50%;

    display: flex;
    justify-content: center;
    align-items: center;

    text-decoration: none;

    font-size: 35px;

    box-shadow: 0 10px 25px rgba(0,0,0,.2);

    z-index: 9999;

    animation: float 3s ease-in-out infinite;

    transition: .3s;
}

.floating-contact:hover{
    transform: scale(1.1);
}

@keyframes float{

    0%{
        transform: translateY(0);
    }

    50%{
        transform: translateY(-10px);
    }

    100%{
        transform: translateY(0);
    }

}
</style>

@endsection
