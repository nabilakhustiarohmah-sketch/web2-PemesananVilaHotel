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

            <div>
                <label class="text-sm text-gray-600">Password</label>

                <div class="relative mt-1">
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                        class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                    >
                    
                    <button
                        type="button"
                        id="togglePassword"
                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-blue-600 focus:outline-none"
                    >
                        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>

                        <svg id="eyeClose" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex justify-end text-sm">
                <a href="/forgot-password" class="text-blue-600 hover:underline">
                    Lupa Password?
                </a>
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition duration-300 shadow-lg hover:shadow-xl">
                Login
            </button>

        </form>

        <div class="text-center mt-6">
            <p class="text-gray-600">
                Belum punya akun?
                <a href="/register" class="text-blue-600 font-semibold hover:underline">
                    Register
                </a>
            </p>
        </div>

    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const togglePasswordButton = document.getElementById('togglePassword');
        const eyeOpenIcon = document.getElementById('eyeOpen');
        const eyeCloseIcon = document.getElementById('eyeClose');

        togglePasswordButton.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpenIcon.classList.add('hidden');
                eyeCloseIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeOpenIcon.classList.remove('hidden');
                eyeCloseIcon.classList.add('hidden');
            }
        });
    </script>

</body>
</html>