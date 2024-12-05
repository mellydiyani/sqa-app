<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <h1>Detail Mahasiswa</h1>

    <p>NIM: {{ $mahasiswa->nim }}</p>
    <p>Nama Lengkap: {{ $mahasiswa->nama_lengkap }}</p>
    <p>Jurusan: {{ $mahasiswa->jurusan }}</p>
    <p>Tempat Lahir: {{ $mahasiswa->tempat_lahir }}</p>
    <p>Tanggal Lahir: {{ $mahasiswa->tanggal_lahir }}</p>
    <p>No HP: {{ $mahasiswa->no_hp }}</p>
    <p>Email: {{ $mahasiswa->email }}</p>
    <p>Alamat Tinggal: {{ $mahasiswa->alamat_tinggal }}</p>
    <p>Foto: <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="Foto" width="100"></p>
</body>
</html>