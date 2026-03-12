<h1>Profil Tim Developer</h1>

@foreach($mahasiswa as $mhs)

<h3>{{ $mhs['nama'] }}</h3>
<p>NIM : {{ $mhs['nim'] }}</p>
<p>Prodi : {{ $mhs['prodi'] }}</p>
<p>Semester : {{ $mhs['semester'] }}</p>

<h4>Keahlian</h4>
<ul>
@foreach($mhs['keahlian'] as $skill)
<li>{{ $skill }}</li>
@endforeach
</ul>

<hr>

@endforeach