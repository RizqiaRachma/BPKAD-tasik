<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function tambah(Request $request)
    {
        // Validasi input
        $request->validate([
            'youtube' => 'required|unique:videos,youtube',
        ], [
            'youtube.unique' => 'ID youtube sudah ada, mohon masukkan ID youtube yang berbeda.',
        ]);

        // Ambil nilai kategori dari Request
        $youtube = $request->input('youtube');

        // Simpan data ke dalam tabel kategori_beritas
        $video = new Video();
        $video->youtube = $youtube;
        $video->save();

        return back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'youtube' => 'required|unique:videos,youtube,' . $id
        ], [
            'youtube.unique' => 'ID youtube sudah ada, mohon masukkan ID youtube yang berbeda.',
        ]);
        $video = Video::find($id);

        // Ubah data lain yang ingin diubah
        $video->youtube = $request->input('youtube');
        $video->save();

        return back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Ambil data berdasarkan ID
        $video = Video::findOrFail($id);

        // Hapus data dari database
        $video->delete();


        return back()->with('success', 'Data berhasil dihapus.');
    }
}
