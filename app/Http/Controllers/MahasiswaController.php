<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        // Mengambil semua data mahasiswa
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        // Menampilkan formulir untuk menambah mahasiswa
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama_lengkap' => 'required',
            'jurusan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required',
            'email' => 'required|email',
            'alamat_tinggal' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menyimpan data mahasiswa
        $mahasiswa = new Mahasiswa($request->all());

        // Menyimpan foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $mahasiswa->foto = $filename;
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    public function show($id)
    {
        // Menampilkan detail mahasiswa
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit($id)
    {
        // Menampilkan formulir untuk mengedit mahasiswa
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $id,
            'nama_lengkap' => 'required',
            'jurusan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required',
            'email' => 'required|email',
            'alamat_tinggal' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Foto tidak wajib saat update
        ]);

        // Mengupdate data mahasiswa
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->fill($request->except('foto')); // Mengisi data kecuali foto

        // Menyimpan foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($mahasiswa->foto) {
                unlink(public_path('uploads/' . $mahasiswa->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $mahasiswa->foto = $filename;
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diupdate!');
    }

    public function destroy($id)
    {
        // Menghapus data mahasiswa
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Hapus foto jika ada
        if ($mahasiswa->foto) {
            unlink(public_path('uploads/' . $mahasiswa->foto));
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus!');
    }
}