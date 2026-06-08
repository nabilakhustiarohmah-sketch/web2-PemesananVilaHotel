<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'VilHo')</title>

    {{-- Contact --}}
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<script>
function toggleAvatarMenu() {
  const menu = document.getElementById('avatarMenu');
  menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
}

// Klik di luar → tutup menu
document.addEventListener('click', function(e) {
  const btn  = document.getElementById('avatarBtn');
  const menu = document.getElementById('avatarMenu');
  if (menu && btn && !btn.contains(e.target) && !menu.contains(e.target)) {
    menu.style.display = 'none';
  }
});
</script>

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

</a>
</body>
</html>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .floating-contact{
        position: fixed;
        right: 25px;
        bottom: 25px;

        width: 70px;
        height: 70px;

        background: #25D366;
        color: white;

        border-radius: 50%;

        display: flex;
        justify-content: center;
        align-items: center;

        text-decoration: none;
        font-size: 35px;

        box-shadow: 0 10px 25px rgba(0,0,0,.2);

        z-index: 9999;

        animation: float 3s ease-in-out infinite;
        transition: .3s;
    }

    .floating-contact:hover{
        transform: scale(1.1);
    }

    @keyframes float{
        0%{ transform: translateY(0); }
        50%{ transform: translateY(-10px); }
        100%{ transform: translateY(0); }
    }
</style>