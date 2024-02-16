@section('header')
    <div class="offcanvas offcanvas-end bg-glass-off-canvas " tabindex="-1" id="navbar"
        aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header d-flex justify-content-end">
            {{-- <a href="/#beranda" class=" me-md-auto link-light text-decoration-none">
                <img src="{{ asset('img/bpkad-logo.png') }}" alt="">
            </a> --}}
            <button type="button" class="btn" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="bi bi-x btn-close-off-canvas"></i>
            </button>
        </div>

        <div class="offcanvas-body">
            <ul class=" nav nav-pills row">
                <li class="nav-item ">
                    <a class="nav-link link-light rounded-0 text-white fs-5" href="/"
                        role="button">Beranda</a>

                </li>
                <li class="nav-item ">
                    <a class="nav-link link-light dropdown-toggle rounded-0 text-white fs-5" data-bs-toggle="collapse"
                        href="#profil" role="button" aria-expanded="false" aria-controls="profil">
                        Profil
                    </a>

                    <div class="collapse text-white  container" id="profil">
                        <ul class="list-unstyled container">
                            <li><a class="dropdown-item text-capitalize" href="/profile/sejarah_singkat">Sejarah Singkat</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/profile/visi_misi">Visi & Misi</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/profile/tugas_fungsi">Tugas & Fungsi</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/profile/struktur_organisasi">Struktur Organisasi</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item ">

                    <a class="nav-link link-light dropdown-toggle rounded-0 text-white fs-5" data-bs-toggle="collapse"
                        href="#informasipublik" role="button" aria-expanded="false" aria-controls="informasipublik">
                        Informasi Publik
                    </a>

                    <div class="collapse text-white  container" id="informasipublik">
                        <ul class="list-unstyled container">
                            <li><a class="dropdown-item text-capitalize" href="/informasi_publik/renstra">RENSTRA</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/informasi_publik/renja">RENJA</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/informasi_publik/iku">IKU</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/informasi_publik/cascading">CASCADING</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/informasi_publik/lkip">LKIP</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/informasi_publik/rencana_aksi">Rencana Aksi</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/informasi_publik/monev">Monev</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/informasi_publik/perjanjian_kinerja">Perjanjian Kinerja</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/informasi_publik/pohon_kinerja">Pohon Kinerja</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/informasi_publik/berita">Berita & Artikel</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item ">

                    <a class="nav-link link-light dropdown-toggle rounded-0 text-white fs-5" data-bs-toggle="collapse"
                        href="#regulasi" role="button" aria-expanded="false" aria-controls="regulasi">
                        Regulasi
                    </a>

                    <div class="collapse text-white  container" id="regulasi">
                        <ul class="list-unstyled container">
                            <li><a class="dropdown-item text-capitalize" href="/regulasi/undang-undang">Undang-undang</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/regulasi/peraturan_pemerintah">Peraturan Pemerintah</a>
                            </li>
                            <li><a class="dropdown-item text-capitalize" href="/regulasi/peraturan_menteri">Peraturan Menteri</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/regulasi/peraturan_gubernur">Peraturan Gubernur</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/regulasi/peraturan_daerah">Peraturan Daerah</a></li>
                            <li><a class="dropdown-item text-capitalize" href="/regulasi/peraturan_walikota">Peraturan Walikota</a></li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item ">
                    <a class="nav-link link-light rounded-0 text-white fs-5" href="/galeri"
                        role="button">Galeri</a>

                </li>
                <li class="nav-item ">
                    <a class="nav-link link-light rounded-0 text-white fs-5" href="#footer"
                        role="button">Kontak</a>
                </li>
                <li class="nav-item ">

                    <a class="nav-link link-light dropdown-toggle rounded-0 text-white fs-5" data-bs-toggle="collapse"
                        href="#ppid" role="button" aria-expanded="false" aria-controls="ppid">
                        PPID
                    </a>

                    <div class="collapse text-white  container" id="ppid">
                        <ul class="list-unstyled container">
                            <li><a class="dropdown-item text-capitalize" href="#">PPID Utama</a></li>
                            <li><a class="dropdown-item text-capitalize" href="#">Permohonan Informasi
                                    Publik</a></li>
                            <li><a class="dropdown-item text-capitalize" href="#">Mekanisme Pelayanan
                                    Informasi</a></li>
                            <li><a class="dropdown-item text-capitalize" href="#">Pengajuan Keberatan</a>
                        </ul>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link link-light rounded-0 text-white fs-5" href="/cek_tiket" role="button">Cek
                        Tiket</a>
                </li>
            </ul>
        </div>

    </div>

    <header class="d-flex flex-wrap justify-content-between justify-content-lg-center py-3  bg-glass text-white sticky-top z-3 px-4">
        <a href="/beranda" class=" me-md-auto link-light text-decoration-none">
            <img src="{{ asset('img/bpkad-logo.png') }}" alt="" class='header-logo'>
        </a>
        
        <ul class="d-none d-lg-flex nav nav-pills">
            <li class="nav-item ">
                <a class="nav-link link-light rounded-0 text-white fs-5" href="/"
                    role="button">Beranda</a>
    
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link link-light dropdown-toggle rounded-0 text-white fs-5" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
                <ul class="dropdown-menu dropdown-menu-size-profile ">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <li><a class="dropdown-item text-capitalize" href="/profile/sejarah_singkat">Sejarah Singkat</a></li>
                                <li><a class="dropdown-item text-capitalize" href="/profile/visi_misi">Visi & Misi</a></li>
                            </div>
                            <div class="col-md-6">
                                <li><a class="dropdown-item text-capitalize" href="/profile/tugas_fungsi">Tugas & Fungsi</a></li>
                                <li><a class="dropdown-item text-capitalize" href="/profile/struktur_organisasi">Struktur Organisasi</a></li>
                                {{-- <li><a class="dropdown-item text-capitalize" href="#">Daftar Pegawai</a></li> --}}
                            </div>
                        </div>
                    </div>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link link-light dropdown-toggle rounded-0 text-white fs-5" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">Informasi Publik</a>
                <ul class="dropdown-menu dropdown-menu-size-informasi ">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <li><a class="dropdown-item text-capitalize" href="/informasi_publik/renstra">RENSTRA</a></li>
                                <li><a class="dropdown-item text-capitalize" href="/informasi_publik/renja">RENJA</a></li>
                                <li><a class="dropdown-item text-capitalize" href="/informasi_publik/iku">IKU</a></li>
                                <li><a class="dropdown-item text-capitalize" href="/informasi_publik/cascading">CASCADING</a></li>
                            </div>
                            <div class="col-md-4">
                                <li><a class="dropdown-item text-capitalize" href="/informasi_publik/lkip">LKIP</a></li>
                                <li><a class="dropdown-item text-capitalize" href="/informasi_publik/rencana_aksi">Rencana Aksi</a></li>
                                <li><a class="dropdown-item text-capitalize" href="/informasi_publik/monev">Monev</a></li>
                                <li><a class="dropdown-item text-capitalize" href="/informasi_publik/perjanjian_kerja">Perjanjian Kinerja</a></li>
                            </div>
                            <div class="col-md-4">
                                <li><a class="dropdown-item text-capitalize" href="/informasi_publik/pohon_kinerja">Pohon Kinerja</a></li>
                                <li><a class="dropdown-item text-capitalize" href="/informasi_publik/berita">Berita & Artikel</a></li>
                            </div>
                        </div>
                    </div>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link link-light dropdown-toggle rounded-0 text-white fs-5" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">Regulasi</a>
                <ul class="dropdown-menu dropdown-menu-size-regulasi ">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <li><a class="dropdown-item text-capitalize" href="/regulasi/undang-undang">Undang-undang</a></li>
                                <li><a class="dropdown-item text-capitalize" href="/regulasi/peraturan_pemerintah">Peraturan Pemerintah</a></li>
                                <li><a class="dropdown-item text-capitalize" href="/regulasi/peraturan_menteri">Peraturan Menteri</a></li>
                            </div>
                            <div class="col-md-6">
                                <li><a class="dropdown-item text-capitalize" href="/regulasi/peraturan_gubernur">Peraturan Gubernur</a></li>
                                <li><a class="dropdown-item text-capitalize" href="/regulasi/peraturan_daerah">Peraturan Daerah</a></li>
                                <li><a class="dropdown-item text-capitalize" href="/regulasi/peraturan_walikota">Peraturan Walikota</a></li>
                            </div>
                        </div>
                    </div>
                </ul>
            </li>
            <li class="nav-item ">
                <a class="nav-link link-light rounded-0 text-white fs-5" href="/galeri"
                    role="button">Galeri</a>

            </li>
            <li class="nav-item ">
                <a class="nav-link link-light rounded-0 text-white fs-5" href="#footer" role="button">Kontak</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link link-light dropdown-toggle rounded-0 text-white fs-5" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">PPID</a>
                <ul class="dropdown-menu dropdown-menu-size-ppid ">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <li><a class="dropdown-item text-capitalize" href="https://ppid.tasikmalayakota.go.id/">PPID Utama</a></li>
                                <li><a class="dropdown-item text-capitalize" href="https://ppid.tasikmalayakota.go.id/permohonan-informasi/">Permohonan Informasi
                                        Publik</a></li>
                            </div>
                            <div class="col-md-6">
                                <li><a class="dropdown-item text-capitalize" href="https://ppid.tasikmalayakota.go.id/mekanisme-perolehan-informasi/">Mekanisme Pelayanan
                                        Informasi</a></li>
                                <li><a class="dropdown-item text-capitalize" href="https://ppid.tasikmalayakota.go.id/formulir-online-keberatan-permohonan-informasi/">Pengajuan Keberatan</a></li>
                            </div>
                        </div>
                    </div>
                </ul>
            </li>
            <li class="nav-item ">
                <a class="nav-link link-light rounded-0 text-white fs-5" href="/cek_tiket" role="button">Cek
                    Tiket</a>
            </li>
        </ul>
        <div class="text-end d-flex d-lg-none ">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <i class="bi bi-list" style="font-size: 2rem"></i>
            </button>
        </div>
    </header>
@endsection
