<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\TiketPesanNotification;
use Illuminate\Support\HtmlString;

class PesanController extends Controller
{

    public function submitForm(Request $request)
    {
        // Validasi form jika diperlukan
        $request->validate([
            'nama_pemohon' => 'required|string|max:30',
            'email' => 'required|email|max:50',
            'pesan' => 'required|string|max:1000', // Adjust max length as needed
        ]);

        // Ambil nilai kategori dari Request
        $nama_pemohon  = $request->input('nama_pemohon');
        $email         = $request->input('email');
        $pesan         = $request->input('pesan');

        // Sanitize inputs
        $nama_pemohon = htmlspecialchars($nama_pemohon, ENT_QUOTES, 'UTF-8');
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $pesan = htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8');

        // Simpan data ke dalam tabel pesans
        $kontak = new Pesan();
        $kontak->nama_pemohon = $nama_pemohon;
        $kontak->email        = $email;
        $kontak->pesan        = $pesan;
        $kontak->status       = "Menunggu";
        $kontak->tiket        = Str::random(8); // Membuat string acak sepanjang 8 karakter
        $kontak->save();

        // Kirim email pemberitahuan
        //$data = [
        //    'nama_pemohon'  => $request->nama_pemohon,
        //    'email'         => $request->email,
        //    'pesan'         => $request->pesan,
        //    'tiket'         => $kontak->tiket, // Ambil tiket yang telah disimpan
        //];


        return redirect(url()->previous() . '#footer')->with('success', new HtmlString('Pesan telah terkirim. <br> <h1>Tiket: ' . $kontak->tiket . '</h1> Silahkan cek jawaban di menu <a href="' . route('cek-tiket') . '">CEK TIKET</a>. Gunakan kode tiket di atas untuk melihat jawaban dari pesan Anda.'));
    }


    public function jawab(Request $request, $id)
    {
        $kontak = Pesan::find($id);
        $request->validate([
            'file' => 'nullable|mimes:pdf,docx,xlsx,png,jpeg,jpg|max:10240',
        ], [
            'file.mimes' => 'File harus berformat PDF, Docx, Xlsx, PNG, JPG, atau JPEG.',
            'file.max' => 'File tidak boleh lebih dari 10 MB.',
        ]);

        $jawaban         = $request->input('jawaban');

        if ($request->hasFile('file')) {
            // Ambil file yang diunggah
            $file = $request->file('file');
            // Simpan file di folder public/images dengan nama yang unik
            $filePath = $file->storeAs('public/dok/pesan', $file->getClientOriginalName());

            // Ubah path foto agar sesuai dengan path asset
            $filePath = str_replace('public/', 'storage/', $filePath);
            $kontak->file        = $filePath;
        }


        // Ubah data lain yang ingin diubah
        $kontak->jawaban      = $jawaban;
        $kontak->status       = "Dijawab";
        $kontak->alasan       = "-";
        $kontak->save();

        return back()->with('success', 'Pesan berhasil dijawab.');
    }

    public function tolak(Request $request, $id)
    {
        $kontak = Pesan::find($id);
        $request->validate([
            'file' => 'nullable|mimes:pdf,docx,xlsx,png,jpeg,jpg|max:10240',
        ], [
            'file.mimes' => 'File harus berformat PDF, Docx, Xlsx, PNG, JPG, atau JPEG.',
            'file.max' => 'File tidak boleh lebih dari 10 MB.',
        ]);

        $alasan         = $request->input('alasan');

        if ($request->hasFile('file')) {
            // Ambil file yang diunggah
            $file = $request->file('file');
            // Simpan file di folder public/images dengan nama yang unik
            $filePath = $file->storeAs('public/dok/pesan', $file->getClientOriginalName());

            // Ubah path foto agar sesuai dengan path asset
            $filePath = str_replace('public/', 'storage/', $filePath);
            $kontak->file        = $filePath;
        }

        // Ubah data lain yang ingin diubah
        $kontak->jawaban      = "-";
        $kontak->status       = "Ditolak";
        $kontak->alasan       = $alasan;
        $kontak->save();

        return back()->with('success', 'Pesan berhasil dijawab.');
    }

    public function cari(Request $request)
    {
        $tiket = $request->input('tiket');
        $pesan = Pesan::where('tiket', $tiket)->get(); // Sesuaikan dengan struktur tabel Anda

        return view('landing.tiket.tiket', compact('pesan'));
    }

    public function cariDashboard(Request $request)
    {
        $judul = $request->input('judul');

        $pesan = Pesan::where('tiket', 'like', '%' . $judul . '%')
            ->orWhere('nama_pemohon', 'like', '%' . $judul . '%')
            ->paginate(5);

        return view('dashboard.pesan.pesan', compact('pesan'));
    }
}
