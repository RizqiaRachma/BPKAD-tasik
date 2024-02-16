@section('video_galeri')
   
    {{-- tambah --}}
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ route('video.simpan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="judul" class="col-sm-3 col-form-label">ID Youtube</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="youtube" id="id_youtube_tambah" placeholder="ID Youtube">
                            </div>
                        </div>
                        <p class="font-weight-bold">ID youtube didapatkan dari link url yang di tuju</p>
                        <p class="font-weight-bold ">contoh link https://www.youtube.com/watch?v=b2KXsyoaBF4 </p>
                        <p class="font-weight-bold mb-3">11 kombinasi huruf dan angka setelah v= adalah id dari video
                            (b2KXsyoaBF4)</p>
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
                    <h3>Video Galeri</h3>
                    <button type="button" class="btn btn-inverse-success btn-fw" data-toggle="modal"
                        data-target="#tambah">Tambah
                        Video</button>
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
                                    <th scope="col">ID Video</th>
                                    <th scope="col">Video Youtube</th>
                                    <th scope="col">Aksi</th>
                                </tr> 
                            </thead>
                            <tbody>
                                @foreach($video as $x)
                                <tr>
                                    <th class="text-center" scope="row">{{ $loop->index + 1 }}</th>
                                    <td> {{ $x->youtube }}</td>
                                    <td> <a href="https://www.youtube.com/watch?v={{ $x->youtube }}" data-toggle="lightbox"
                                            data-gallery="video-gallery" data-type="video">
                                            <img src="https://img.youtube.com/vi/{{ $x->youtube }}/hqdefault.jpg "
                                                alt="" class=""
                                                style=" width:10rem;height:10rem;border-radius:10px">
                                        </a></td>
                                    <td>
                                        <button type="button" class="btn btn-inverse-warning btn-fw btn-sm"
                                            data-toggle="modal" data-target="#edit_{{ $x->id }}">Ubah
                                            Video</button>

                                        <button type="button" class="btn btn-inverse-danger btn-fw btn-sm"
                                            data-toggle="modal" data-target="#hapus_{{ $x->id }}">Hapus
                                            Video</button>

                                    </td>
                                </tr>
                                {{-- edit --}}
                                <div class="modal fade" id="edit_{{ $x->id }}" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Video</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="forms-sample" action="{{ route('video.update', $x->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT') 
                                                    <div class="form-group row">
                                                        <label for="judul" class="col-sm-3 col-form-label">ID Youtube</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="youtube" id="id_youtube_edit" value="{{ $x->youtube}}" placeholder="ID Youtube">
                                                        </div>
                                                    </div>
                                                    <p class="font-weight-bold">ID youtube didapatkan dari link url yang di tuju</p>
                                                    <p class="font-weight-bold ">contoh link https://www.youtube.com/watch?v=b2KXsyoaBF4 </p>
                                                    <p class="font-weight-bold mb-3">11 kombinasi huruf dan angka setelah v= adalah id dari video
                                                        (b2KXsyoaBF4)</p>
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
                                                <h5 class="modal-title">Hapus Video</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Hapus Video ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('video.delete', $x->id) }}" method="POST">
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
                    @if($video->previousPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $video->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @endif
        
                    <!-- Nomor Halaman -->
                    @php
                        $lastPage = min($video->lastPage(), 3); // Tampilkan maksimal tiga halaman
                    @endphp
        
                    @for($i = 1; $i <= $lastPage; $i++)
                        <li class="page-item {{ $video->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $video->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
        
                    @if($video->nextPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $video->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
            
        </div>
    </div>
@endsection
