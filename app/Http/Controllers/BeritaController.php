<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori_berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function tambah(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|unique:beritas,judul',
            'foto' => 'nullable|mimes:png,jpeg,jpg|max:10240',
        ], [
            'judul.unique' => 'Judul berita sudah ada, mohon masukkan Judul berita yang berbeda.',
            'foto.mimes' => 'Foto harus berformat PNG,JPEG,JPG',
            'foto.max' => 'Foto tidak boleh lebih dari 10 MB.',
        ]);

        // Ambil nilai kategori dari Request
        $judul      = $request->input('judul');
        $kategori   = $request->input('kategori');
        $deskripsi  = $request->input('deskripsi');
        // Ambil file yang diunggah
        $file = $request->file('foto');

        // Simpan file di folder public/images dengan nama yang unik
        $filePath = $file->storeAs('public/img/berita', $file->getClientOriginalName());

        // Ubah path foto agar sesuai dengan path asset
        $filePath = str_replace('public/', 'storage/', $filePath);


        // Simpan data ke dalam tabel kategori_beritas
        $berita = new Berita();
        $berita->judul = $judul;
        $berita->kategori = $kategori;
        $berita->deskripsi = $deskripsi;
        $berita->foto = $filePath;
        $berita->save();

        return back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|unique:beritas,judul' . $id,
            'foto' => 'nullable|mimes:png|max:10240',
        ], [
            'judul.unique' => 'Judul berita sudah ada, mohon masukkan Judul berita yang berbeda.',
            'foto.mimes' => 'Foto harus berformat PNG.',
            'foto.max' => 'Foto tidak boleh lebih dari 10 MB.',
        ]);

        $berita = Berita::find($id);
        $judul      = $request->input('judul');
        $kategori   = $request->input('kategori');
        $deskripsi  = $request->input('deskripsi');

        // Lakukan validasi input yang diterima

        if ($request->hasFile('foto')) {
            // Ambil file yang diunggah
            $file = $request->file('foto');
            $filePath = $file->storeAs('public/img/berita', $file->getClientOriginalName());
            // Ubah path foto agar sesuai dengan path asset
            $filePath = str_replace('public/', 'storage/', $filePath);
            $berita->foto = $filePath;
        }

        // Ubah data lain yang ingin diubah
        $berita->judul      = $judul;
        $berita->kategori   = $kategori;
        $berita->deskripsi  = $deskripsi;
        $berita->save();

        return back()->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy($id)
    {
        // Ambil data berdasarkan ID
        $berita = Berita::findOrFail($id);

        // Hapus data dari database
        $berita->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }

    public function cari(Request $request)
    {
        $judul = $request->input('judul');
        $berita = Berita::where('judul', 'like', '%' . $judul . '%')->paginate(4); // Sesuaikan dengan struktur tabel Anda

        return view('landing.informasi_publik.berita.berita', compact('berita'));
    }

    public function cariDashboard(Request $request)
    {
        $judul = $request->input('judul');
        $berita = Berita::where('judul', 'like', '%' . $judul . '%')->paginate(4); // Sesuaikan dengan struktur tabel Anda
        $kategori = Kategori_berita::all();
        return view('dashboard.berita.berita', compact('berita', 'kategori'));
    }
}
