<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriInformasiController;
use App\Http\Controllers\KategoriRegulasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\VideoController;
use App\Models\Berita;
use App\Models\Foto;
use App\Models\Informasi;
use App\Models\Kategori_berita;
use App\Models\Kategori_informasi;
use App\Models\Kategori_regulasi;
use App\Models\Pesan;
use App\Models\Regulasi;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    $response_berita = Http::get('https://portal.tasikmalayakota.go.id/api/berita');
    $berita = $response_berita->json(); // Mengubah respon ke format JSON
    $beritaLimited = array_slice($berita['items'], 0, 4);

    $response_pengumuman = Http::get('https://portal.tasikmalayakota.go.id/api/pengumuman');
    $pengumuman = $response_pengumuman->json(); // Mengubah respon ke format JSON
    $pengumumanLimited = array_slice($pengumuman['items'], 0, 4);

    $berita = Berita::all();
    return view('landing.beranda.beranda', compact('beritaLimited', 'pengumumanLimited', 'berita'));
});
Route::get('/beranda', function () {
    $response_berita = Http::get('https://portal.tasikmalayakota.go.id/api/berita');
    $berita = $response_berita->json(); // Mengubah respon ke format JSON
    $beritaLimited = array_slice($berita['items'], 0, 4);

    $response_pengumuman = Http::get('https://portal.tasikmalayakota.go.id/api/pengumuman');
    $pengumuman = $response_pengumuman->json(); // Mengubah respon ke format JSON
    $pengumumanLimited = array_slice($pengumuman['items'], 0, 4);

    $berita = Berita::all();
    return view('landing.beranda.beranda', compact('beritaLimited', 'pengumumanLimited', 'berita'));
})->name('beranda');

Route::post('/pesan-simpan', [PesanController::class, 'submitForm'])->name('pesan.simpan');

Route::get('/profile/sejarah_singkat', function () {
    return view('landing.profile.sejarah_singkat.sejarah_singkat');
});
Route::get('/profile/visi_misi', function () {
    return view('landing.profile.visi_misi.visi_misi');
});
Route::get('/profile/tugas_fungsi', function () {
    return view('landing.profile.tugas_fungsi.tugas_fungsi');
});
Route::get('/profile/struktur_organisasi', function () {
    return view('landing.profile.struktur_organisasi.struktur_organisasi');
});
Route::get('/informasi_publik/renstra', function () {
    $informasi = Informasi::where('tipe', 'Renstra')->paginate(5);
    return view('landing.informasi_publik.renstra.renstra', ['informasi' => $informasi]);
})->name('renstra');

//revisi
Route::get('/informasi_publik', function () {
    $berita = Berita::paginate(12);
    return view('landing.informasi_publik.informasi_publik', ['berita' => $berita]);
})->name('informasi_publik');

