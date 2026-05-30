<nav class="bg-gradient-to-r from-blue-900 to-blue-600 text-white shadow-lg">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <h1 class="text-2xl font-bold tracking-wide">
            VilHo
        </h1>

        <!-- Menu Desktop -->
        <div class="hidden md:flex items-center space-x-6 font-medium">
            <a href="{{ route('home') }}" class="hover:text-blue-200 transition">Home</a>

            <a href="{{ route('produk.index') }}"
               class="hover:text-blue-200 transition">
               Produk
            </a>

            <!-- FIXED -->
            <a href="{{ url('/about') }}" class="hover:text-blue-200 transition">
                About
            </a>

            <a href="#" class="hover:text-blue-200 transition">Contact</a>

            <!-- CTA -->
            <a href="{{ route('produk.create') }}"
                class="bg-white text-blue-700 px-4 py-2 rounded-lg font-semibold hover:bg-blue-100 transition">
                + Tambah Produk
            </a>

@auth
  {{-- Avatar dropdown tanpa Alpine.js --}}
  <div class="relative" style="position:relative;">
    <button onclick="toggleAvatarMenu()" id="avatarBtn"
      class="w-9 h-9 rounded-full bg-yellow-400 text-yellow-900 font-semibold text-sm flex items-center justify-center border-2 border-white">
      {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
    </button>

    <div id="avatarMenu"
      style="display:none; position:absolute; right:0; top:44px; width:176px; background:white; border:1px solid #e5e7eb; border-radius:12px; padding:4px; z-index:50; box-shadow:0 4px 16px rgba(0,0,0,0.08);">
      <a href="{{ route('profile') }}"
        style="display:flex; align-items:center; gap:8px; padding:8px 12px; font-size:13px; color:#374151; text-decoration:none; border-radius:8px;"
        onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='transparent'">
        Profil Saya
      </a>
      <hr style="margin:4px 0; border:none; border-top:1px solid #f3f4f6;">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
          style="width:100%; text-align:left; display:flex; align-items:center; gap:8px; padding:8px 12px; font-size:13px; color:#dc2626; background:none; border:none; cursor:pointer; border-radius:8px;"
          onmouseover="this.style.background='#fff5f5'" onmouseout="this.style.background='transparent'">
          Logout
        </button>
      </form>
    </div>
  </div>
@else
  <a href="{{ route('login') }}"
    class="border border-white text-white px-4 py-2 rounded-lg text-sm hover:bg-white hover:text-blue-600 transition">
    Login
  </a>
@endauth
        </div>

        <!-- Mobile Button -->
        <button id="menuBtn" class="md:hidden text-2xl">
            ☰
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden px-6 pb-4 space-y-2">
        <a href="{{ route('home') }}" class="block">Home</a>

        <a href="{{ route('produk.index') }}" class="block">
            Produk
        </a>

        <!-- FIXED -->
        <a href="{{ url('/about') }}" class="block">
            About
        </a>

        <a href="#" class="block">Contact</a>

        <a href="{{ route('produk.create') }}"
           class="block bg-white text-blue-700 px-3 py-2 rounded">
           + Tambah Produk
        </a>

    </div>
</nav>

<script>
document.getElementById('menuBtn').addEventListener('click', function() {
    document.getElementById('mobileMenu').classList.toggle('hidden');
});
</script>