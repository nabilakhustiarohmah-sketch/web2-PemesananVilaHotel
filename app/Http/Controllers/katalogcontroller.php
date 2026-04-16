<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // Memanggil model Produk agar bisa akses database

class KatalogController extends Controller
{
    /**
     * Menampilkan semua produk dari database ke halaman katalog
     */
    public function index() 
{
    $produks = \App\Models\Produk::all(); 
    return view('produk.index', compact('produks'));
}
    /**
     * Menampilkan detail produk berdasarkan ID
     */
    public function show($id)
    {
        // Mencari data di database berdasarkan ID, jika tidak ada akan error 404
        $data = Produk::findOrFail($id);

        return view('Katalog.show', compact('data'));
    }

    /**
     * Menampilkan halaman form tambah produk
     */
    public function create()
    {
        // Mengarahkan ke file resources/views/tambah_produk.blade.php
        return view('tambah_produk');
    }

    /**
     * Menyimpan data produk baru ke database
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama'  => 'required',
            'harga' => 'required|numeric',
            'foto'  => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Logika Upload Foto
        $namaFile = null;
        if($request->hasFile('foto')){
            $namaFile = time().'.'.$request->foto->extension();  
            $request->foto->move(public_path('images'), $namaFile);
        }

        // 3. Simpan ke Database (PASTIKAN TIDAK ADA TANDA // DI DEPAN)
        Produk::create([
            'nama'  => $request->nama,
            'harga' => $request->harga,
            'foto'  => $namaFile
        ]);

        // 4. Redirect kembali ke halaman produk dengan pesan sukses
        return redirect('/produk')->with('success', 'Data berhasil ditambahkan!');
    }

    public function destroy($id)
{
    // 1. Cari data produknya
    $produk = Produk::findOrFail($id);

    // 2. Hapus file foto dari folder public/images (jika ada)
    if ($produk->foto && file_exists(public_path('images/' . $produk->foto))) {
        unlink(public_path('images/' . $produk->foto));
    }

    // 3. Hapus data dari database
    $produk->delete();

    // 4. Kembali ke halaman katalog dengan pesan sukses
    return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
}
}