<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class KatalogController extends Controller
{
    // ================== KATALOG ==================
    public function index() 
    {
        $produks = Produk::all(); 
        return view('produk.index', compact('produks'));
    }

    // ================== DETAIL ==================
    public function show($id)
    {
        $data = Produk::findOrFail($id);
        return view('Katalog.show', compact('data'));
    }

    // ================== FORM TAMBAH ==================
    public function create()
    {
        return view('tambah_produk');
    }

    // ================== SIMPAN ==================
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required',
            'harga' => 'required|numeric',
            'foto'  => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $namaFile = null;
        if ($request->hasFile('foto')) {
            $namaFile = time().'.'.$request->foto->extension();  
            $request->foto->move(public_path('images'), $namaFile);
        }

        Produk::create([
            'nama'  => $request->nama,
            'harga' => $request->harga,
            'foto'  => $namaFile
        ]);

        return redirect('/produk')->with('success', 'Data berhasil ditambahkan!');
    }

    // ================== HAPUS ==================
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->foto && file_exists(public_path('images/' . $produk->foto))) {
            unlink(public_path('images/' . $produk->foto));
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }

    // ================== HOME ==================
    public function home()
    {
        $produks = Produk::latest()->take(3)->get();
        return view('home', compact('produks'));
    }
}