<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function tambah(Request $request)
    {
        // Validasi input
        $request->validate([
            'foto' => 'nullable|mimes:png,jpeg,jpg|max:10240',
        ], [
            'judul.unique' => 'Judul berita sudah ada, mohon masukkan Judul berita yang berbeda.',
            'foto.mimes' => 'Foto harus berformat PNG/JPG/JPEG',
            'foto.max' => 'Foto tidak boleh lebih dari 10 MB.',
        ]);

        // Ambil nilai kategori dari Request
        $ket      = $request->input('ket');
        // Ambil file yang diunggah
        $file = $request->file('foto');

        // Simpan file di folder public/images dengan nama yang unik
        $filePath = $file->storeAs('public/img/foto', $file->getClientOriginalName());

        // Ubah path foto agar sesuai dengan path asset
        $filePath = str_replace('public/', 'storage/', $filePath);


        // Simpan data ke dalam tabel kategori_beritas
        $foto = new Foto();
        $foto->ket = $ket;
        $foto->foto = $filePath;
        $foto->save();

        return back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'foto' => 'nullable|mimes:png,jpeg,jpg|max:10240',
        ], [
            'judul.unique' => 'Judul berita sudah ada, mohon masukkan Judul berita yang berbeda.',
            'foto.mimes' => 'Foto harus berformat PNG/JPG/JPEG.',
            'foto.max' => 'Foto tidak boleh lebih dari 10 MB.',
        ]);

        $foto = Foto::find($id);
        $ket      = $request->input('ket');

        // Lakukan validasi input yang diterima

        if ($request->hasFile('foto')) {
            // Ambil file yang diunggah
            $file = $request->file('foto');
            $filePath = $file->storeAs('public/img/foto', $file->getClientOriginalName());
            // Ubah path foto agar sesuai dengan path asset
            $filePath = str_replace('public/', 'storage/', $filePath);
            $foto->foto = $filePath;
        }

        // Ubah data lain yang ingin diubah
        $foto->ket      = $ket;
        $foto->save();

        return back()->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy($id)
    {
        // Ambil data berdasarkan ID
        $foto = Foto::findOrFail($id);

        // Hapus data dari database
        $foto->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }
}
