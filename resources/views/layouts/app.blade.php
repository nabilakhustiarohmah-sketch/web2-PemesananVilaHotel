<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'VilHo')</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-50 via-blue-100 to-blue-200 min-h-screen flex flex-col">

    {{-- ✅ Navbar --}}
    @include('partials.navbar')

    <main class="flex-grow container mx-auto px-6 py-10">
        
        {{-- ✅ Alert global --}}
        @include('partials.alert')

        {{-- ✅ Konten halaman --}}
        <div class="bg-white shadow-2xl rounded-3xl p-8">
            @yield('content')
        </div>

    </main>

    {{-- ✅ Footer --}}
    @include('partials.footer')

</body>
</html>