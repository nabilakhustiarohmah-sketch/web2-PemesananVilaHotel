<?php

namespace App\Http\Controllers;

class ProfilController extends Controller
{
    public function index()
    {
        $nama = "Nabila Khustia Rohmah";
        $nim = "4124021";
        $prodi = "Sistem Informasi";
        $semester = "4";
        $keahlian = ["Routing Laravel", "HTML", "UI Design"];

        return view('profil', compact('nama', 'nim', 'prodi', 'semester', 'keahlian'));
    }

    public function show($id)
    {
        return "Menampilkan profil mahasiswa dengan NIM: " . $nim;
    }
}
