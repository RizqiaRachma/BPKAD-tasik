@section('informasi_publik')
    <div class="position-relative px-5 mt-4">
        <div class="text-center">
            <p class="h1 text-white"> Informasi Publik</p>
        </div>
        <div class="container-fluid d-flex justify-content-end mb-5">

            <form action="{{ route('berita.cari') }}" method="post">
                @csrf
                <div class="input-group">
                    <input class="form-control border-end-0 border-top-0 border-start-0 rounded-0  border-light text-white"
                        type="text" placeholder="Apa yang anda cari ?" name="judul" id="searchbar-header"
                        style="color: white">
                    <span class="input-group-append">
                        <button
                            class="btn  border-top-0 border-bottom  border-light border-end-0 border-top-0 border-start-0  rounded-0"
                            type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>
                    </span>
                </div>

            </form>


        </div>
        <div class="container-fluid container-berita">
            <div class="row gy-5 ">
                @foreach ($berita as $x)
                    <div class="col-12 col-md-6 mb-5 mb-xl-5 mb-xxl-0 col-xxl-3 pb-5 position-relative">
                        <div class="card bg-white card-berita mx-auto">
                            <div
                                class="card-header bg-transparent border-0 py-5 mb-5 mt-sm-3 mb-md-5 mb-lg-5 mb-xl-3 mb-xxl-3">
                                <img id="hat" src="{{ asset($x->foto) }}" alt="{{ $x->judul }}"
                                    style="width: 80%;">
                            </div>
                            <div class="card-body px-4 mt-5 mt-sm-5 mt-md-3 pt-5">
                                <small class=""><a class="link-dark" href="#">{{ $x->kategori }}</a></small>
                                <p class="h5 fw-semibold my-2">
                                    {{ Str::limit($x->judul, 40) }}
                                </p>
                                <p class="h6 fw-medium">{!! Str::limit($x->deskripsi, 100) !!}</p>
                            </div>
                            <a href="{{ route('detail.berita', ['id' => $x->id]) }}"
                                class="card-footer bg-transparent border-0 text-end text-decoration-none arrow-hover">
                                <p class="h-6">Selengkapnya <i class="bi bi-arrow-right"></i></p>
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="w-100 d-flex justify-content-center justify-content-lg-end mt-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-secondary justify-content-end">
                        @if ($berita->previousPageUrl())
                            <li class="page-item">
                                <a class="page-link" href="{{ $berita->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        <!-- Nomor Halaman -->
                        @php
                            $lastPage = min($berita->lastPage(), 3); // Tampilkan maksimal tiga halaman
                        @endphp

                        @for ($i = 1; $i <= $lastPage; $i++)
                            <li class="page-item {{ $berita->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $berita->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($berita->nextPageUrl())
                            <li class="page-item">
                                <a class="page-link" href="{{ $berita->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
