@section('monev')
    
    <div class="position-relative px-5 mt-5">
        <nav aria-label="breadcrumb " data-bs-theme="dark">
            <ol class="breadcrumb">
                <li class="breadcrumb-item breadcrumb-nonactive ">Informasi Publik</li>
                <li class="breadcrumb-item active " aria-current="page">Monev</li>
            </ol>
        </nav>
        <div class="container-fluid table-responsive">
            <table class="rounded-corners w-100">
                <thead>
                    <tr>
                        <th scope="col" class="p-3 col-1">No</th>
                        <th scope="col" class="p-3 col-1">Tanggal</th>
                        <th scope="col" class="p-3 col">Nama File</th>
                        <th scope="col" class="p-3 col">Keterangan</th>
                        <th scope="col" class="p-3 col-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($informasi as $key=>$x)
                    <tr> 
                        <th scope="row" class="p-3">{{ $key + 1 }}</th>
                        <td class="p-3">{{ $x->tgl_file}}</td>
                        <td class="p-3">{{ $x->nama_file}}</td>
                        <td class="p-3">{{ $x->ket}}</td>
                        <td class="p-3">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#detail-file_{{ $x->id}}" data-bs-theme="dark"
                                href="javascript:void(0)" class="btn btn-info text-white">Detail</a>
                        </td>
                    </tr>
                    <!-- Modal -->
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
                </tbody>
            </table>
            <div class="w-100 d-flex justify-content-center justify-content-lg-end mt-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-secondary justify-content-end">
                        @if($informasi->previousPageUrl())
                            <li class="page-item">
                                <a class="page-link" href="{{ $informasi->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif
            
                        <!-- Nomor Halaman -->
                        @php
                            $lastPage = min($informasi->lastPage(), 3); // Tampilkan maksimal tiga halaman
                        @endphp
            
                        @for($i = 1; $i <= $lastPage; $i++)
                            <li class="page-item {{ $informasi->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $informasi->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
            
                        @if($informasi->nextPageUrl())
                            <li class="page-item">
                                <a class="page-link" href="{{ $informasi->nextPageUrl() }}" aria-label="Next">
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
