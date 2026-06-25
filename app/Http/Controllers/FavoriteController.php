<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())
            ->with('produk.tags')
            ->get()
            ->pluck('produk');

        return view('favorite.index', compact('favorites'));
    }

    public function toggle($id)
    {
        $favorite = Favorite::where('user_id', Auth::id())
            ->where('produk_id', $id)
            ->first();

        if ($favorite) {
            $favorite->delete();
        } else {
            Favorite::create([
                'user_id' => Auth::id(),
                'produk_id' => $id,
            ]);
        }

        return back();
    }
}