//
Route::get('/informasi_publik/renja', function () {
    $informasi = Informasi::where('tipe', 'Renja')->paginate(5);
    return view('landing.informasi_publik.renja.renja', ['informasi' => $informasi]);
});
Route::get('/informasi_publik/rencana_aksi', function () {
    $informasi = Informasi::where('tipe', 'Rencana Aksi')->paginate(5);
    return view('landing.informasi_publik.rencana_aksi.rencana_aksi', ['informasi' => $informasi]);
});
Route::get('/informasi_publik/pohon_kinerja', function () {
    $informasi = Informasi::where('tipe', 'Pohon Kinerja')->paginate(5);
    return view('landing.informasi_publik.pohon_kinerja.pohon_kinerja', ['informasi' => $informasi]);
});
Route::get('/informasi_publik/perjanjian_kinerja', function () {
    $informasi = Informasi::where('tipe', 'Perjanjian Kerja')->paginate(5);
    return view('landing.informasi_publik.perjanjian_kinerja.perjanjian_kinerja', ['informasi' => $informasi]);
});
Route::get('/informasi_publik/monev', function () {
    $informasi = Informasi::where('tipe', 'Monev')->paginate(5);
    return view('landing.informasi_publik.monev.monev', ['informasi' => $informasi]);
});
Route::get('/informasi_publik/lkip', function () {
    $informasi = Informasi::where('tipe', 'LKIP')->paginate(5);
    return view('landing.informasi_publik.lkip.lkip', ['informasi' => $informasi]);
});
Route::get('/informasi_publik/iku', function () {
    $informasi = Informasi::where('tipe', 'IKU')->paginate(5);
    return view('landing.informasi_publik.iku.iku', ['informasi' => $informasi]);
});
Route::get('/informasi_publik/cascading', function () {
    $informasi = Informasi::where('tipe', 'Cascading')->paginate(5);
    return view('landing.informasi_publik.cascading.cascading', ['informasi' => $informasi]);
});
Route::get('/informasi_publik/berita', function () {
    $berita = Berita::paginate(12);
    return view('landing.informasi_publik.berita.berita', ['berita' => $berita]);
});
Route::post('/berita-cari', [BeritaController::class, 'cari'])->name('berita.cari');
Route::get('/informasi_publik/berita/{id}', function ($id) {
    $berita = Berita::all();
    $detailBerita = $berita->firstWhere('id', $id);
    return view('landing.informasi_publik.berita.detail.detail_berita', compact('detailBerita'));
})->name('detail.berita');
Route::get('/regulasi/peraturan_daerah', function () {
    $regulasi = Regulasi::where('tipe', 'Peraturan Daerah')->paginate(5);
    return view('landing.regulasi.peraturan_daerah.peraturan_daerah', ['regulasi' => $regulasi]);
});


// revisi
Route::get('/produk_hukum', function () {
    $regulasi = Regulasi::where('tipe', 'Peraturan Daerah')->paginate(5);
    return view('landing.regulasi.produk_hukum', ['regulasi' => $regulasi]);
});
//
// Route::get('/regulasi/peraturan_daerah/nama-file', function () {
//    return view('landing.regulasi.peraturan_daerah.detail.peraturan_daerah_detail');
// });
Route::get('/regulasi/peraturan_gubernur', function () {
    $regulasi = Regulasi::where('tipe', 'Peraturan Gubernur')->paginate(5);
    return view('landing.regulasi.peraturan_gubernur.peraturan_gubernur', ['regulasi' => $regulasi]);
});
Route::get('/regulasi/peraturan_menteri', function () {
    $regulasi = Regulasi::where('tipe', 'Peraturan Menteri')->paginate(5);
    return view('landing.regulasi.peraturan_menteri.peraturan_menteri', ['regulasi' => $regulasi]);
});
Route::get('/regulasi/peraturan_pemerintah', function () {
    $regulasi = Regulasi::where('tipe', 'Peraturan Pemerintah')->paginate(5);
    return view('landing.regulasi.peraturan_pemerintah.peraturan_pemerintah', ['regulasi' => $regulasi]);
});
Route::get('/regulasi/peraturan_walikota', function () {
    $regulasi = Regulasi::where('tipe', 'Peraturan Walikota')->paginate(5);
    return view('landing.regulasi.peraturan_walikota.peraturan_walikota', ['regulasi' => $regulasi]);
});
Route::get('/regulasi/undang-undang', function () {
    $regulasi = Regulasi::where('tipe', 'Undang-undang')->paginate(5);
    return view('landing.regulasi.undang_undang.undang_undang', ['regulasi' => $regulasi]);
});
Route::get('/galeri', function () {
    $video = Video::paginate(8);
    $foto = Foto::paginate(8);
    return view('landing.galeri.galeri', ['video' => $video, 'foto' => $foto]);
});

