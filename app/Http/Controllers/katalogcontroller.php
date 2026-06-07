<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\FotoProduk;
use Illuminate\Http\Request;
use App\Models\Tag;

class KatalogController extends Controller
{
    // ================== HOME ==================
    public function home()
{
    $hotels = Produk::with('tags')
        ->where('kategori', 'hotel')
        ->latest()
        ->take(6)
        ->get();

    $villas = Produk::with('tags')
        ->where('kategori', 'villa')
        ->latest()
        ->take(6)
        ->get();

    $deskripsi = "Temukan hotel dan villa terbaik untuk liburanmu";

    return view('home', compact('hotels', 'villas', 'deskripsi'));
}

    // ================== LIST PRODUK ==================
public function index()
{
    $hotels = Produk::where('kategori', 'hotel')
        ->latest()
        ->get();

    $villas = Produk::where('kategori', 'villa')
        ->latest()
        ->get();

    return view('produk.index', compact('hotels', 'villas'));
}

    // ================== DETAIL ==================
    public function show($id)
    {
        $data = Produk::with('fotos', 'tags')->findOrFail($id);
    
        return view('Katalog.show', compact('data'));
    }

    // ================== FORM TAMBAH ==================
    public function create()
    {
        $tags = Tag::all();

        return view('tambah_produk', compact('tags'));
    }

    // ================== SIMPAN DATA ==================
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'kapasitas' => 'required',
            'harga' => 'required',
            'foto_utama' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // ================= SIMPAN PRODUK =================
        $produk = new Produk();

        $produk->nama = $request->nama;
        $produk->kategori = $request->kategori;
        $produk->lokasi = $request->lokasi;
        $produk->kapasitas = $request->kapasitas;
        $produk->harga = $request->harga;
        $produk->fasilitas = $request->fasilitas;
        $produk->tipe_kamar = $request->tipe_kamar;

        // ================= FOTO UTAMA =================
        $fotoUtama = $request->file('foto_utama');

        $namaUtama = time() . '_utama.' . $fotoUtama->getClientOriginalExtension();

        $fotoUtama->move(public_path('images'), $namaUtama);

        $produk->foto_utama = $namaUtama;

        $produk->save();

        // ================= TAG =================
        if ($request->tags) {

            $produk->tags()->sync($request->tags);

        }

        // ================= FOTO TAMBAHAN =================
        if ($request->hasFile('fotos')) {

            foreach ($request->file('fotos') as $file) {

                $namaFoto = time() . '_' . $file->getClientOriginalName();

                $file->move(public_path('images'), $namaFoto);

                FotoProduk::create([
                    'produk_id' => $produk->id,
                    'foto' => $namaFoto
                ]);
            }
        }

        return redirect('/produk')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    // ================== HAPUS ==================
    public function destroy($id)
    {
        $produk = Produk::with('fotos')->findOrFail($id);

        // hapus foto utama
        if (
            $produk->foto_utama &&
            file_exists(public_path('images/' . $produk->foto_utama))
        ) {
            unlink(public_path('images/' . $produk->foto_utama));
        }

        // hapus foto tambahan
        foreach ($produk->fotos as $foto) {

            if (
                $foto->foto &&
                file_exists(public_path('images/' . $foto->foto))
            ) {
                unlink(public_path('images/' . $foto->foto));
            }

            $foto->delete();
        }

        $produk->delete();

        return redirect('/produk')
            ->with('success', 'Produk berhasil dihapus');
    }

    // ================== HOTEL ==================
    public function hotel()
    {
        $hotels = Produk::with('tags')
                    ->where('kategori', 'hotel')
                    ->latest()
                    ->get();

        return view('hotel', compact('hotels'));
    }

    public function edit($id)
{
    $produk = Produk::findOrFail($id);

    $tags = Tag::all();

    return view('tambah_produk', compact('produk', 'tags'));
}

    // ================== VILLA ==================
    public function villa()
    {
        $villas = Produk::with('tags')
                    ->where('kategori', 'villa')
                    ->latest()
                    ->take(6)
                    ->get();

        return view('villa', compact('villas'));
    }

   public function search(Request $request)
{
    $query = Produk::with('tags');

    if ($request->lokasi) {
        $query->where('lokasi', 'like', '%' . $request->lokasi . '%');
    }

    if ($request->peserta) {
        $query->where('kapasitas', '>=', $request->peserta);
    }

    $hasil = $query->get();

    $hotels = $hasil->where('kategori', 'hotel');
    $villas = $hasil->where('kategori', 'villa');

    return view('Katalog.search', compact('hotels', 'villas'));
}
}