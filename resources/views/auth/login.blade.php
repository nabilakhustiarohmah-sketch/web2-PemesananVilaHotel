<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Account</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-200 via-blue-100 to-blue-300 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md p-8 bg-white/90 backdrop-blur-md rounded-3xl shadow-2xl">

        <!-- Logo -->
        <div class="flex justify-center mb-4">
            <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-10 w-10 text-white"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5.121 17.804A9 9 0 1118.88 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </div>

        <!-- Title -->
        <h2 class="text-3xl font-bold text-center text-blue-600">
            Welcome Back
        </h2>

        <p class="text-center text-gray-500 mb-6">
            Login ke akun Anda
        </p>

        @if(session('error'))
            <div class="bg-red-100 text-red-600 text-sm p-3 rounded-lg mb-4 text-center">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label class="text-sm text-gray-600">Email</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan email"
                    required
                    class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                >
            </div>

            <!-- Password -->
            <div>
                <label class="text-sm text-gray-600">Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                    class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                >
            </div>

            <!-- Remember -->
            <div class="flex justify-between items-center text-sm">

                <label class="flex items-center gap-2">
                    <input type="checkbox" class="accent-blue-600">
                    Remember me
                </label>

                <a href="/forgot-password" class="text-blue-600 hover:underline">
                    Lupa Password?
                </a>

            </div>

            <!-- Button Login -->
            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition duration-300 shadow-lg hover:shadow-xl">

                Login

            </button>

        </form>

        <!-- Register -->
        <div class="text-center mt-6">

            <p class="text-gray-600">
                Belum punya akun?

                <a href="/register"
                   class="text-blue-600 font-semibold hover:underline">
                    Register
                </a>

            </p>

        </div>

    </div>

</body>
</html>