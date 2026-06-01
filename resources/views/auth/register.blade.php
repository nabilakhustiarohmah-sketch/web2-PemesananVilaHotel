<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 flex items-center justify-center min-h-screen">

<div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-8">

    <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">
        Create Account
    </h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/register" class="space-y-4">
        @csrf

        <input
            type="text"
            name="name"
            placeholder="Nama"
            value="{{ old('name') }}"
            class="w-full border rounded-xl px-4 py-3">

        <input
            type="email"
            name="email"
            placeholder="Email"
            value="{{ old('email') }}"
            class="w-full border rounded-xl px-4 py-3">

        <input
            type="password"
            name="password"
            placeholder="Password"
            class="w-full border rounded-xl px-4 py-3">

        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700">
            Register
        </button>
    </form>

    <p class="text-sm text-center mt-4">
        Sudah punya akun?
        <a href="/login" class="text-blue-600 font-semibold">
            Login
        </a>
    </p>

</div>

</body>
</html>