<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // LOGIN FORM
    public function loginForm()
    {
        return view('auth.login');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/profile');
        }

        return back()->with('error', 'Login gagal');
    }

    // REGISTER FORM (Fungsi yang tadi hilang)
    public function registerForm()
    {
        return view('auth.register');
    }

    // PROSES REGISTER (Setingan khusus untuk tes error database)
    public function register(Request $request)
    {
        // Matikan validasi dulu untuk sementara biar kita tahu macetnya di mana
        /*
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        */

        // Paksa simpan data ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Berhenti di sini untuk melihat apakah data berhasil di-generate
        dd($user); 
    }

    // LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}