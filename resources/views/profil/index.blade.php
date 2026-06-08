@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-tr from-stone-100 via-stone-50 to-emerald-50/30 flex items-center justify-center p-4 sm:p-6 antialiased">
  <div class="bg-white rounded-[2rem] border border-stone-200/50 w-full max-w-md overflow-hidden shadow-[0_20px_50px_rgba(28,50,40,0.08)] backdrop-blur-sm transform transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_30px_60px_rgba(28,50,40,0.12)]">

    {{-- Header Berdasarkan Role --}}
    @if(auth()->user()->role === 'admin')
      <div class="relative bg-gradient-to-br from-neutral-900 via-neutral-800 to-amber-950 p-8 text-center overflow-hidden">
        {{-- Ornamen Estetik Latar Belakang --}}
        <div class="absolute -top-12 -right-12 w-40 h-40 bg-amber-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-16 -left-16 w-36 h-36 bg-emerald-500/5 rounded-full blur-2xl"></div>
        
        <div class="w-24 h-24 rounded-full bg-gradient-to-b from-amber-100 to-amber-200 text-amber-950 text-3xl font-extrabold flex items-center justify-center mx-auto border-4 border-white shadow-xl tracking-tighter">
          {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
        </div>
        <h2 class="text-white mt-4 mb-1.5 text-2xl font-bold tracking-tight font-serif">
          {{ auth()->user()->name }}
        </h2>
        <span class="inline-flex items-center gap-1.5 bg-gradient-to-r from-amber-500/20 to-yellow-500/20 backdrop-blur-md text-amber-400 text-xs font-bold px-3.5 py-1 rounded-full border border-amber-400/30 shadow-sm uppercase tracking-widest">
          ✨ Premium Admin
        </span>
      </div>
    @else
      <div class="relative bg-gradient-to-br from-emerald-800 via-emerald-700 to-teal-900 p-8 text-center overflow-hidden">
        {{-- Ornamen Estetik Latar Belakang --}}
        <div class="absolute -top-12 -right-12 w-40 h-40 bg-teal-400/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-16 -left-16 w-36 h-36 bg-lime-400/10 rounded-full blur-2xl"></div>

        <div class="w-24 h-24 rounded-full bg-gradient-to-b from-emerald-50 to-teal-100 text-emerald-900 text-3xl font-extrabold flex items-center justify-center mx-auto border-4 border-white shadow-xl tracking-tighter">
          {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
        </div>
        <h2 class="text-white mt-4 mb-1.5 text-2xl font-bold tracking-tight">
          {{ auth()->user()->name }}
        </h2>
        <span class="inline-flex items-center gap-1.5 bg-white/10 backdrop-blur-md text-emerald-300 text-xs font-bold px-3.5 py-1 rounded-full border border-white/20 shadow-sm uppercase tracking-wider">
          🏝️ Explorer Member
        </span>
      </div>
    @endif

    {{-- Detail Informasi Akun --}}
    <div class="p-6 space-y-3">
      
      <div class="flex items-center gap-4 p-3 rounded-2xl border border-transparent hover:border-stone-100 hover:bg-stone-50/50 group transition-all duration-300">
        <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-stone-100 to-stone-50 text-stone-600 flex items-center justify-center text-xl flex-shrink-0 group-hover:from-emerald-50 group-hover:to-teal-50 group-hover:text-emerald-700 shadow-sm transition-all duration-300">
          👤
        </div>
        <div class="flex-1">
          <p class="text-[11px] font-bold text-stone-400 uppercase tracking-widest">Nama Lengkap</p>
          <p class="text-sm font-bold text-stone-800 mt-0.5 group-hover:text-emerald-900 transition-colors">{{ auth()->user()->name }}</p>
        </div>
      </div>

      <div class="flex items-center gap-4 p-3 rounded-2xl border border-transparent hover:border-stone-100 hover:bg-stone-50/50 group transition-all duration-300">
        <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-stone-100 to-stone-50 text-stone-600 flex items-center justify-center text-xl flex-shrink-0 group-hover:from-emerald-50 group-hover:to-teal-50 group-hover:text-emerald-700 shadow-sm transition-all duration-300">
          ✉️
        </div>
        <div class="flex-1">
          <p class="text-[11px] font-bold text-stone-400 uppercase tracking-widest">Email Terdaftar</p>
          <p class="text-sm font-bold text-stone-800 mt-0.5 group-hover:text-emerald-900 transition-colors">{{ auth()->user()->email }}</p>
        </div>
      </div>

      <div class="flex items-center gap-4 p-3 rounded-2xl border border-transparent hover:border-stone-100 hover:bg-stone-50/50 group transition-all duration-300">
        <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-stone-100 to-stone-50 text-stone-600 flex items-center justify-center text-xl flex-shrink-0 group-hover:from-emerald-50 group-hover:to-teal-50 group-hover:text-emerald-700 shadow-sm transition-all duration-300">
          📅
        </div>
        <div class="flex-1">
          <p class="text-[11px] font-bold text-stone-400 uppercase tracking-widest">Mulai Bergabung</p>
          <p class="text-sm font-bold text-stone-800 mt-0.5 group-hover:text-emerald-900 transition-colors">
            {{ auth()->user()->created_at->format('d F Y') }}
          </p>
        </div>
      </div>

      <div class="flex items-center gap-4 p-3 rounded-2xl">
        <div class="w-11 h-11 rounded-xl bg-stone-100/70 text-stone-600 flex items-center justify-center text-xl flex-shrink-0 shadow-inner">
          🔑
        </div>
        <div class="flex-1">
          <p class="text-[11px] font-bold text-stone-400 uppercase tracking-widest mb-1">Status Keanggotaan</p>
          <span class="inline-block text-xs font-extrabold px-3 py-1 rounded-lg tracking-wide shadow-sm
            {{ auth()->user()->role === 'admin' ? 'bg-amber-50 text-amber-800 border border-amber-200/60' : 'bg-emerald-50 text-emerald-800 border border-emerald-100' }}">
            {{ auth()->user()->role === 'admin' ? '🏨 Hotel Internal Team' : '🧳 Verified Guest' }}
          </span>
        </div>
      </div>
    </div>

    {{-- Menu Khusus Admin (Aplikasi Manajemen Hotel/Vila) --}}
    @if(auth()->user()->role === 'admin')
    <div class="px-6 mb-4">
      <div class="bg-gradient-to-br from-stone-50 via-amber-50/30 to-stone-100/50 border border-stone-200/60 rounded-2xl p-4 shadow-sm">
        <p class="text-[11px] font-extrabold text-stone-600 tracking-wider uppercase mb-3 flex items-center gap-1.5">
          <span class="animate-bounce">🛠️</span> Konsol Manajemen Kamar
        </p>
        <div>
          <a href="{{ route('produk.index') }}"
            class="group/btn relative inline-flex items-center justify-center w-full py-3 px-4 rounded-xl font-bold text-xs text-white bg-gradient-to-r from-amber-700 to-amber-900 shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden">
            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-amber-600 to-amber-800 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></span>
            <span class="relative flex items-center gap-1.5">
              Atur Hotel & Villa Anda→
            </span>
          </a>
        </div>
      </div>
    </div>
    @endif

    {{-- Tombol Navigasi Utama --}}
    <div class="px-6 pb-6 pt-2 flex gap-3">
      <a href="/"
        class="flex-1 inline-flex items-center justify-center gap-1 py-3 px-4 rounded-xl border border-stone-200 bg-white text-xs font-bold text-stone-600 hover:bg-stone-50 hover:text-stone-900 hover:border-stone-300 transition-all duration-200 shadow-sm">
        🏡 Lihat Beranda
      </a>
      
      <form method="POST" action="{{ route('logout') }}" class="flex-1">
        @csrf
        <button type="submit"
          class="w-full py-3 px-4 rounded-xl border border-rose-100 bg-rose-50/40 text-rose-600 text-xs font-bold tracking-wide hover:bg-rose-600 hover:text-white hover:border-rose-600 transition-all duration-300 cursor-pointer shadow-sm">
          Logout
        </button>
      </form>
    </div>

  </div>
</div>
@endsection