<?php

namespace App\Http\Controllers;

class ProfilController extends Controller
{
    public function index()
    {
        $mahasiswa = [
            [
                'nama' => 'Nabila Khustia Rohmah',
                'nim' => '4124021',
                'prodi' => 'Sistem Informasi',
                'semester' => '4',
                'keahlian' => ['Routing Laravel','HTML','UI Design']
            ],
            [
                'nama' => 'Fauziyah Martha Aula',
                'nim' => '4124006',
                'prodi' => 'Sistem Informasi',
                'semester' => '4',
                'keahlian' => ['Blade View','UI Design']
            ],
            [
                'nama' => 'Muhammad Khobir Sastrawan',
                'nim' => '4124038',
                'prodi' => 'Sistem Informasi',
                'semester' => '4',
                'keahlian' => ['Testing','Dokumentasi']
            ]
        ];

        return view('profil.index', compact('mahasiswa'));
    }

    public function show($nim)
    {
        $mahasiswa = [
            '4124021' => [
                'nama' => 'Nabila Khustia Rohmah',
                'prodi' => 'Sistem Informasi',
                'semester' => '4',
                'keahlian' => ['Routing Laravel','HTML','UI Design']
            ],
            '4124006' => [
                'nama' => 'Fauziyah Martha Aula',
                'prodi' => 'Sistem Informasi',
                'semester' => '4',
                'keahlian' => ['Blade View','UI Design']
            ],
            '4124038' => [
                'nama' => 'Muhammad Khobir Satrawan',
                'prodi' => 'Sistem Informasi',
                'semester' => '4',
                'keahlian' => ['Testing','Dokumentasi']
            ]
        ];

        $data = $mahasiswa[$nim];

        return view('profil.show', compact('data','nim'));
    }
}