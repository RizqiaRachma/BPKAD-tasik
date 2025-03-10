<?php

namespace App\Http\Controllers;

use App\Models\Kategori_berita;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function tambah(Request $request)
    {
        // Validasi input
        $request->validate([
            'kategori' => 'required|unique:kategori_beritas,kategori',
        ], [
            'kategori.unique' => 'Kategori berita sudah ada, mohon masukkan Kategori berita yang berbeda.',
        ]);

        // Ambil nilai kategori dari Request
        $namaKategori = $request->input('kategori');

        // Simpan data ke dalam tabel kategori_beritas
        $kategori = new Kategori_berita();
        $kategori->kategori = $namaKategori;
        $kategori->save();

        return back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kategori' => 'required|unique:kategori_beritas,kategori,' . $id,
        ], [
            'kategori.unique' => 'Kategori berita sudah ada, mohon masukkan Kategori berita yang berbeda.',
        ]);

        $kategori = Kategori_berita::find($id);

        // Ubah data lain yang ingin diubah
        $kategori->kategori = $request->input('kategori');
        $kategori->save();

        return back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Ambil data berdasarkan ID
        $kategori = Kategori_berita::findOrFail($id);

        // Hapus data dari database
        $kategori->delete();


        return back()->with('success', 'Data berhasil dihapus.');
    }
}
