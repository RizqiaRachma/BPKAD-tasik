<?php

namespace App\Http\Controllers;

use App\Models\Kategori_informasi;
use Illuminate\Http\Request;

class KategoriInformasiController extends Controller
{
    public function tambah(Request $request)
    {
        // Validasi input
        $request->validate([
            'kategori' => 'required|unique:kategori_informasis,kategori',
        ], [
            'kategori.unique' => 'Kategori informasi sudah ada, mohon masukkan Kategori informasi yang berbeda.',
        ]);

        // Ambil nilai kategori dari Request
        $namaKategori = $request->input('kategori');

        // Simpan data ke dalam tabel 
        $kategori = new Kategori_informasi();
        $kategori->kategori = $namaKategori;
        $kategori->save();

        return back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kategori' => 'required|unique:kategori_informasis,kategori,' . $id,
        ], [
            'kategori.unique' => 'Kategori berita sudah ada, mohon masukkan Kategori berita yang berbeda.',
        ]);

        $kategori = Kategori_informasi::find($id);

        // Ubah data lain yang ingin diubah
        $kategori->kategori = $request->input('kategori');
        $kategori->save();

        return back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Ambil data berdasarkan ID
        $kategori = Kategori_informasi::findOrFail($id);

        // Hapus data dari database
        $kategori->delete();


        return back()->with('success', 'Data berhasil dihapus.');
    }
}
