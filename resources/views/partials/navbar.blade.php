<nav class="bg-gradient-to-r from-blue-900 to-blue-600 text-white shadow-lg">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <h1 class="text-2xl font-bold tracking-wide">
            BlueStay
        </h1>

        <!-- Menu Desktop -->
        <div class="hidden md:flex space-x-6 font-medium">
            <a href="/" class="hover:text-blue-200 transition">Home</a>

            <a href="{{ route('produk.index') }}"
               class="hover:text-blue-200 transition">
               Produk
            </a>

            <a href="#" class="hover:text-blue-200 transition">About</a>
            <a href="#" class="hover:text-blue-200 transition">Contact</a>
        </div>

    </div>
</nav>