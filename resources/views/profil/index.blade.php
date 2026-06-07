@extends('layouts.app')

@section('content')
<div style="min-height:100vh; background:#f1f5f9; display:flex; align-items:center; justify-content:center; padding:2rem 1rem;">
  <div style="background:white; border-radius:20px; border:1px solid #e2e8f0; width:100%; max-width:460px; overflow:hidden;">

    {{-- Header berbeda warna --}}
    @if(auth()->user()->role === 'admin')
      <div style="background:linear-gradient(135deg, #dc2626, #991b1b); padding:2rem; text-align:center;">
        <div style="width:80px; height:80px; border-radius:50%; background:#fca5a5; color:#7f1d1d; font-size:28px; font-weight:600; display:flex; align-items:center; justify-content:center; margin:0 auto; border:3px solid white;">
          {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
        </div>
        <h2 style="color:white; margin:12px 0 4px; font-size:18px; font-weight:600;">
          {{ auth()->user()->name }}
        </h2>
        <span style="background:rgba(255,255,255,0.2); color:white; font-size:12px; padding:3px 12px; border-radius:99px;">
          Administrator
        </span>
      </div>
    @else
      <div style="background:#2563eb; padding:2rem; text-align:center;">
        <div style="width:80px; height:80px; border-radius:50%; background:#facc15; color:#78350f; font-size:28px; font-weight:600; display:flex; align-items:center; justify-content:center; margin:0 auto; border:3px solid white;">
          {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
        </div>
        <h2 style="color:white; margin:12px 0 4px; font-size:18px; font-weight:600;">
          {{ auth()->user()->name }}
        </h2>
        <span style="background:rgba(255,255,255,0.2); color:white; font-size:12px; padding:3px 12px; border-radius:99px;">
          👤 Member
        </span>
      </div>
    @endif

    {{-- Info --}}
    <div style="padding:1.5rem;">
      <div style="display:flex; align-items:center; gap:12px; padding:12px 0; border-bottom:1px solid #f1f5f9;">
        <div style="width:36px; height:36px; border-radius:10px; background:#eff6ff; display:flex; align-items:center; justify-content:center; font-size:16px; flex-shrink:0;">👤</div>
        <div>
          <p style="font-size:11px; color:#94a3b8; margin:0;">Nama Lengkap</p>
          <p style="font-size:14px; font-weight:500; color:#1e293b; margin:0;">{{ auth()->user()->name }}</p>
        </div>
      </div>

      <div style="display:flex; align-items:center; gap:12px; padding:12px 0; border-bottom:1px solid #f1f5f9;">
        <div style="width:36px; height:36px; border-radius:10px; background:#eff6ff; display:flex; align-items:center; justify-content:center; font-size:16px; flex-shrink:0;">✉️</div>
        <div>
          <p style="font-size:11px; color:#94a3b8; margin:0;">Email</p>
          <p style="font-size:14px; font-weight:500; color:#1e293b; margin:0;">{{ auth()->user()->email }}</p>
        </div>
      </div>

      <div style="display:flex; align-items:center; gap:12px; padding:12px 0; border-bottom:1px solid #f1f5f9;">
        <div style="width:36px; height:36px; border-radius:10px; background:#eff6ff; display:flex; align-items:center; justify-content:center; font-size:16px; flex-shrink:0;">📅</div>
        <div>
          <p style="font-size:11px; color:#94a3b8; margin:0;">Bergabung Sejak</p>
          <p style="font-size:14px; font-weight:500; color:#1e293b; margin:0;">
            {{ auth()->user()->created_at->format('d F Y') }}
          </p>
        </div>
      </div>

      <div style="display:flex; align-items:center; gap:12px; padding:12px 0;">
        <div style="width:36px; height:36px; border-radius:10px; background:#eff6ff; display:flex; align-items:center; justify-content:center; font-size:16px; flex-shrink:0;">🔐</div>
        <div>
          <span style="font-size:13px; font-weight:600; padding:3px 10px; border-radius:99px;
            background:{{ auth()->user()->role === 'admin' ? '#fee2e2' : '#dbeafe' }};
            color:{{ auth()->user()->role === 'admin' ? '#dc2626' : '#2563eb' }};">
            {{ auth()->user()->role === 'admin' ? 'Admin' : 'User' }}
          </span>
        </div>
      </div>
    </div>

    {{-- Tombol Admin --}}
    @if(auth()->user()->role === 'admin')
    <div style="padding:0 1.5rem; margin-bottom:1rem;">
      <div style="background:#fef2f2; border-radius:12px; padding:12px; border:1px solid #fecaca;">
        <p style="font-size:12px; color:#991b1b; font-weight:600; margin:0 0 8px;">Menu Admin</p>
        <div style="display:flex; gap:8px; flex-wrap:wrap;">
          <a href="{{ route('produk.index') }}"
            style="font-size:12px; padding:6px 12px; border-radius:8px; background:white; color:#dc2626; border:1px solid #fca5a5; text-decoration:none;">
            Kelola Produk
          </a>
        </div>
      </div>
    </div>
    @endif

    {{-- Tombol bawah --}}
    <div style="padding:0 1.5rem 1.5rem; display:flex; gap:10px;">
      <a href="/"
        style="flex:1; text-align:center; padding:10px; border-radius:10px; border:1px solid #e2e8f0; font-size:13px; color:#475569; text-decoration:none; font-weight:500;">
        &#8592; Beranda
      </a>
      <form method="POST" action="{{ route('logout') }}" style="flex:1;">
        @csrf
        <button type="submit"
          style="width:100%; padding:10px; border-radius:10px; border:1px solid #fca5a5; background:white; color:#dc2626; font-size:13px; font-weight:500; cursor:pointer;">
          Logout
        </button>
      </form>
    </div>

  </div>
</div>
@endsection