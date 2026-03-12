<h1>Detail Profil</h1>

<p>NIM : {{ $nim }}</p>
<p>Nama : {{ $data['nama'] }}</p>
<p>Prodi : {{ $data['prodi'] }}</p>
<p>Semester : {{ $data['semester'] }}</p>

<h3>Keahlian</h3>

<ul>
@foreach($data['keahlian'] as $skill)
<li>{{ $skill }}</li>
@endforeach
</ul>