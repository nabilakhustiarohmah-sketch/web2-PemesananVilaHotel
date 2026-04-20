public function run()
{
    \App\Models\Produk::create([
        'nama' => 'Hotel Star 5',
        'harga' => 1999000,
        'foto' => 'Hotelstar5.jpg'
    ]);

    \App\Models\Produk::create([
        'nama' => 'Villa East Mountain',
        'harga' => 750000,
        'foto' => 'Villaeastmountain.jpg'
    ]);
}