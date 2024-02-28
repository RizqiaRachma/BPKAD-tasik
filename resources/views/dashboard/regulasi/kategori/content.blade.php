@section('kategori_regulasi')
    
    {{-- tambah --}}
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kategori Produk Hukum</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ route('kategori_regulasi.simpan') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="judul" class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kategori" id="kategori_tambah" placeholder="Kategori">
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
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class=" stretch-card">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Kategori Produk Hukum</h3>
                    <button type="button" class="btn btn-inverse-success btn-fw" data-toggle="modal"
                        data-target="#tambah">Tambah
                        Kategori</button>
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
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach($kategori as $x)
                                <tr>
                                    <th class="text-center" scope="row">{{ $loop->index + 1 }}</th>
                                    <td class="text-center">{{ $x->kategori }}</td>
                                    <td>
                                        <button type="button" class="btn btn-inverse-warning btn-fw btn-sm"
                                            data-toggle="modal" data-target="#edit_{{ $x->id }}">Ubah
                                            Kategori</button>

                                        <button type="button" class="btn btn-inverse-danger btn-fw btn-sm"
                                            data-toggle="modal"  data-target="#hapus_{{ $x->id }}">Hapus
                                            Kategori</button>

                                    </td>
                                </tr>
                                 {{-- edit --}}
                                <div class="modal fade" id="edit_{{ $x->id }}" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Kategori</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="forms-sample" action="{{ route('kategori_regulasi.update', $x->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT') 
                                                    <div class="form-group row">
                                                        <label for="judul" class="col-sm-3 col-form-label">Kategori</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="kategori_edit" value="{{ $x->kategori }}" name="kategori">
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
                                <div class="modal fade" id="hapus_{{ $x->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Kategori</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Hapus Kategori ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('kategori_regulasi.delete', $x->id) }}" method="POST">
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
                    @if($kategori->previousPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $kategori->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @endif
        
                    <!-- Nomor Halaman -->
                    @php
                        $lastPage = min($kategori->lastPage(), 3); // Tampilkan maksimal tiga halaman
                    @endphp
        
                    @for($i = 1; $i <= $lastPage; $i++)
                        <li class="page-item {{ $kategori->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $kategori->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
        
                    @if($kategori->nextPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $kategori->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
                </div>
    </div>
@endsection
