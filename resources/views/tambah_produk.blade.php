@extends('layouts.app') 

@section('content')
<div class="container" style="margin-top: 60px;">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow" style="border-radius: 20px; overflow: hidden; border: none;">
                
                <!-- HEADER -->
               <div style="background: linear-gradient(135deg, #004aad, #007bff); color: white; padding: 25px;" class="text-center">
    <h4 class="mb-1">Tambah Katalog</h4>
    <p class="mb-0">Masukkan data hotel / villa dengan lengkap</p>
</div>

                <!-- BODY -->
                <div class="card-body p-4">

                    <form action="/produk/simpan" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nama Hotel / Villa</label>
                            <input type="text" name="nama"
                                class="form-control custom-input"
                                placeholder="Contoh: Villa Bali Indah" required>
                        </div>

                        <!-- Harga -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Harga per Malam (Rp)</label>
                            <input type="number" name="harga"
                                class="form-control custom-input"
                                placeholder="750000" required>
                        </div>

                        <!-- Upload Foto -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Upload Foto</label>

<div class="upload-box text-center p-3" style="max-width: 300px; margin: auto;">
    <input type="file" name="foto" id="fotoInput" hidden>
    
    <label for="fotoInput" style="cursor: pointer;">
        <div>
            <i class="bi bi-cloud-upload" style="font-size: 28px; color:#004aad;"></i>
            <p class="mb-1 mt-2" style="font-size: 14px;">Klik upload</p>
            <small class="text-muted" style="font-size: 12px;">PNG / JPG</small>
        </div>
    </label>

    <p id="fileName" class="mt-2 text-success" style="font-size: 13px;"></p>
</div>

                        <!-- FOOTER BUTTON -->
                        <div class="d-flex justify-content-between mt-4">
                             <button type="submit" class="btn px-4 text-white" style="background-color: #004aad;">
                                BATAL
                            </button>
                            <button type="submit" class="btn px-4 text-white" style="background-color: #004aad;">
                                SIMPAN DATA
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- STYLE TAMBAHAN -->
<style>
.custom-input {
    border-radius: 10px;
    padding: 10px 15px;
    border: 1px solid #ddd;
    transition: 0.3s;
}
.custom-input:focus {
    border-color: #004aad;
    box-shadow: 0 0 5px rgba(0,74,173,0.3);
}

.upload-box {
    border: 2px dashed #004aad;
    border-radius: 15px;
    background-color: #f8f9fa;
    transition: 0.3s;
}
.upload-box:hover {
    background-color: #eef4ff;
}
</style>

<!-- SCRIPT UNTUK NAMPILIN NAMA FILE -->
<script>
document.getElementById('fotoInput').addEventListener('change', function(){
    let fileName = this.files[0]?.name;
    document.getElementById('fileName').innerText = fileName ?? '';
});
</script>

@endsection