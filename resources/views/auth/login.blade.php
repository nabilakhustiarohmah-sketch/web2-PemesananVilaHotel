<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 flex items-center justify-center min-h-screen">

<div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-8">

    <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">
        Login Account
    </h2>

    @if(session('error'))
        <p class="text-red-500 text-sm text-center mb-3">
            {{ session('error') }}
        </p>
    @endif

    <form method="POST" action="/login" class="space-y-4">
        @csrf

        <input type="email" name="email" placeholder="Email"
               class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-400">

        <input type="password" name="password" placeholder="Password"
               class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-400">

        <button class="w-full bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700">
            Login
        </button>
    </form>

    <p class="text-sm text-center mt-4">
        Belum punya akun?
        <a href="/register" class="text-blue-600 font-semibold">Register</a>
    </p>

</div>

</body>
</html>