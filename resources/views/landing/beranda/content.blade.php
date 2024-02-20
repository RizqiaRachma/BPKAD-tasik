@section('beranda')
    <div class="image-container" id="beranda">
        <div class="image-overlay"></div>
        <img src="img/Gedung-BPKAD.jpg" class="image" alt="">
    </div>
    <div class="container container-beranda-image">
        <div class="row  d-flex align-items-center">
            <div class="col-0 col-lg-6"></div>
            <div class="col-12 col-lg-6 ">
                <div class="card text-white bg-glass-card py-4 px-3 ">
                    <p class="h2">
                        Badan Pengelola Keuangan dan Aset Daerah (BPKAD) Kota Tasikmalaya
                    </p>
                    <p class="h4" style="text-align: justify">
                        adalah lembaga keuangan yang bertanggung jawab mengelola dan mengawasi keuangan kota Tasikmalaya.
                        Kami memastikan <span class="text-black fw-semibold">transparansi</span>, <span
                            class="text-black fw-semibold">efisiensi</span>, dan
                        <span class="text-black fw-semibold">akuntabilitas</span> dana publik.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid  container-beranda-berita">
        <div class="text-center h1 text-white mb-5">
            Berita Terbaru
        </div>
        <br><br><br>
        <div class="row gy-5">
            @foreach($berita->take(4) as $x)
                <div class="col-12 col-md-6 mb-5 mb-xl-5 mb-xxl-0 col-xxl-3 pb-5 position-relative">
                    <div class="card bg-white card-berita mx-auto">
                        <div class="card-header bg-transparent border-0 py-5 mb-5 mt-sm-3 mb-md-5 mb-lg-5 mb-xl-3 mb-xxl-3">
                            <img id="hat" src="{{ asset($x->foto) }}" alt="{{ $x->judul }}" style="width: 80%;">
                        </div>
                        <div class="card-body px-4 mt-5 mt-sm-5 mt-md-3 pt-5">
                            <small>{{ $x->kategori }}</small>
                            <p class="h5 fw-semibold my-2">
                                {{ Str::limit($x->judul, 40) }}
                            </p>
                            <p class="h6 fw-medium line-clamp">{!! Str::limit($x->deskripsi, 100) !!}</p>
                        </div>
                        <a href="{{ route('detail.berita', ['id' => $x->id]) }}" class="card-footer bg-transparent border-0 text-end text-decoration-none arrow-hover">
                            <p class="h-6">Selengkapnya <i class="bi bi-arrow-right"></i></p>
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="text-center h1 text-white mb-5">
                Berita Seputar Kota Tasikmalaya
            </div>
            <br><br><br>
            <div class="row gy-5">
                @if($beritaLimited)
                    @foreach ($beritaLimited as $dataBerita)
                    <div class="col-12 col-md-6 mb-5 mb-xl-5 mb-xxl-0 col-xxl-3 pb-5 position-relative">
                        <div class="card bg-white card-berita mx-auto">
                            <div class="card-header bg-transparent border-0 py-5 mb-5 mt-sm-3 mb-md-5 mb-lg-5 mb-xl-3 mb-xxl-3">
                                <img id="hat" src="https://portal.tasikmalayakota.go.id/assets/uploads/{{ $dataBerita['berita_cover'] }}" alt="{{ $x->judul }}" style="width: 80%;">
                            </div>
                            <div class="card-body px-4 mt-5 mt-sm-5 mt-md-3 pt-5">
                                <small>Berita Seputar Kota Tasikmalaya</small>
                                <p class="h5 fw-semibold my-2">
                                    {{ Str::limit($dataBerita['berita_judul'], 40) }}
                                </p>
                                <p class="h6 fw-medium line-clamp">{!! Str::limit((strip_tags($dataBerita['berita_isi'])), 250) !!}</p>
                            </div>
                            <a href="https://portal.tasikmalayakota.go.id/index.php/q/berita_detail/{{ $dataBerita['berita_id'] }}" class="card-footer bg-transparent border-0 text-end text-decoration-none arrow-hover" target="_blank">
                                <p class="h-6">Selengkapnya <i class="bi bi-arrow-right"></i></p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p>Data berita tidak tersedia.</p>
                @endif
            </div>
        
        <div class="my-3 d-flex justify-content-center align-items-center">
            <a href="https://portal.tasikmalayakota.go.id/index.php/q/berita" class="text-white  text-decoration-none h3 arrow-hover" target="_blank">Lihat Berita Lainnya
                <span class="h4">
                    <i class="bi bi-chevron-right"></i></span></a>
        </div>
    </div>
@endsection
