<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function tambah(Request $request)
    {
        // Validasi input
        $request->validate([
            'foto' => 'nullable|mimes:png,jpeg,jpg|max:10240',
        ], [
            'foto.mimes' => 'Foto harus berformat PNG/JPG/JPEG',
            'foto.max' => 'Foto tidak boleh lebih dari 10 MB.',
        ]);

        // Ambil nilai kategori dari Request
        $pengumuman      = $request->input('pengumuman');
        $ket             = $request->input('ket');
        // Ambil file yang diunggah
        $file = $request->file('foto');

        // Simpan file di folder public/images dengan nama yang unik
        $filePath = $file->storeAs('public/img/pengumuman', $file->getClientOriginalName());

        // Ubah path foto agar sesuai dengan path asset
        $filePath = str_replace('public/', 'storage/', $filePath);


        // Simpan data ke dalam tabel kategori_beritas
        $foto = new Pengumuman();
        $foto->pengumuman = $pengumuman;
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
            'foto.mimes' => 'Foto harus berformat PNG/JPG/JPEG.',
            'foto.max' => 'Foto tidak boleh lebih dari 10 MB.',
        ]);

        $foto           = Pengumuman::find($id);
        $pengumuman     = $request->input('pengumuman');
        $ket            = $request->input('ket');

        // Lakukan validasi input yang diterima

        if ($request->hasFile('foto')) {
            // Ambil file yang diunggah
            $file = $request->file('foto');
            $filePath = $file->storeAs('public/img/pengumuman', $file->getClientOriginalName());
            // Ubah path foto agar sesuai dengan path asset
            $filePath = str_replace('public/', 'storage/', $filePath);
            $foto->foto = $filePath;
        }

        // Ubah data lain yang ingin diubah
        $foto->pengumuman    = $pengumuman;
        $foto->ket           = $ket;
        $foto->save();

        return back()->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy($id)
    {
        // Ambil data berdasarkan ID
        $foto = Pengumuman::findOrFail($id);

        // Hapus data dari database
        $foto->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }
}
