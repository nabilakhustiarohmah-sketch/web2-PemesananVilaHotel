<nav class="bg-gradient-to-r from-blue-900 to-blue-600 text-white shadow-lg">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <h1 class="text-2xl font-bold tracking-wide">
            VilHo
        </h1>

        <!-- Menu Desktop -->
        <div class="hidden md:flex items-center space-x-6 font-medium">
            <a href="{{ route('home') }}" class="hover:text-blue-200 transition">Rumah</a>

            <a href="{{ route('produk.index') }}"
               class="hover:text-blue-200 transition">
               Produk
            </a>

        @auth

        @if(auth()->user()->role === 'admin')

            <a href="{{ route('booking.admin') }}"
            class="hover:text-blue-200 transition">
                Pesanan Masuk
            </a>

        @else

            <a href="{{ route('booking.history') }}"
            class="hover:text-blue-200 transition">
                Riwayat
            </a>

        @endif

@endauth

<!-- FIXED -->
<a href="{{ url('/about') }}" class="hover:text-blue-200 transition">
    About
</a>

<!-- CTA -->
@auth

    @if(auth()->user()->role === 'admin')
        <a href="{{ route('produk.create') }}"
            class="bg-white text-blue-700 px-4 py-2 rounded-lg font-semibold hover:bg-blue-100 transition">
            + Tambah Produk
        </a>
    @endif

    <!-- FAVORITE -->
    <a href="{{ route('favorit.index') }}"
       class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center hover:bg-red-500 transition"
       title="Favorit">
        <i class="fas fa-heart text-white"></i>
    </a>

    <div class="relative">

        {{-- Avatar --}}
        @if(auth()->user()->role === 'admin')
            <button id="avatarBtn" onclick="toggleAvatarMenu()"
                class="w-10 h-10 rounded-full border-2 border-white flex items-center justify-center font-semibold text-sm bg-red-400 text-red-900">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </button>
        @else
            <button id="avatarBtn" onclick="toggleAvatarMenu()"
                class="w-10 h-10 rounded-full border-2 border-white flex items-center justify-center font-semibold text-sm bg-yellow-400 text-yellow-900">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </button>
        @endif

        {{-- Dropdown Menu --}}
        <div
            id="avatarMenu"
            class="hidden absolute right-0 top-12 w-52 bg-white border border-gray-200 rounded-xl shadow-lg z-50">

            <div class="px-4 py-3 border-b">

                <p class="font-semibold text-gray-800 text-sm">
                    {{ auth()->user()->name }}
                </p>

                @if(auth()->user()->role === 'admin')
                    <span class="inline-block mt-1 text-xs px-2 py-1 rounded-full bg-red-100 text-red-600">
                        Admin
                    </span>
                @else
                    <span class="inline-block mt-1 text-xs px-2 py-1 rounded-full bg-blue-100 text-blue-600">
                        User
                    </span>
                @endif

            </div>

            <div class="p-2">

                @if(auth()->user()->role === 'admin')

                    <a href="{{ route('profile') }}"
                       class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 rounded-lg hover:bg-gray-100 transition">
                        👑 Profil Admin
                    </a>

                @else

                    <a href="{{ route('profile') }}"
                       class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 rounded-lg hover:bg-gray-100 transition">
                        👤 Profil Saya
                    </a>

                @endif

                <hr class="my-2">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="w-full flex items-center gap-2 px-3 py-2 text-sm text-red-600 rounded-lg hover:bg-red-50 transition">
                        🚪 Logout
                    </button>

                </form>

            </div>

        </div>

    </div>

@else

    <a href="{{ route('login') }}"
       class="border border-white text-white px-4 py-2 rounded-lg text-sm hover:bg-white hover:text-blue-600 transition">
        Login
    </a>

@endauth

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden px-6 pb-4 space-y-2">
        <a href="{{ route('home') }}" class="block">Rumah</a>

        <a href="{{ route('produk.index') }}" class="block">
            Produk
        </a>

        <a href="{{ route('booking.history') }}" class="block">
            Riwayat
        </a>
       
<!-- FIXED -->
<a href="{{ url('/about') }}" class="block">
    About
</a>

@auth
<a href="{{ route('favorit.index') }}" class="block">
    ❤️ Favorit
</a>
@endauth


<!-- CTA -->
@auth
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('produk.create') }}"
            class="bg-white text-blue-700 px-4 py-2 rounded-lg font-semibold hover:bg-blue-100 transition">
            + Tambah Produk
        </a>
    @endif
@endauth

    </div>
</nav>

<script>
document.getElementById('menuBtn').addEventListener('click', function() {
    document.getElementById('mobileMenu').classList.toggle('hidden');
});
</script>