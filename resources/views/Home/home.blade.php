<div style="background: url('{{ asset('images/1776693635.jpg') }}') center/cover no-repeat; height: 350px; position: relative;">
    <div style="background: rgba(0,0,0,0.5); height:100%; display:flex; align-items:center; justify-content:center; flex-direction:column; color:white;">
        
        <h1 class="mb-3">Temukan Hotel & Villa Terbaik</h1>
        <p class="mb-4">Cari tempat menginap dengan mudah</p>

        <form method="GET" action="{{ route('katalog.index') }}" style="display:flex; gap:10px;">
            <input type="text" name="search" placeholder="Cari hotel atau lokasi..." 
                style="padding:10px; width:250px; border-radius:8px; border:none;">

            <button type="submit" 
                style="background:#007bff; color:white; border:none; padding:10px 20px; border-radius:8px;">
                Cari
            </button>
        </form>

    </div>
</div>