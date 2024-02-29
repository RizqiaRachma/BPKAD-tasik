@section('carousel')
    {{-- tambah --}}
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Carousel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ route('carousel.simpan') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="judul" class="col-sm-3 col-form-label">Caption</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="judul"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="foto" id="file" placeholder="File"
                                    accept=".jpeg, .jpg, .png ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ket" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ket" id="keterangan"
                                    placeholder="Keterangan">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <button class="btn btn-light" data-dismiss="modal" aria-label="Close">Batal</button>
                    </form>


                </div>
            </div>
        </div>
    </div>



    <div class="content-wrapper">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class=" stretch-card">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Carousel</h3>
                    <button type="button" class="btn btn-inverse-success btn-fw" data-toggle="modal"
                        data-target="#tambah">Tambah
                        Carousel</button>
                </div>
            </div>
        </div>
        <div class=" stretch-card mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead class="">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Caption</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carousel as $key => $x)
                                    <tr>
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td style="max-width: 10em; overflow: hidden; text-overflow: ellipsis;">

                                            <a href="javascript:void(0)" class="text-dark" data-bs-toggle="modal"
                                                data-bs-target="#judul_{{ $x->id }}"> {!! $x->judul !!}
                                            </a>
                                        </td>

                                        <td>
                                            <a href="{{ asset($x->foto) }}" class="image-spotlight">
                                                <img src="{{ asset($x->foto) }}" class="img-fluid"
                                                    style="width:10rem;height:10rem;border-radius:10px; object-fit:contain">
                                            </a>
                                        </td>
                                        <td style="max-width: 10em; overflow: hidden; text-overflow: ellipsis;">
                                            <a href="javascript:void(0)" class="text-dark" data-bs-toggle="modal"
                                                data-bs-target="#keterangan_{{ $x->id }}">{{ $x->ket }}
                                            </a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-warning btn-fw btn-sm"
                                                data-toggle="modal" data-target="#edit_{{ $x->id }}">Ubah
                                                Foto</button>

                                            <button type="button" class="btn btn-inverse-danger btn-fw btn-sm"
                                                data-toggle="modal" data-target="#hapus_{{ $x->id }}">Hapus
                                                Foto</button>

                                        </td>
                                    </tr>
                                    {{-- modal detail Judul --}}
                                    <div class="modal fade" id="judul_{{ $x->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="tambah" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Judul</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! $x->judul !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- modal detail Keterangan --}}
                                    <div class="modal fade" id="keterangan_{{ $x->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="tambah" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Teks </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ $x->ket }}
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Carousel</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="forms-sample"
                                                        action="{{ route('carousel.update', $x->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group row">
                                                            <label for="judul"
                                                                class="col-sm-3 col-form-label">Caption</label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control" name="judul" value="{{ $x->judul }}">{{ $x->judul }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="judul"
                                                                class="col-sm-3 col-form-label">Foto</label>
                                                            <div class="col-sm-9">
                                                                <input type="file" class="form-control" name="foto"
                                                                    id="file_ubah" placeholder="File"
                                                                    accept=".jpeg, .png, .png ">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="judul"
                                                                class="col-sm-3 col-form-label">Keterangan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="ket"
                                                                    id="keterangan_ubah" value="{{ $x->ket }}"
                                                                    placeholder="Keterangan ">
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary mr-2">Simpan</button>
                                                        <button class="btn btn-light" data-dismiss="modal"
                                                            aria-label="Close">Batal</button>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- hapus --}}
                                    <div class="modal fade" id="hapus_{{ $x->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Carousel</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin Hapus Carousel ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                    <form action="{{ route('carousel.delete', $x->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 d-flex justify-content-center justify-content-lg-end mt-5">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-secondary justify-content-end">
                    @if ($carousel->previousPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $carousel->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @endif

                    <!-- Nomor Halaman -->
                    @php
                        $lastPage = min($carousel->lastPage(), 3); // Tampilkan maksimal tiga halaman
                    @endphp

                    @for ($i = 1; $i <= $lastPage; $i++)
                        <li class="page-item {{ $carousel->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $carousel->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    @if ($carousel->nextPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $carousel->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>

        </div>
    </div>
@endsection
