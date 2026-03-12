<h1>Katalog Hotel & Villa</h1>
<p>{{ $deskripsi }}</p>

<ul>
@foreach($produk as $p)
<li>
{{ $p['nama'] }} - Rp {{ $p['harga'] }}

<a href="{{ route('katalog.show',$p['id']) }}">
Lihat Detail
</a>

</li>
@endforeach
</ul>