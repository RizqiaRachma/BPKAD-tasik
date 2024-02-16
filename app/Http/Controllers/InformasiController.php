<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
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
        $filePath = $file->storeAs('public/dok/informasi', $file->getClientOriginalName());

        // Ubah path foto agar sesuai dengan path asset
        $filePath = str_replace('public/', 'storage/', $filePath);

        // Simpan data ke dalam tabel kategori_beritas
        $informasi = new Informasi();
        $informasi->nama_file   = $nama_file;
        $informasi->tipe        = $tipe;
        $informasi->tgl_file    = $tgl_file;
        $informasi->file        = $filePath;
        $informasi->ket         = $ket;
        $informasi->save();

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

        $informasi      = Informasi::find($id);
        $nama_file      = $request->input('nama_file');
        $tipe           = $request->input('tipe');
        $tgl_file       = $request->input('tgl_file');
        $ket            = $request->input('ket');

        // Lakukan validasi input yang diterima

        if ($request->hasFile('file')) {
            // Ambil file yang diunggah
            $file = $request->file('file');
            // Simpan file di folder public/images dengan nama yang unik
            $filePath = $file->storeAs('public/dok/informasi', $file->getClientOriginalName());

            // Ubah path foto agar sesuai dengan path asset
            $filePath = str_replace('public/', 'storage/', $filePath);
            $informasi->file        = $filePath;
        }

        // Ubah data lain yang ingin diubah
        $informasi->nama_file   = $nama_file;
        $informasi->tipe        = $tipe;
        $informasi->tgl_file    = $tgl_file;
        $informasi->ket         = $ket;
        $informasi->save();
        return back()->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy($id)
    {
        // Ambil data berdasarkan ID
        $informasi = Informasi::findOrFail($id);

        // Hapus data dari database
        $informasi->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }

    public function cariDashboard(Request $request)
    {
        $judul = $request->input('judul');

        $informasi = Informasi::where('nama_file', 'like', '%' . $judul . '%')
            ->orWhere('tipe', 'like', '%' . $judul . '%')
            ->paginate(4);

        return view('dashboard.informasi_publik.informasi_publik', compact('informasi'));
    }
}
