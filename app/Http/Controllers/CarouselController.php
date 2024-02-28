<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
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
        $judul      = $request->input('judul');
        $ket        = $request->input('ket');
        // Ambil file yang diunggah
        $file = $request->file('foto');

        // Simpan file di folder public/images dengan nama yang unik
        $filePath = $file->storeAs('public/img/carousel', $file->getClientOriginalName());

        // Ubah path foto agar sesuai dengan path asset
        $filePath = str_replace('public/', 'storage/', $filePath);


        // Simpan data ke dalam tabel kategori_beritas
        $foto = new Carousel();
        $foto->judul = $judul;
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

        $foto     = Carousel::find($id);
        $judul    = $request->input('judul');
        $ket      = $request->input('ket');

        // Lakukan validasi input yang diterima

        if ($request->hasFile('foto')) {
            // Ambil file yang diunggah
            $file = $request->file('foto');
            $filePath = $file->storeAs('public/img/carousel', $file->getClientOriginalName());
            // Ubah path foto agar sesuai dengan path asset
            $filePath = str_replace('public/', 'storage/', $filePath);
            $foto->foto = $filePath;
        }

        // Ubah data lain yang ingin diubah
        $foto->judul    = $judul;
        $foto->ket      = $ket;
        $foto->save();

        return back()->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy($id)
    {
        // Ambil data berdasarkan ID
        $foto = Carousel::findOrFail($id);

        // Hapus data dari database
        $foto->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }
}
