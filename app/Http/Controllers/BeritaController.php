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
            'thumbnail' => 'nullable|mimes:png,jpeg,jpg|max:10240',
        ], [
            'judul.unique' => 'Judul berita sudah ada, mohon masukkan Judul berita yang berbeda.',
            'foto.mimes' => 'Foto harus berformat PNG,JPEG,JPG',
            'foto.max' => 'Foto tidak boleh lebih dari 10 MB.',
            'thumbnail.mimes' => 'Foto harus berformat PNG,JPEG,JPG',
            'thumbnail.max' => 'Foto tidak boleh lebih dari 10 MB.',
        ]);

        // Ambil nilai kategori dari Request
        $judul      = $request->input('judul');
        $kategori   = $request->input('kategori');
        $deskripsi  = $request->input('deskripsi');
        // Ambil file yang diunggah
        $file = $request->file('foto');
        $thumbnail = $request->file('thumbnail');

        // Simpan file di folder public/images dengan nama yang unik
        $filePath = $file->storeAs('public/img/berita', $file->getClientOriginalName());
        $thumbnailPath = $file->storeAs('public/img/berita/thumbnail', $thumbnail->getClientOriginalName());

        // Ubah path foto agar sesuai dengan path asset
        $filePath = str_replace('public/', 'storage/', $filePath);
        $thumbnailPath = str_replace('public/', 'storage/', $thumbnailPath);


        // Simpan data ke dalam tabel kategori_beritas
        $berita = new Berita();
        $berita->judul = $judul;
        $berita->kategori = $kategori;
        $berita->deskripsi = $deskripsi;
        $berita->foto = $filePath;
        $berita->thumbnail = $thumbnailPath;
        $berita->save();

        return back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|unique:beritas,judul,' . $id,
            'foto' => 'nullable|mimes:png,jpeg,jpg|max:10240',
            'thumbnail' => 'nullable|mimes:png,jpeg,jpg|max:10240',
        ], [
            'judul.unique' => 'Judul berita sudah ada, mohon masukkan Judul berita yang berbeda.',
            'foto.mimes' => 'Foto harus berformat PNG,JPEG,JPG',
            'foto.max' => 'Foto tidak boleh lebih dari 10 MB.',
            'thumbnail.mimes' => 'Foto harus berformat PNG,JPEG,JPG',
            'thumbnail.max' => 'Foto tidak boleh lebih dari 10 MB.',
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
        } elseif ($request->hasFile('thumbnail')) {
            // Ambil file yang diunggah
            $thumbnail = $request->file('thumbnail');
            $thumbnailPath = $thumbnail->storeAs('public/img/berita/thumbnail', $thumbnail->getClientOriginalName()); // Menggunakan $thumbnail bukan $file
            // Ubah path thumbnail agar sesuai dengan path asset
            $thumbnailPath = str_replace('public/', 'storage/', $thumbnailPath); // Menggunakan $thumbnailPath bukan $filePath
            $berita->thumbnail = $thumbnailPath; // Menggunakan $thumbnailPath bukan $thumbnailPath
        }

        // Ubah data lain yang ingin diubah
        $berita->judul = $judul;
        $berita->kategori = $kategori;
        $berita->deskripsi = $deskripsi;
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
