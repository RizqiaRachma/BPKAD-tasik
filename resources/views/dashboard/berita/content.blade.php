@section('berita')
    
    
    {{-- tambah --}}
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
        <div class="modal-dialog  modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ route('berita.simpan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Berita">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kategori" class="col-sm-3 col-form-label">Kategori (berdasarkan list
                                kategori)</label>
                            <div class="col-sm-9">
                                <select class="form-control form-control" id="kategori" name="kategori" required>
                                        <option selected hidden>Pilih Kategori</option>
                                        @foreach($kategori as $x)
                                        <option value="{{ $x->kategori }}">{{ $x->kategori }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="deskripsi" placeholder="silahkan masukan isi berita"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_utama" class="col-sm-3 col-form-label">Foto berita</label>
                            <div class="col-sm-9">
                                <div class="input-group ">
                                    <input type="file" accept=".jpg, .png, .jpeg" class="form-control file-upload-info"
                                      name="foto"  placeholder="Upload Foto">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_utama" class="col-sm-3 col-form-label">Thumbnail (1080x1080)</label>
                            <div class="col-sm-9">
                                <div class="input-group ">
                                    <input type="file" accept=".jpg, .png, .jpeg" class="form-control file-upload-info"
                                      name="thumbnail"  placeholder="Upload Foto">
                                </div>
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
        <div class=" stretch-card">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>List Berita</h3>
                    <button type="button" class="btn btn-inverse-success btn-fw" data-toggle="modal"
                        data-target="#tambah">Tambah
                        Berita</button>
                </div>
            </div>
        </div>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <br>
        <div class="container-fluid d-flex justify-content-end">
            <form action="{{ route('berita.cariDashboard') }}" method="get" class="d-flex">
                @csrf
                <div class="input-group">
                    <input class="form-control rounded-0 border-dark text-dark" type="text" placeholder="Apa yang anda cari ?"
                        name="judul" id="searchbar-header" style="color: rgb(22, 20, 20)">
                    <div class="input-group-append">
                        <button class="btn btn-outline-dark rounded-0 border-dark" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="dark"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        
        <div class="row mt-3">
            @foreach($berita as $x)
            <div class="col-md-6 my-3">
                <div class="card card-black">
                    <div class="card-body row">
                        <div class="col-3 d-flex align-items-center">
                            @if ($x->thumbnail != null)
                                <img src="{{ asset($x->thumbnail) }}" alt="" style="width:100%; border-radius:10px">
                            @else
                                <img src="{{ asset($x->foto) }}" alt="" style="width:100%; border-radius:10px">
                            @endif

                        </div>
                        <div class="col-9">
                            <p class="fs-25">
                               <b> {{ $x->judul }} </b> </p>
                            <p class="text-truncate">{{ $x->kategori }}</p>
                            <p class="text-truncate">Create : {{ $x->created_at }}</p>
                            <p class="text-truncate">Update : {{ $x->updated_at }}</p>
                            <p class="text-truncate">{!! Str::limit($x->deskripsi, 100) !!}</p>
                            <div class="mt-5">
                                <button type="button" class="btn btn-inverse-info btn-fw btn-sm" data-toggle="modal"
                                    data-target="#detail_{{ $x->id }}">Detail
                                    Berita</button>

                                <button type="button" class="btn btn-inverse-warning btn-fw btn-sm" data-toggle="modal"
                                    data-target="#edit_{{ $x->id }}">Ubah
                                    Berita</button>

                                <button type="button" class="btn btn-inverse-danger btn-fw btn-sm" data-toggle="modal"
                                    data-target="#hapus_{{ $x->id }}">Hapus
                                    Berita</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
     

        {{-- detail --}}
    <div class="modal fade" id="detail_{{ $x->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $x->judul}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset($x->foto) }}" alt="" style="width:100%; border-radius:10px">
                    {!! $x->deskripsi !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
     {{-- edit --}}
     <div class="modal fade" id="edit_{{ $x->id }}" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ route('berita.update', $x->id) }}" method="POST" enctype="multipart/form-data"> @csrf @method('PUT')
                        <div class="form-group row">
                            <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="judul" id="judul" value="{{ $x->judul }}" placeholder="Judul Berita">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="kategori" name="kategori" required>
                                    @foreach($kategori as $k)
                                        <option value="{{ $k->kategori }}" @if($k->kategori == $x->kategori) selected @endif>
                                            {{ $k->kategori }}
                                        </option>
                                    @endforeach
                                </select>                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="deskripsi" value="{{ $x->deskripsi }}"  rows="5" placeholder="Deskripsi">{{ $x->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_utama" class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <div class="input-group ">
                                    <input type="file" accept=".jpg, .png, .jpeg" name="foto"
                                        class="form-control file-upload-info" placeholder="Upload Foto" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_utama" class="col-sm-3 col-form-label">Thumbnail (1080x1080)</label>
                            <div class="col-sm-9">
                                <div class="input-group ">
                                    <input type="file" accept=".jpg, .png, .jpeg" name="thumbnail"
                                        class="form-control file-upload-info" placeholder="Upload Foto" >
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <button class="btn btn-light" data-dismiss="modal" aria-label="Close">Batal</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- hapus --}}
    <div class="modal fade" id="hapus_{{ $x->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin Hapus Berita ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
        <div class="w-100 d-flex justify-content-center justify-content-lg-end mt-5">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-secondary justify-content-end">
                    @if($berita->previousPageUrl())
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
        
                    @for($i = 1; $i <= $lastPage; $i++)
                        <li class="page-item {{ $berita->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $berita->appends(['judul' => request('judul')])->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
        
                    @if($berita->nextPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $berita->appends(['judul' => request('judul')])->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
@endsection
