<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h1>Edit Mahasiswa</h1>

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="nim">NIM:</label>
        <input type="text" name="nim" value="{{ $mahasiswa->nim }}" required>
        <br>

        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" value="{{ $mahasiswa->nama_lengkap }}" required>
        <br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" value="{{ $mahasiswa->jurusan }}" required>
        <br>

        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" name="tempat_lahir" value="{{ $mahasiswa->tempat_lahir }}" required>
        <br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" value="{{ $mahasiswa->tanggal_lahir }}" required>
        <br>

        <label for="no_hp">No HP:</label>
        <input type="text" name="no_hp" value="{{ $mahasiswa->no_hp }}" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $mahasiswa->email }}" required>
        <br>

        <label for="alamat_tinggal">Alamat Tinggal:</label>
        <textarea name="alamat_tinggal" required>{{ $mahasiswa->alamat_tinggal }}</textarea>
        <br>

        <label for="foto">Foto:</label>
        <input type="file" name="foto">
        <br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>