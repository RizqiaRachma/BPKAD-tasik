@section('pesan')
    
    <div class="content-wrapper">
        <div class=" stretch-card">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Pesan</h3>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid d-flex justify-content-end">
            <form action="{{ route('pesan.cariDashboard') }}" method="get" class="d-flex">
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
                                    <th scope="col">Tiket</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Pesan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Jawaban</th>
                                    <th scope="col">Alasan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesan as $key=>$x)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td> {{ $x->tiket }} </td>
                                    <td> {{ $x->nama_pemohon }}</td>
                                    <td> {{ $x->email }} </td>
                                    <td> {{ $x->pesan }}</td>
                                    <td>
                                        @if($x->status == "Dijawab")
                                            <div class="badge badge-success">
                                                Dijawab
                                            </div>
                                        @elseif($x->status == "Ditolak")
                                            <div class="badge badge-danger">
                                                Ditolak
                                            </div>
                                        @else
                                            <div class="badge badge-secondary">
                                                Menunggu
                                            </div>
                                        @endif
                                    </td>
                                    <td> {{ $x->jawaban }}</td>
                                    <td> {{ $x->alasan }}</td>
                                    <td> @if($x->status == "Menunggu")
                                        <button type="button" class="btn btn-inverse-success btn-fw btn-sm"
                                            data-toggle="modal" data-target="#jawab_{{ $x->id }}">Jawab Pesan</button>
                                        <button type="button" class="btn btn-inverse-danger btn-fw btn-sm"
                                            data-toggle="modal" data-target="#tolak_{{ $x->id }}">Tolak Jawab</button>
                                        @else 
                                        <div class="badge badge-primary">
                                            Selesai
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <div class="modal fade" id="jawab_{{ $x->id }}" tabindex="-1" role="dialog" aria-labelledby="jawab" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Jawab Pesan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="forms-sample" action="{{ route('pesan.jawab', $x->id) }}" method="post">
                                                    @csrf @method('PUT')
                                                    <div class="form-group row">
                                                        <label for="nama_file" class="col-sm-3 col-form-label">Jawaban Pesan</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="jawaban" id="" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                                                    <button class="btn btn-light" data-dismiss="modal" aria-label="Close">Batal</button>
                                                </form>
                            
                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="tolak_{{ $x->id }}" tabindex="-1" role="dialog" aria-labelledby="jawab" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Jawab Pesan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="forms-sample" action="{{ route('pesan.tolak', $x->id) }}" method="post">
                                                    @csrf @method('PUT')
                                                    <div class="form-group row">
                                                        <label for="nama_file" class="col-sm-3 col-form-label">Alasan di tolak</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="alasan" id="" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                                                    <button class="btn btn-light" data-dismiss="modal" aria-label="Close">Batal</button>
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
                    @if($pesan->previousPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $pesan->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @endif
        
                    <!-- Nomor Halaman -->
                    @php
                        $lastPage = min($pesan->lastPage(), 3); // Tampilkan maksimal tiga halaman
                    @endphp
        
                    @for($i = 1; $i <= $lastPage; $i++)
                        <li class="page-item {{ $pesan->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $pesan->appends(['judul' => request('judul')])->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
        
                    @if($pesan->nextPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $pesan->appends(['judul' => request('judul')])->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        
        
    </div>
@endsection
