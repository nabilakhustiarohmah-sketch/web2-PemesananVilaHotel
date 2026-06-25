<div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition group">

    <div class="relative">
        <a href="{{ route('produk.show', $p->id) }}">
            <img src="{{ asset('images/' . ($p->foto_utama ?? $p->foto ?? 'default.jpg')) }}"
                 alt="{{ $p->nama }}"
                 class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-300">
        </a>

        {{-- Rating badge --}}
        <div class="absolute top-3 left-3 bg-white/90 backdrop-blur px-3 py-1 
                    rounded-full text-sm font-semibold shadow flex items-center gap-1">
            ⭐ 4.9
        </div>

        {{-- Hapus dari favorit --}}
        <form action="{{ route('favorite.toggle', $p->id) }}" method="POST"
              class="absolute top-3 right-3">
            @csrf
            <button type="submit"
                title="Hapus dari favorit"
                class="bg-pink-500 hover:bg-red-600 text-white w-9 h-9 rounded-full 
                       flex items-center justify-center shadow-lg transition-all duration-200 
                       hover:scale-110">
                ❤️
            </button>
        </form>
    </div>

    <div class="p-5">

        <h3 class="text-lg font-bold text-gray-800">{{ $p->nama }}</h3>

        <p class="text-gray-400 text-sm mt-1">
            {{ ucfirst($p->tipe) }} Premium
        </p>

        <p class="text-gray-500 text-sm mt-3">📍 {{ $p->lokasi }}</p>

        <div class="flex flex-wrap gap-2 mt-2">
            @foreach($p->tags as $tag)
                <span class="bg-blue-50 text-blue-600 text-xs px-2 py-1 rounded-full font-medium">
                    #{{ $tag->nama }}
                </span>
            @endforeach
        </div>

        <div class="mt-4 flex justify-between items-center">
            <div>
                <span class="text-blue-600 font-bold text-lg">
                    Rp {{ number_format($p->harga, 0, ',', '.') }}
                </span>
                <p class="text-xs text-gray-400">/ malam</p>
            </div>

            <a href="{{ route('produk.show', $p->id) }}"
               class="bg-blue-600 hover:bg-blue-700 text-white text-sm 
                      px-4 py-2 rounded-xl font-semibold transition">
                Lihat
            </a>
        </div>

    </div>
</div>