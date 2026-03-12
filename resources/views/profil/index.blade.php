<h1>Profil Tim Developer</h1>

<ul>
@foreach($mahasiswa as $mhs)
<li>
{{ $mhs['nama'] }} - {{ $mhs['nim'] }}

<a href="{{ route('profil.show',$mhs['nim']) }}">
Lihat Profil
</a>

</li>
@endforeach
</ul>