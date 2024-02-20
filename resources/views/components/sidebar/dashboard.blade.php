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
                <a class="nav-link" data-toggle="collapse" href="#berita" aria-expanded="false" aria-controls="galeri">
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
                            <a class="nav-link" href="/dashboard/berita">List Berita</a>
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
                <a class="nav-link" data-toggle="collapse" href="#informasi" aria-expanded="false" aria-controls="informasi">
                    <i class="ti-agenda menu-icon"></i>
                    <span class="menu-title">Informasi Publik</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="informasi">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/informasi_publik/kategori">Kategori Informasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/informasi_publik">List Informasi</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#regulasi" aria-expanded="false" aria-controls="regulasi">
                    <i class="ti-stamp menu-icon"></i>
                    <span class="menu-title">Regulasi</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="regulasi">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/regulasi/kategori">Kategori Regulasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/regulasi">List Informasi</a>
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
                <a class="nav-link" href="/beranda" target="_blank">
                    <i class="ti-arrow-circle-left menu-icon"></i>
                    <span class="menu-title">Halaman Utama</span>
                </a>
            </li>

        </ul>
    </nav>
@endsection
