<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- WAJIB IMPORT INI

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profil.index', compact('user'));
    }
}