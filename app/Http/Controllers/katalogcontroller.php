<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class KatalogController extends Controller
{
    // ================== HOME ==================
    public function home()
    {
        $hotels = Produk::where('kategori', 'Hotel')
            ->latest()
            ->take(6)
            ->get();

        $villas = Produk::where('kategori', 'Villa')
            ->latest()
            ->take(6)
            ->get();

        $deskripsi = "Temukan hotel dan villa terbaik untuk liburanmu";

        return view('home', compact('hotels', 'villas', 'deskripsi'));
    }

    // ================== LIST PRODUK ==================
    public function index()
    {
        $hotels = Produk::where('kategori', 'Hotel')
            ->latest()
            ->get();

        $villas = Produk::where('kategori', 'Villa')
            ->latest()
            ->get();

        return view('produk.index', compact('hotels', 'villas'));
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

    // ================== SIMPAN DATA ==================
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'kategori' => 'required',
        'lokasi' => 'required',
        'kapasitas' => 'required|numeric',
        'harga' => 'required|numeric',
        'foto_utama' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // ================= SIMPAN DATA =================
    $data = new Produk();

    $data->nama = $request->nama;
    $data->kategori = $request->kategori;
    $data->lokasi = $request->lokasi;
    $data->kapasitas = $request->kapasitas;
    $data->harga = $request->harga;

    // ================= FOTO UTAMA =================
    $fotoUtama = $request->file('foto_utama');
    $namaUtama = time().'_utama.'.$fotoUtama->getClientOriginalExtension();
    $fotoUtama->move(public_path('images'), $namaUtama);

    $data->foto_utama = $namaUtama;

    // ================= FOTO TAMBAHAN =================
    if ($request->hasFile('foto1')) {
        $foto1 = $request->file('foto1');
        $nama1 = time().'1.'.$foto1->getClientOriginalExtension();
        $foto1->move(public_path('images'), $nama1);
        $data->foto1 = $nama1;
    }

    if ($request->hasFile('foto2')) {
        $foto2 = $request->file('foto2');
        $nama2 = time().'2.'.$foto2->getClientOriginalExtension();
        $foto2->move(public_path('images'), $nama2);
        $data->foto2 = $nama2;
    }

    if ($request->hasFile('foto3')) {
        $foto3 = $request->file('foto3');
        $nama3 = time().'3.'.$foto3->getClientOriginalExtension();
        $foto3->move(public_path('images'), $nama3);
        $data->foto3 = $nama3;
    }

    $data->save();

    return redirect('/produk')->with('success', 'Produk berhasil ditambahkan');
}
    // ================== HAPUS ==================
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        // hapus foto utama
        if ($produk->foto_utama && file_exists(public_path('uploads/' . $produk->foto_utama))) {
            unlink(public_path('uploads/' . $produk->foto_utama));
        }

        // hapus foto tambahan
        foreach (['foto1', 'foto2', 'foto3'] as $foto) {
            if ($produk->$foto && file_exists(public_path('uploads/' . $produk->$foto))) {
                unlink(public_path('uploads/' . $produk->$foto));
            }
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }

    // ================== HOTEL ==================
    public function hotel()
    {
        $hotels = Produk::where('kategori', 'Hotel')
            ->latest()
            ->get();

        return view('hotel', compact('hotels'));
    }

    // ================== VILLA ==================
    public function villa()
    {
        $villas = Produk::where('kategori', 'Villa')
            ->latest()
            ->get();

        return view('villa', compact('villas'));
    }
}