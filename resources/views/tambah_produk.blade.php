@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow-lg" style="border-radius: 18px; overflow: hidden; border: none;">

                <!-- HEADER -->
                    <div style="
                        background: linear-gradient(135deg, #004aad, #007bff);
                        color: white;
                        padding: 28px;
                        text-align: center;
                    ">

                        <h2 class="mb-1 fw-bold" style="font-size: 28px;">
                            Tambah Katalog
                        </h2>

                        <small style="font-size: 14px; opacity: 0.9;">
                            Isi data hotel / villa dengan lengkap
                        </small>

                    </div>
                <div class="card-body p-4">

                    <form action="/produk/simpan" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">

                            <!-- KIRI -->
                            <div class="col-md-6">

                                <div class="section-box">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>

                                <div class="section-box">
                                    <label>Kategori</label>
                                    <select name="kategori" class="form-control" required>
                                        <option>Hotel</option>
                                        <option>Villa</option>
                                    </select>
                                </div>

                                <div class="section-box">
                                    <label>Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control" placeholder="Bali, Indonesia" required>
                                </div>

                                <div class="section-box">
                                    <label>Kapasitas</label>
                                    <input type="number" name="kapasitas" class="form-control" required>
                                </div>

                                <div class="section-box">
                                    <label>Harga / Malam</label>
                                    <input type="number" name="harga" class="form-control" required>
                                </div>

                                <div class="section-box">
                                    <label>Fasilitas</label>
                                    <textarea name="fasilitas"
                                        class="form-control"
                                        rows="4"
                                        placeholder="Wifi/n, Kolam Renang, AC, Parkir"></textarea>
                                </div>

                                <div class="section-box">
                                    <label>Tipe Kamar</label>
                                    <textarea name="tipe_kamar"
                                        class="form-control"
                                        rows="4"
                                        placeholder="Kamar Queen Smart, Kamar Twin Smart"></textarea>
                                </div>

                            </div>

                            <!-- KANAN -->
                            <div class="col-md-6">

                                <!-- FOTO UTAMA -->
                                <div class="upload-card">
                                    <label>Foto Utama</label>
                                    <input type="file" name="foto_utama" id="fotoUtama" hidden>

                                    <label for="fotoUtama" class="upload-area">
                                        <i class="bi bi-image"></i>
                                        <span>Pilih Foto Utama</span>
                                        <small id="namaUtama"></small>
                                    </label>
                                </div>

                                <!-- FOTO TAMBAHAN -->
                                <div class="upload-card mt-3">

                                    <label>Foto Tambahan</label>

                                    <input 
                                        type="file" 
                                        name="fotos[]" 
                                        id="fotoTambahan"
                                        multiple
                                        hidden
                                    >

                                    <label for="fotoTambahan" class="upload-area">
                                        <i class="bi bi-images"></i>

                                        <span>Pilih Banyak Foto</span>

                                        <small id="namaTambahan"></small>
                                    </label>

                                </div>

                            </div>

                        </div>

                       <!-- BUTTON -->
                        <div class="d-flex justify-content-center mt-4 gap-3">

                            <a href="/produk" class="btn-custom btn-cancel">
                                Batal
                            </a>

                            <button type="submit" class="btn-custom btn-save">
                                Simpan
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- STYLE -->
<style>
.section-box{
    margin-bottom: 12px;
}

.section-box label{
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 5px;
}

.form-control{
    border-radius: 10px;
    padding: 9px 12px;
    border: 1px solid #ddd;
}

.form-control:focus{
    border-color: #004aad;
    box-shadow: 0 0 5px rgba(0,74,173,0.2);
}

.upload-card{
    background: #f8f9fa;
    border-radius: 12px;
    padding: 12px;
    border: 1px dashed #004aad;
}

.upload-area{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    padding: 18px;
    color: #004aad;
    text-align: center;
}

.upload-area i{
    font-size: 28px;
    margin-bottom: 5px;
}

.upload-area span{
    font-weight: 600;
}

.upload-area small{
    color: green;
    font-size: 12px;
}

.btn-custom{
    padding: 12px 28px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 15px;
    text-decoration: none;
    display: inline-block;
    transition: 0.3s;
    min-width: 140px;
    text-align: center;
}

/* tombol batal */
.btn-cancel{
    background: #e6f0ff;
    color: #004aad;
    border: 1px solid #cfe0ff;
}

.btn-cancel:hover{
    background: #d6e8ff;
}

/* tombol simpan */
.btn-save{
    background: linear-gradient(135deg, #004aad, #007bff);
    color: white;
    border: none;
    box-shadow: 0 4px 10px rgba(0,74,173,0.25);
}

.btn-save:hover{
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0,74,173,0.35);
}
</style>

<!-- SCRIPT -->
<script>
document.getElementById('fotoUtama').addEventListener('change', function () {
    document.getElementById('namaUtama').innerText = this.files[0]?.name ?? '';
});

document.getElementById('fotoTambahan').addEventListener('change', function () {
    let files = this.files;
    let text = "";
    for (let i = 0; i < files.length; i++) {
        text += files[i].name + " ";
    }
    document.getElementById('namaTambahan').innerText = text;
});
</script>

@endsection