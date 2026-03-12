<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
public function index()
{
    $mahasiswa = [
        [
            'nama' => "Nabila Khustia Rohmah",
            'nim' => "4124021",
            'prodi' => "Sistem Informasi",
            'semester' => "4",
            'keahlian' => ["Routing Laravel", "HTML", "UI Design"]
        ],
        [
            'nama' => "Fauziyah Martha Aula",
            'nim' => "4124006",
            'prodi' => "Sistem Informasi",
            'semester' => "4",
            'keahlian' => ["Html", "UI Design"]
        ]
    ];

    return view('profil.index', compact('mahasiswa'));
}

public function show($nim)
{
    $profilData = [
        '4124021' => [
            'nama' => "Nabila Khustia Rohmah",
            'prodi' => "Sistem Informasi",
            'semester' => "4",
            'keahlian' => ["Routing Laravel", "HTML", "UI Design"]
        ],
        '4124006' => [
            'nama' => "Fauziyah Martha Aula",
            'prodi' => "Sistem Informasi",
            'semester' => "4",
            'keahlian' => ["Html", "UI Design"]
        ]
    ];

    $data = $profilData[$nim] ?? null;

    if (!$data) {
        abort(404);
    }

    return view('profil.show', compact('data','nim'));
}
}