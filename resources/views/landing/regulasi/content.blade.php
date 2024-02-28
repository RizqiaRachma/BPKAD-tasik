@section('produk_hukum')
    <div class="position-relative px-5 mt-4">
        <div class="text-center">
            <p class="h1 text-white">Produk Hukum</p>
        </div>
        <div class="container-fluid d-flex justify-content-end mb-5">
            <form action="{{ route('produk_hukum.cari') }}" method="get">
                @csrf
                <div class="input-group">
                    <input class="form-control border-end-0 border-top-0 border-start-0 rounded-0  border-light text-white"
                        type="text" placeholder="Apa yang anda cari ?" name="keyword" id="searchbar-header"
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
        <div class="container-fluid row p-0 px-xxl-5 g-3" style="">
            @foreach ($regulasi as $x)
                <div class="col-lg-12">
                    <div class="card text-dark bg-glass-card-regulasi py-3 px-3 rounded-4">
                        <div class="hstack gap-5 px-4 px-xxl-0">
                            <div class="p-2 ms-4 d-none d-md-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="6rem" height="6rem" fill="currentColor"
                                    class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                                    <path fill-rule="evenodd"
                                        d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                                </svg>

                            </div>
                            <div class="d-none d-md-flex" style="height: 8rem">
                                <div class="vr"></div>
                            </div>
                            <div class="row gy-2 mt-1 d-flex justify-content-center align-items-center">
                                <div class="col-12 p-0">
                                    <p class="h4 text-dark">
                                        {{ $x->nama_file }}
                                    </p>
                                </div>
                                <div class="col-12 p-0">
                                    <p class="h6 text-dark">
                                        {{ $x->ket }}
                                    </p>
                                </div>
                                <div class="p-0 col-12 text-secondary breadcrumb "
                                    style="--bs-breadcrumb-margin-bottom:0;--bs-breadcrumb-divider-color:#6c757d">
                                    <p class="breadcrumb-item text-secondary ">{{ $x->tgl_file }}</p>
                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#detail-file_{{ $x->id }}"
                                        class="breadcrumb-item link-secondary  text-decoration-none"><i
                                            class="bi bi-eye me-1"></i> Preview</a>
                                    <p class="breadcrumb-item text-secondary ">{{ $x->tipe }}</p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="detail-file_{{ $x->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content bg-white">
                            <div class="modal-header" data-bs-theme="white">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Dokumen {{ $x->nama_file }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <embed width="100%" height="650" src="{{ asset($x->file) }}" type="application/pdf">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach<div class="col-12">
                <div class="w-100 d-flex justify-content-center justify-content-lg-end mt-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-secondary justify-content-end">
                            @if ($regulasi->previousPageUrl())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $regulasi->previousPageUrl() }}"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            @endif

                            <!-- Nomor Halaman -->
                            @php
                                $lastPage = min($regulasi->lastPage(), 3); // Tampilkan maksimal tiga halaman
                            @endphp

                            @for ($i = 1; $i <= $lastPage; $i++)
                                <li class="page-item {{ $regulasi->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link"
                                        href="{{ $regulasi->appends(['keyword' => request('keyword')])->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($regulasi->nextPageUrl())
                                <li class="page-item">
                                    <a class="page-link"
                                        href="{{ $regulasi->appends(['keyword' => request('keyword')])->nextPageUrl() }}"
                                        aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
