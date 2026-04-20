<nav class="bg-gradient-to-r from-blue-900 to-blue-600 text-white shadow-lg">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <h1 class="text-2xl font-bold tracking-wide">
            VilHo
        </h1>

        <!-- Menu Desktop -->
        <div class="hidden md:flex items-center space-x-6 font-medium">
            <a href="/" class="hover:text-blue-200 transition">Home</a>

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
        </div>

        <!-- Mobile Button -->
        <button id="menuBtn" class="md:hidden text-2xl">
            ☰
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden px-6 pb-4 space-y-2">
        <a href="/" class="block">Home</a>

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