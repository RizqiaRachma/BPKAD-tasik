<?php

namespace App\Http\Controllers;

use App\Models\Regulasi;
use Illuminate\Http\Request;

class RegulasiController extends Controller
{
    public function tambah(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_file' => 'required|unique:informasis,nama_file',
            'file' => 'required|mimes:pdf|max:10240', // Maksimal 10 MB
        ], [
            'nama_file.unique' => 'Nama file sudah ada, mohon masukkan Nama file yang berbeda.',
            'file.required' => 'File harus diunggah.',
            'file.mimes' => 'File harus berformat PDF.',
            'file.max' => 'File tidak boleh lebih dari 10 MB.',
        ]);

        // Ambil nilai kategori dari Request
        $nama_file      = $request->input('nama_file');
        $tipe           = $request->input('tipe');
        $tgl_file       = $request->input('tgl_file');
        $ket            = $request->input('ket');

        // Ambil file yang diunggah
        $file = $request->file('file');

        // Simpan file di folder public/images dengan nama yang unik
        $filePath = $file->storeAs('public/dok/regulasi', $file->getClientOriginalName());

        // Ubah path foto agar sesuai dengan path asset
        $filePath = str_replace('public/', 'storage/', $filePath);

        // Simpan data ke dalam tabel kategori_beritas
        $regulasi = new Regulasi();
        $regulasi->nama_file   = $nama_file;
        $regulasi->tipe        = $tipe;
        $regulasi->tgl_file    = $tgl_file;
        $regulasi->file        = $filePath;
        $regulasi->ket         = $ket;
        $regulasi->save();

        return back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_file' => 'required|unique:informasis,nama_file,' . $id,
            'file' => 'nullable|mimes:pdf|max:10240', // Maksimal 10 MB
        ], [
            'nama_file.unique' => 'Nama file sudah ada, mohon masukkan Nama file yang berbeda.',
            'file.mimes' => 'File harus berformat PDF.',
            'file.max' => 'File tidak boleh lebih dari 10 MB.',
        ]);

        $regulasi      = Regulasi::find($id);
        $nama_file      = $request->input('nama_file');
        $tipe           = $request->input('tipe');
        $tgl_file       = $request->input('tgl_file');
        $ket            = $request->input('ket');

        // Lakukan validasi input yang diterima

        if ($request->hasFile('file')) {
            // Ambil file yang diunggah
            $file = $request->file('file');
            // Simpan file di folder public/images dengan nama yang unik
            $filePath = $file->storeAs('public/dok/regulasi', $file->getClientOriginalName());

            // Ubah path foto agar sesuai dengan path asset
            $filePath = str_replace('public/', 'storage/', $filePath);
            $regulasi->file        = $filePath;
        }

        // Ubah data lain yang ingin diubah
        $regulasi->nama_file   = $nama_file;
        $regulasi->tipe        = $tipe;
        $regulasi->tgl_file    = $tgl_file;
        $regulasi->ket         = $ket;
        $regulasi->save();
        return back()->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy($id)
    {
        // Ambil data berdasarkan ID
        $regulasi = Regulasi::findOrFail($id);

        // Hapus data dari database
        $regulasi->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }

    public function cariDashboard(Request $request)
    {
        $judul = $request->input('judul');

        $regulasi = Regulasi::where('nama_file', 'like', '%' . $judul . '%')
            ->orWhere('tipe', 'like', '%' . $judul . '%')
            ->paginate(4);

        return view('dashboard.regulasi.regulasi', compact('regulasi'));
    }
}
