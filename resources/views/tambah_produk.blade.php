@extends('layouts.app') 

@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="card" style="padding: 20px; border-radius: 15px;">
        <h2 style="color: #004aad;">Tambah Katalog Baru</h2>
        <hr>
        <form action="/produk/simpan" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Nama Hotel / Villa</label>
                <input type="text" name="nama" class="form-control" placeholder="Contoh: Villa Bali Indah" required>
            </div>
            <div class="mb-3">
                <label>Harga per Malam (Rp)</label>
                <input type="number" name="harga" class="form-control" placeholder="750000" required>
            </div>
            <div class="mb-3">
                <label>Foto Bangunan</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <button type="submit" class="btn" style="background-color: #004aad; color: white;">Simpan Sekarang</button>
            <a href="/produk" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection