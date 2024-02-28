@section('informasi_publik')
    <div class="position-relative px-5 mt-4">
        <div class="text-center">
            <p class="h1 text-white">Informasi Publik</p>
        </div>
        <div class="container-fluid d-flex justify-content-end">
            <form action="{{ route('informasi_publik.cari') }}" method="get">
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
        <div class="container-fluid d-flex justify-content-end mb-5">

            <div class="row">
                <div class="col-12">
                    <div class="row mt-3">
                        @foreach ($informasi as $x)
                            <div class="col-md-6 col-lg-4 col-xxl-3 my-3">
                                <div class="card bg-white" style="min-height:47rem">
                                    <div class="card-body row">
                                        <div class="col-12">
                                            <embed width="100%" height="100%" src="{{ asset($x->file) }}" type="application/pdf">

                                        </div>
                                        <div class="col-12">
                                            <p class="fs-25">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#detail-file_{{ $x->id }}"
                                                class="breadcrumb-item link-secondary  text-decoration-none"><b> {{ $x->nama_file }} </b></a>
                                            </p>
                                            <p class="text-truncate">{{ $x->tipe }}</p>
                                            <p class="text-truncate">Create : {{ $x->created_at }}</p>
                                            <p class="text-truncate">Update : {{ $x->updated_at }}</p>
                                            <p class="text-truncate">{!! Str::limit($x->ket, 100) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- detail --}}
                            <div class="modal fade" id="detail-file_{{ $x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content bg-white">
                                        <div class="modal-header" data-bs-theme="white">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Dokumen {{ $x->nama_file}}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <embed width="100%" height="650"
                                                src="{{ asset($x->file) }}" type="application/pdf">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12">
                    <div class="w-100 d-flex justify-content-center justify-content-lg-end mt-5">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-secondary justify-content-end">
                                @if ($informasi->previousPageUrl())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $informasi->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @endif

                                <!-- Nomor Halaman -->
                                @php
                                    $lastPage = min($informasi->lastPage(), 3); // Tampilkan maksimal tiga halaman
                                @endphp

                                @for ($i = 1; $i <= $lastPage; $i++)
                                    <li class="page-item {{ $informasi->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link"
                                            href="{{ $informasi->appends(['keyword' => request('keyword')])->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($informasi->nextPageUrl())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $informasi->appends(['keyword' => request('keyword')])->nextPageUrl() }}"
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
