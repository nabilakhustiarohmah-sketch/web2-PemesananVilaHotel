<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/profile');
        }

        return back()->with('error', 'Login gagal');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // 1. Validasi input standar
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'captcha_answer' => 'required|numeric',
        ]);

        // 2. Logika Utama Validasi Captcha Matematika
        if (intval($request->input('captcha_answer')) !== session('register_captcha')) {
            
            // Gagalkan pendaftaran, kembalikan data input kecuali password, lempar error khusus
            return back()
                ->withInput($request->only('name', 'email'))
                ->withErrors(['captcha_error' => 'Hasil hitungan salah! Silakan hitung angka baru di bawah ini.']);
        }

        // 3. Jika jawaban benar, eksekusi pembuatan akun baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')
            ->with('success', 'Registrasi berhasil, silakan login');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}