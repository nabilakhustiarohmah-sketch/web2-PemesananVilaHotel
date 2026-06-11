<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Create Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 flex items-center justify-center min-h-screen">

<div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-8 m-4">

    <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">
        Create Account
    </h2>

    @if ($errors->any() && !$errors->has('captcha_error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-4 text-sm">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/register" class="space-y-4">
        @csrf

        <div>
            <input
                type="text"
                name="name"
                placeholder="Nama"
                value="{{ old('name') }}"
                required
                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-400">
        </div>

        <div>
            <input
                type="email"
                name="email"
                placeholder="Email"
                value="{{ old('email') }}"
                required
                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-400">
        </div>

        <div class="relative">
            <input
                id="password-input"
                type="password"
                name="password"
                placeholder="Password"
                required
                class="w-full border border-gray-300 rounded-xl pl-4 pr-12 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-400">
            
            <button 
                type="button" 
                id="toggle-password" 
                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-blue-600 focus:outline-none">
                
                <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

                <svg id="eye-closed" xmlns="http://www.w3.org/2000/xl" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M21.058 13.064c.715-.82 1.258-1.789 1.582-2.864A10.474 10.474 0 0 0 12 4.5c-1.325 0-2.583.245-3.745.692M9.25 9.25 14.75 14.75M2.25 2.25 21.75 21.75" />
                </svg>
            </button>
        </div>

        <div class="bg-gray-50 p-3 rounded-xl border border-gray-200">
            <label class="block text-gray-600 text-xs mb-2 font-medium text-center">
                Verifikasi Keamanan (Captcha)
            </label>

            @error('captcha_error')
                <div class="bg-red-50 border border-red-200 text-red-600 text-xs px-3 py-2 rounded-lg text-center mb-3 font-medium">
                    {{ $message }}
                </div>
            @enderror

            <div class="flex items-center space-x-3">
                @php
                    $num1 = rand(1, 9);
                    $num2 = rand(1, 9);
                    // Hasil disimpan di session server
                    Session::put('register_captcha', $num1 + $num2);
                @endphp
                <div class="bg-blue-600 text-white font-bold px-4 py-2 rounded-lg tracking-widest text-base select-none flex-shrink-0">
                    {{ $num1 }} + {{ $num2 }} = ?
                </div>
                <input
                    type="number"
                    name="captcha_answer"
                    placeholder="Hasil"
                    required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition duration-200 shadow-md">
            Register
        </button>
    </form>

    <p class="text-sm text-center mt-5 text-gray-600">
        Sudah punya akun?
        <a href="/login" class="text-blue-600 font-semibold hover:underline">
            Login
        </a>
    </p>

</div>

<script>
    const passwordInput = document.getElementById('password-input');
    const togglePasswordButton = document.getElementById('toggle-password');
    const eyeOpenIcon = document.getElementById('eye-open');
    const eyeClosedIcon = document.getElementById('eye-closed');

    togglePasswordButton.addEventListener('click', function () {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeOpenIcon.classList.add('hidden');
            eyeClosedIcon.classList.remove('hidden');
        } else {
            passwordInput.type = 'password';
            eyeOpenIcon.classList.remove('hidden');
            eyeClosedIcon.classList.add('hidden');
        }
    });
</script>

</body>
</html>