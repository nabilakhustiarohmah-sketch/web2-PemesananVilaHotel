<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lupa Password</title>

<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-100 min-h-screen flex items-center justify-center">

<div class="bg-white p-8 rounded-3xl shadow-xl w-full max-w-md">

    <h2 class="text-3xl font-bold text-center text-blue-600 mb-2">
        Lupa Password
    </h2>

    <p class="text-center text-gray-500 mb-6">
        Masukkan email Anda
    </p>

    <div id="emailSection">

        <input
            type="email"
            id="email"
            placeholder="Masukkan Email"
            class="w-full border rounded-xl p-3 mb-4"
        >

        <button
            onclick="sendOTP()"
            class="w-full bg-blue-600 text-white py-3 rounded-xl"
        >
            Kirim Kode OTP
        </button>

    </div>

    <div id="otpSection" class="hidden">

        <input
            type="text"
            id="otp"
            placeholder="Masukkan OTP"
            class="w-full border rounded-xl p-3 mb-4"
        >

        <button
            onclick="verifyOTP()"
            class="w-full bg-green-600 text-white py-3 rounded-xl"
        >
            Verifikasi OTP
        </button>

    </div>

    <div id="resetSection" class="hidden">

        <input
            type="password"
            id="newPassword"
            placeholder="Password Baru"
            class="w-full border rounded-xl p-3 mb-4"
        >

        <button
            onclick="savePassword()"
            class="w-full bg-purple-600 text-white py-3 rounded-xl"
        >
            Simpan Password
        </button>

    </div>

    <div class="text-center mt-4">
        <a href="/login" class="text-blue-600">
            Kembali ke Login
        </a>
    </div>

</div>

<script>

let generatedOTP = "";

function sendOTP(){

    generatedOTP =
        Math.floor(100000 + Math.random() * 900000);

    alert(
        "Simulasi OTP berhasil dikirim.\nKode OTP: "
        + generatedOTP
    );

    document.getElementById('emailSection')
            .classList.add('hidden');

    document.getElementById('otpSection')
            .classList.remove('hidden');
}

function verifyOTP(){

    let otp =
        document.getElementById('otp').value;

    if(otp == generatedOTP){

        alert("OTP Benar");

        document.getElementById('otpSection')
                .classList.add('hidden');

        document.getElementById('resetSection')
                .classList.remove('hidden');

    }else{
        alert("OTP Salah");
    }
}

function savePassword(){

    alert("Password berhasil diubah");

    window.location.href='/login';
}

</script>

</body>
</html>