@section('informasi_publik')
    <div class="position-relative px-5 mt-4">
        <div class="text-center">
            <p class="h1 text-white">Informasi Publik</p>
        </div>
        <div class="container-fluid d-flex justify-content-end mb-5">

            <div class="row">
                <div class="col-12">
                    <div class="row mt-3">
                        @foreach ($berita as $x)
                            <div class="col-md-6 col-lg-4 col-xxl-3 my-3">
                                <div class="card bg-white" style="min-height:47rem">
                                    <div class="card-body row">
                                        <div class="col-12">
                                            <img src="{{ asset($x->foto) }}" alt="" class=""
                                                style="width:100%; border-radius:10px;object-fit:contain; height:20rem;
                                                /* background-color:rgb(228, 228, 228) */
                                                ">
                                        </div>
                                        <div class="col-12">
                                            <p class="fs-25">
                                                <b> {{ $x->judul }} </b>
                                            </p>
                                            <p class="text-truncate">{{ $x->kategori }}</p>
                                            <p class="text-truncate">Create : {{ $x->created_at }}</p>
                                            <p class="text-truncate">Update : {{ $x->updated_at }}</p>
                                            <p class="text-truncate">{!! Str::limit($x->deskripsi, 100) !!}</p>
                                            <div class="mt-5  w-100">
                                                <button type="button" class=" btn btn-outline-info btn-fw btn-sm"
                                                    data-toggle="modal" data-target="#detail_{{ $x->id }}">Kategori
                                                    berita
                                                </button>

                                                <button type="button" class=" btn btn-outline-warning btn-fw btn-sm"
                                                    data-toggle="modal" data-target="#edit_{{ $x->id }}">Kategori
                                                    berita
                                                </button>

                                                <button type="button" class=" btn btn-outline-danger btn-fw btn-sm"
                                                    data-toggle="modal" data-target="#hapus_{{ $x->id }}">Kategori
                                                    berita
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- detail --}}
                            <div class="modal fade" id="detail_{{ $x->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ $x->judul }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {!! $x->deskripsi !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- edit --}}
                            <div class="modal fade" id="edit_{{ $x->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="tambah" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Ubah Berita</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="forms-sample" action="{{ route('berita.update', $x->id) }}"
                                                method="POST" enctype="multipart/form-data"> @csrf @method('PUT')
                                                <div class="form-group row">
                                                    <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="judul"
                                                            id="judul" value="{{ $x->judul }}"
                                                            placeholder="Judul Berita">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" id="kategori" name="kategori"
                                                            required>
                                                            @foreach ($kategori as $k)
                                                                <option value="{{ $k->kategori }}"
                                                                    @if ($k->kategori == $x->kategori) selected @endif>
                                                                    {{ $k->kategori }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" name="deskripsi" value="{{ $x->deskripsi }}" rows="5" placeholder="Deskripsi">{{ $x->deskripsi }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="foto_utama" class="col-sm-3 col-form-label">Foto</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group ">
                                                            <input type="file" accept=".jpg, .png, .jpeg"
                                                                name="foto" class="form-control file-upload-info"
                                                                placeholder="Upload Foto">
                                                        </div>
                                                    </div>
                                                </div>



                                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                                <button class="btn btn-light" data-dismiss="modal"
                                                    aria-label="Close">Batal</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- hapus --}}
                            <div class="modal fade" id="hapus_{{ $x->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Berita</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin Hapus Berita ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <form action="{{ route('berita.delete', $x->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
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
                                @if ($berita->previousPageUrl())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $berita->previousPageUrl() }}"
                                            aria-label="Previous">
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
                                        <a class="page-link"
                                            href="{{ $berita->appends(['judul' => request('judul')])->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($berita->nextPageUrl())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $berita->appends(['judul' => request('judul')])->nextPageUrl() }}"
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
