@section('beranda')
    {{-- modal --}}
    <div class="modal fade " id="pengumuman" tabindex="-1" aria-labelledby="pengumuman" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-white">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <img src="https://avatars.cloudflare.steamstatic.com/d787554503b1712803bb816def2ceb91862680c6_full.jpg"
                        alt="" class="img-fluid" style="height: 100%; width:100%"> --}}

                    <div id="berita_terbaru" class="carousel slide custom-carousel carousel-fade " data-bs-ride="carousel">

                        {{-- bubble button --}}

                        {{-- <div class="carousel-indicators ">
                            <button type="button" data-bs-target="#berita_terbaru" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#berita_terbaru" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>

                        </div> --}}
                        <div class="carousel-inner h-100" data-bs-interval="100">
                            <div class="carousel-item active">
                                <img src="https://avatars.cloudflare.steamstatic.com/d787554503b1712803bb816def2ceb91862680c6_full.jpg"
                                    class="d-block w-100 custom-carousel" alt="...">

                            </div>

                            <div class="carousel-item">
                                <img src="https://images.pexels.com/photos/18578343/pexels-photo-18578343/free-photo-of-a-woman-in-a-white-dress-and-hat-walking-through-a-field.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                    class="d-block w-100 custom-carousel" alt="...">

                            </div>
                        </div>
                        {{-- button kiri kanan --}}
                        {{-- <button class="carousel-control-prev" type="button" data-bs-target="#berita_terbaru"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#berita_terbaru"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{--  --}}
    <div class="image-container" id="beranda">
        <div id="berita_terbaru" class="carousel slide custom-carousel carousel-fade " data-bs-ride="caraousel">
            <div class="carousel-indicators ">
                <button type="button" data-bs-target="#berita_terbaru" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#berita_terbaru" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#berita_terbaru" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner h-100">
                <div class="carousel-item active">
                    <img src="https://avatars.cloudflare.steamstatic.com/d787554503b1712803bb816def2ceb91862680c6_full.jpg"
                        class="d-block w-100 custom-carousel" alt="...">
                    <div class="carousel-caption  bg-glass-card-carousel px-3 text-start">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>


                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://avatars.cloudflare.steamstatic.com/d787554503b1712803bb816def2ceb91862680c6_full.jpg"
                        class="d-block w-100 custom-carousel" alt="...">
                    <div class="carousel-caption  bg-glass-card-carousel px-3 text-start">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, cumque quo
                            optio, ipsam temporibus eum atque alias modi commodi officiis facilis rerum illo! Rerum aut
                            voluptate delectus dicta inventore harum.</p>

                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.pexels.com/photos/18578343/pexels-photo-18578343/free-photo-of-a-woman-in-a-white-dress-and-hat-walking-through-a-field.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="d-block w-100 custom-carousel" alt="...">
                    <div class="carousel-caption  bg-glass-card-carousel px-3 text-start">
                        <h5>Third slide label</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga eum adipisci
                            fugit labore et, minus quos accusamus ullam voluptatum amet explicabo velit magni, eius omnis
                            quibusdam iure odio reprehenderit ipsum.</p>

                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#berita_terbaru" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#berita_terbaru" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container-fluid  container-beranda-berita ">
        <div class="container-fluid  mb-lg-5 pb-5 ">
            <div class="row text-center g-3 bg-light bg-gradient rounded-3 pb-3">
                <a href="https://ppid.tasikmalayakota.go.id/" class="col-4 col-lg-2  hovered_card" aria-label="ppid">
                    <img src="https://ppid.tasikmalayakota.go.id/wp-content/uploads/2020/09/logo-ppid-new-e1584340488959.png"
                        alt=""class="img-fluid" style="width: 10rem">
                </a>
                <a href="http://esakip.tasikmalayakota.go.id/portal/home"
                    class="col-4 col-lg-2  hovered_card align-self-center" aria-label="e-sakip">
                    <img src="http://esakip.tasikmalayakota.go.id/css/images/logo_big.png" alt=""class="img-fluid"
                        style="width: 15rem">
                </a>
                <a href="https://sispek.tasikmalayakota.go.id/" class="col-4 col-lg-2  hovered_card align-self-center"
                    aria-label="sispek">
                    <img src="https://sispek.tasikmalayakota.go.id/assets/img/SISPEK2.png" alt=""class="img-fluid"
                        style="width: 10rem">
                </a>
                <a href="https://lpse.tasikmalayakota.go.id/eproc4" class="col-4 col-lg-2  hovered_card align-self-center"
                    aria-label="lpse">
                    <img src="https://lpse.tasikmalayakota.go.id/eproc4/public/images/imgng/lpse-logo.png"class="img-fluid"
                        alt="" style="width: 10rem">
                </a>
                <a href="https://www.lapor.go.id/tentang" class="col-4 col-lg-2   hovered_card align-self-center"
                    aria-label="sp4n">
                    <img src="https://www.lapor.go.id/themes/lapor/assets/images/logo.png" class="img-fluid"
                        alt="" style="width: 10rem">
                </a>
                <a href="https://portal.tasikmalayakota.go.id/" class="col-4 col-lg-2  hovered_card align-self-center"
                    aria-label="portal kota tasikmalaya">
                    <img src="https://www.tasikmalayakota.go.id/assets/img/logo.png" class="img-fluid" alt=""
                        style="width: 15rem">
                </a>




            </div>

        </div>
        <div class="text-center h1 text-white mb-5">
            Berita Terbaru
        </div>
        <br><br><br>
        <div class="row gy-5">
            @foreach ($berita->take(4) as $x)
                <div class="col-12 col-md-6 mb-5 mb-xl-5 mb-xxl-0 col-xxl-3 pb-5 position-relative">
                    <div class="card bg-white card-berita mx-auto">
                        <div
                            class="card-header bg-transparent border-0 py-5 mb-5 mt-sm-3 mb-md-5 mb-lg-5 mb-xl-3 mb-xxl-3">
                            <img id="hat" src="{{ $x->thumbnail ? asset($x->thumbnail) : asset($x->foto) }}"
                                alt="{{ $x->judul }}" style="width: 80%; object-fit:cover">
                        </div>
                        <div class="card-body px-4 mt-5 mt-sm-5 mt-md-3 pt-5">
                            <small class=""><a class="link-dark" href="#">{{ $x->kategori }}</a></small>
                            <p class="h5 fw-semibold my-2">
                                {{ Str::limit($x->judul, 40) }}
                            </p>
                            <p class="h6 fw-medium line-clamp">{!! Str::limit($x->deskripsi, 100) !!}</p>
                        </div>
                        <a href="{{ route('detail.berita', ['id' => $x->id]) }}"
                            class="card-footer bg-transparent border-0 text-end text-decoration-none arrow-hover">
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
                @if ($beritaLimited)
                    @foreach ($beritaLimited as $dataBerita)
                        <div class="col-12 col-md-6 mb-5 mb-xl-5 mb-xxl-0 col-xxl-3 pb-5 position-relative">
                            <div class="card bg-white card-berita mx-auto">
                                <div
                                    class="card-header bg-transparent border-0 py-5 mb-5 mt-sm-3 mb-md-5 mb-lg-5 mb-xl-3 mb-xxl-3">
                                    <img id="hat"
                                        src="https://portal.tasikmalayakota.go.id/assets/uploads/{{ $dataBerita['berita_cover'] }}"
                                        alt="{{ $x->judul }}" style="width: 80%;">
                                </div>
                                <div class="card-body px-4 mt-5 mt-sm-5 mt-md-3 pt-5">
                                    <small>Berita Seputar Kota Tasikmalaya</small>
                                    <p class="h5 fw-semibold my-2">
                                        {{ Str::limit($dataBerita['berita_judul'], 40) }}
                                    </p>
                                    <p class="h6 fw-medium line-clamp">{!! Str::limit(strip_tags($dataBerita['berita_isi']), 250) !!}</p>
                                </div>
                                <a href="https://portal.tasikmalayakota.go.id/index.php/q/berita_detail/{{ $dataBerita['berita_id'] }}"
                                    class="card-footer bg-transparent border-0 text-end text-decoration-none arrow-hover"
                                    target="_blank">
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
                <a href="https://portal.tasikmalayakota.go.id/index.php/q/berita"
                    class="text-white  text-decoration-none h3 arrow-hover" target="_blank">Lihat Berita Lainnya
                    <span class="h4">
                        <i class="bi bi-chevron-right"></i></span></a>
            </div>
        </div>
    @endsection
