@section('regulasi')
   
    {{-- tambah --}}
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ route('regulasi.simpan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nama_file" class="col-sm-3 col-form-label">Nama File</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_file" id="nama_file" placeholder="Nama File">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="file" class="col-sm-3 col-form-label">File</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="file" id="file" placeholder="File" accept=".pdf">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipe" class="col-sm-3 col-form-label">Tipe</label>
                            <div class="col-sm-9">
                                <select class="form-control form-control" id="kategori" name="tipe" required>
                                    <option selected hidden>Pilih</option>
                                    @foreach($kategori as $x)
                                    <option value="{{ $x->kategori }}">{{ $x->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Tanggal" class="col-sm-3 col-form-label">Tanggal Upload</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tgl_file" id="tanggal" placeholder="Tanggal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Tanggal" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan">
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
                    <h3>Regulasi</h3>
                    <button type="button" class="btn btn-inverse-success btn-fw" data-toggle="modal"
                        data-target="#tambah">Tambah
                        File</button>
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
            <form action="{{ route('regulasi.cariDashboard') }}" method="get" class="d-flex">
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
        <div class=" stretch-card mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead class="">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama File</th>
                                    <th scope="col">Tipe</th>
                                    <th scope="col">Tanggal Upload</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regulasi as $key=>$x)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $x->nama_file}}</td>
                                    <td>{{ $x->tipe}}</td>
                                    <td>{{ $x->tgl_file}}</td>
                                    <td>{{ $x->ket}}</td>
                                    <td>
                                        <button type="button" class="btn btn-inverse-info btn-fw btn-sm"
                                            data-toggle="modal" data-target="#detail-file_{{ $x->id}}">Detail
                                            File</button>
                                        <button type="button" class="btn btn-inverse-warning btn-fw btn-sm"
                                            data-toggle="modal" data-target="#edit_{{ $x->id}}">Ubah
                                            File</button>

                                        <button type="button" class="btn btn-inverse-danger btn-fw btn-sm"
                                            data-toggle="modal" data-target="#hapus_{{ $x->id}}">Hapus
                                            File</button>

                                    </td>
                                </tr>
                                {{-- edit --}}
                                <div class="modal fade" id="edit_{{ $x->id}}" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Ubah File</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="forms-sample" action="{{ route('regulasi.update', $x->id) }}" method="POST" enctype="multipart/form-data"> @csrf @method('PUT')
                                                    <div class="form-group row">
                                                        <label for="nama_file" class="col-sm-3 col-form-label">Nama File</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="nama_file" id="nama_file_ubah" value="{{ $x->nama_file}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tipe" class="col-sm-3 col-form-label">Tipe</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="kategori" name="tipe" required>
                                                                @foreach($kategori as $k)
                                                                    <option value="{{ $k->kategori }}" @if($k->kategori == $x->tipe) selected @endif>
                                                                        {{ $k->kategori }}
                                                                    </option>
                                                                @endforeach
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="file" class="col-sm-3 col-form-label">File</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control" name="file" id="file_ubah" placeholder="File"
                                                                accept=".pdf">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Tanggal" class="col-sm-3 col-form-label">Tanggal Upload</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" class="form-control" name="tgl_file" id="tanggal_ubah" value="{{ $x->tgl_file}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="ket" id="ket" value="{{ $x->ket}}">
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
                                <div class="modal fade" id="hapus_{{ $x->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus File</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Hapus File ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('regulasi.delete', $x->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- detail --}}
                                <div class="modal fade" id="detail-file_{{ $x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl ">
                                        <div class="modal-content bg-white">
                                            <div class="modal-header">
                                                <p class="modal-title fs-5" id="exampleModalLabel">Lihat Dokumen {{ $x->nama_file}}</p>                        
                                            </div>
                                            
                                            <div class="modal-body ">
                                                <div class="ratio" style="--bs-aspect-ratio: 50%;">
                                                    <embed width="100%" height="650"
                                                    src="{{ asset($x->file) }}"
                                                    type="application/pdf">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                    aria-label="Close">Tutup</button>
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
                    @if($regulasi->previousPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $regulasi->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @endif
        
                    <!-- Nomor Halaman -->
                    @php
                        $lastPage = min($regulasi->lastPage(), 3); // Tampilkan maksimal tiga halaman
                    @endphp
        
                    @for($i = 1; $i <= $lastPage; $i++)
                        <li class="page-item {{ $regulasi->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $regulasi->appends(['judul' => request('judul')])->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
        
                    @if($regulasi->nextPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $regulasi->appends(['judul' => request('judul')])->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
@endsection
