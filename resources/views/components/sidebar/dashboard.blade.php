@section('sidebar')
    <nav class="sidebar sidebar-offcanvas " id="sidebar">
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="/dashboard/main">
                    <i class="ti-dashboard menu-icon"></i>
                    <span class="menu-title">Dashboard Utama</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#berita" aria-expanded="false" aria-controls="berita">
                    <i class="ti-notepad menu-icon"></i>
                    <span class="menu-title">Berita</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="berita">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/berita/kategori">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/berita">List</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#galeri" aria-expanded="false" aria-controls="galeri">
                    <i class="ti-gallery menu-icon"></i>
                    <span class="menu-title">Galeri</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="galeri">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/galeri/foto">Foto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/galeri/video">Video</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#informasi" aria-expanded="false"
                    aria-controls="informasi">
                    <i class="ti-agenda menu-icon"></i>
                    <span class="menu-title">Informasi Publik</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="informasi">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/informasi_publik/kategori">Kategori </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/informasi_publik">List </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#regulasi" aria-expanded="false" aria-controls="regulasi">
                    <i class="ti-stamp menu-icon"></i>
                    <span class="menu-title">Produk Hukum</span>
                    <i class="menu-arrow"></i>
                </a>
                <div id="regulasi" class="collapse">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/regulasi/kategori">Kategori a</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/regulasi">List </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/pesan">
                    <i class="ti-envelope menu-icon"></i>
                    <span class="menu-title">Pesan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/carousel">
                    <i class="ti-layers-alt menu-icon"></i>
                    <span class="menu-title">Carousel Beranda</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/pengumuman">
                    <i class="ti-info-alt menu-icon"></i>
                    <span class="menu-title">Pengumuman</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/beranda" target="_blank">
                    <i class="ti-arrow-circle-left menu-icon"></i>
                    <span class="menu-title">Halaman Utama</span>
                </a>
            </li>

        </ul>
    </nav>
@endsection