Route::get('/ppid/mekanisme_pelayanan', function () {
    return view('landing.ppid.mekanisme_pelayanan.mekanisme_pelayanan');
});
Route::get('/ppid/pengajuan_keberatan', function () {
    return view('landing.ppid.pengajuan_keberatan.pengajuan_keberatan');
});
Route::get('/ppid/permohonan_informasi', function () {
    return view('landing.ppid.permohonan_informasi.permohonan_informasi');
});
Route::get('/cek_tiket', function () {
    return view('landing.tiket.cari.cari');
})->name('cek-tiket');

Route::match(['get', 'post'], '/cek-tiket/cari', [PesanController::class, 'cari'])->name('cek-tiket.cari');

Route::get('/dashboard-login', function () {
    return view('dashboard.main.login');
})->name('login');

Route::post('/proses-login', [LoginController::class, 'login'])->name('proses-login');

Route::middleware(['auth'])->group(function () {
    Route::post('/change-password', [DashboardController::class, 'changePassword'])->name('change.password');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard/main', function () {
        $jumlahInformasi     = Informasi::count();
        $jumlahRegulasi      = Regulasi::count();
        $jumlahFoto          = Foto::count();
        $jumlahVideo         = Video::count();
        $jumlahPesanMenunggu = Pesan::where('status', 'Menunggu')->count();
        $jumlahPesan         = Pesan::count();

        return view('dashboard.main.main', compact('jumlahInformasi', 'jumlahRegulasi', 'jumlahFoto', 'jumlahVideo', 'jumlahPesanMenunggu', 'jumlahPesan'));
    });

    Route::get('/dashboard/berita', function () {
        $kategori = Kategori_berita::all();
        $berita = Berita::paginate(4);
        return view('dashboard.berita.berita', ['kategori' => $kategori, 'berita' => $berita]);
    });
    Route::post('/berita-simpan', [BeritaController::class, 'tambah'])->name('berita.simpan');
    Route::put('/berita-update/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita-delete/{id}', [BeritaController::class, 'destroy'])->name('berita.delete');
    Route::get('/berita-cariDashboard', [BeritaController::class, 'cariDashboard'])->name('berita.cariDashboard');

    Route::get('/dashboard/berita/kategori', function () {
        $kategori = Kategori_berita::paginate(5);
        return view('dashboard.berita.kategori_berita.kategori_berita', ['kategori' => $kategori]);
    });
    Route::post('/kategori-simpan', [KategoriController::class, 'tambah'])->name('kategori.simpan');
    Route::put('/kategori-update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori-delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');

    Route::get('/dashboard/galeri/video', function () {
        $video = Video::paginate(5);
        return view('dashboard.galeri.video.video_galeri', ['video' => $video]);
    })->name('video');
    Route::post('/video-simpan', [VideoController::class, 'tambah'])->name('video.simpan');
    Route::put('/video-update/{id}', [VideoController::class, 'update'])->name('video.update');
    Route::delete('/video-delete/{id}', [VideoController::class, 'destroy'])->name('video.delete');

    Route::get('/dashboard/galeri/foto', function () {
        $foto = Foto::paginate(5);
        return view('dashboard.galeri.foto.foto_galeri', ['foto' => $foto]);
    })->name('foto');
    Route::post('/foto-simpan', [FotoController::class, 'tambah'])->name('foto.simpan');
    Route::put('/foto-update/{id}', [FotoController::class, 'update'])->name('foto.update');
    Route::delete('/foto-delete/{id}', [FotoController::class, 'destroy'])->name('foto.delete');

    Route::get('/dashboard/informasi_publik/kategori_informasi', function () {
        $kategori = Kategori_informasi::paginate(5);
        return view('dashboard.informasi_publik.kategori.kategori_informasi', ['kategori' => $kategori]);
    });
    Route::post('/kategori_informasi-simpan', [KategoriInformasiController::class, 'tambah'])->name('kategori_informasi.simpan');
    Route::put('/kategori_informasi-update/{id}', [KategoriInformasiController::class, 'update'])->name('kategori_informasi.update');
    Route::delete('/kategori_informasi-delete/{id}', [KategoriInformasiController::class, 'destroy'])->name('kategori_informasi.delete');
    Route::post('/kategori_informasi-simpan', [KategoriInformasiController::class, 'tambah'])->name('kategori_informasi.simpan');
    Route::put('/kategori-informasi-update/{id}', [KategoriInformasiController::class, 'update'])->name('kategori_informasi.update');
    Route::delete('/kategori-informasi-delete/{id}', [KategoriInformasiController::class, 'destroy'])->name('kategori_informasi.delete');

    Route::get('/dashboard/informasi_publik', function () {
        $informasi = Informasi::paginate(5);
        return view('dashboard.informasi_publik.informasi_publik', ['informasi' => $informasi]);
    })->name('informasi-publik');
    Route::post('/informasi-simpan', [InformasiController::class, 'tambah'])->name('informasi.simpan');
    Route::put('/informasi-update/{id}', [InformasiController::class, 'update'])->name('informasi.update');
    Route::delete('/informasi-delete/{id}', [InformasiController::class, 'destroy'])->name('informasi.delete');
    Route::get('/informasi-cariDashboard', [InformasiController::class, 'cariDashboard'])->name('informasi.cariDashboard');


    Route::get('/dashboard/regulasi/kategori_regulasi', function () {
        $kategori = Kategori_regulasi::paginate(5);
        return view('dashboard.regulasi.kategori.kategori_regulasi', ['kategori' => $kategori]);
    });
    Route::post('/kategori-informasi-simpan', [KategoriRegulasiController::class, 'tambah'])->name('kategori_regulasi.simpan');
    Route::put('/kategori-informasi-update/{id}', [KategoriRegulasiController::class, 'update'])->name('kategori_regulasi.update');
    Route::delete('/kategori-informasi-delete/{id}', [KategoriRegulasiController::class, 'destroy'])->name('kategori_regulasi.delete');

    Route::get('/dashboard/regulasi', function () {
        $regulasi = Regulasi::paginate(5);
        return view('dashboard.regulasi.regulasi', ['regulasi' => $regulasi]);
    })->name('regulasi');
    Route::post('/regulasi-simpan', [RegulasiController::class, 'tambah'])->name('regulasi.simpan');
    Route::put('/regulasi-update/{id}', [RegulasiController::class, 'update'])->name('regulasi.update');
    Route::delete('/regulasi-delete/{id}', [RegulasiController::class, 'destroy'])->name('regulasi.delete');
    Route::get('/regulasi-cariDashboard', [RegulasiController::class, 'cariDashboard'])->name('regulasi.cariDashboard');

    Route::get('/dashboard/pengaturan', function () {
        return view('dashboard.pengaturan.pengaturan');
    })->name('dashboard-pengaturan');
    //
    Route::get('/dashboard/carousel', function () {
        $foto = Foto::paginate(5);
        return view('dashboard.carousel.carousel', ['foto' => $foto]);
    })->name('dashboard-carousel');
    Route::get('/dashboard/pengumuman', function () {
        $foto = Foto::paginate(5);
        return view('dashboard.pengumuman.pengumuman', ['foto' => $foto]);
    })->name('dashboard-pengumuman');

    //
    Route::get('/dashboard/pesan', function () {
        $pesan = Pesan::paginate(5);
        return view('dashboard.pesan.pesan', ['pesan' => $pesan]);
    })->name('pesan');
    Route::put('/pesan-jawab/{id}', [PesanController::class, 'jawab'])->name('pesan.jawab');
    Route::put('/pesan-tolak/{id}', [PesanController::class, 'tolak'])->name('pesan.tolak');
    Route::get('/pesan-cariDashboard', [PesanController::class, 'cariDashboard'])->name('pesan.cariDashboard');
});
