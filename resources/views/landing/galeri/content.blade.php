@section('galeri')
    <div class="position-relative px-5 mt-5">
        <nav aria-label="breadcrumb " data-bs-theme="dark">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-white h3">Galeri</li>
            </ol>
        </nav>
        <div class="container-fluid px-3 bg-white rounded-3 ">
            <ul class="nav nav-underline " id="myTab" role="tablist" style="--bs-nav-link-font-size:1.3rem"
                data-bs-theme="light">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#galeri-foto"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"
                        href="#">Foto</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="#" id="profile-tab" data-bs-toggle="tab" data-bs-target="#galeri-video"
                        type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Video</a>
                </li>
            </ul>
            <div class="tab-content" id="galeri">
                <div class="tab-pane fade show active" id="galeri-foto" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div class="row mt-3 g-4 mb-5" style="min-height:60vh">
                        @foreach($foto as $x)
                        <a href="{{ asset($x->foto)}}"
                            class="col-12 col-md-6 col-xl-4 col-xxl-3 d-flex justify-content-center" data-toggle="lightbox"
                            data-gallery="image-gallery" data-type="image" data-caption="img 1">
                            <img src="{{ asset($x->foto)}}"
                                alt="" class="rounded-4 w-100" style=" height:20rem;">
                        </a>
                        @endforeach
                    </div>

                    <div class="w-100 d-flex justify-content-center justify-content-lg-end mt-5">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-secondary justify-content-end">
                                @if($foto->previousPageUrl())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $foto->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @endif
                    
                                <!-- Nomor Halaman -->
                                @php
                                    $lastPage = min($foto->lastPage(), 3); // Tampilkan maksimal tiga halaman
                                @endphp
                    
                                @for($i = 1; $i <= $lastPage; $i++)
                                    <li class="page-item {{ $foto->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $foto->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                    
                                @if($foto->nextPageUrl())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $foto->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                        
                    </div>
                </div>


                <div class="tab-pane fade" id="galeri-video" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="row mt-3 g-4 mb-5" style="min-height:60vh">

                        {{-- untuk video, user harus mengambil id dari video
                            contoh link
                            https://www.youtube.com/watch?v=b2KXsyoaBF4
                            11 kumpulan huruf dan angka setelah v= adalah id dari video
                            b2KXsyoaBF4
                            --}}
                            @foreach($video as $x)
                        <a href="https://www.youtube.com/watch?v={{ $x->youtube }}"
                            class="col-12 col-md-6 col-xl-4 col-xxl-3 d-flex justify-content-center video-gallery"
                            data-toggle="lightbox" data-gallery="video-gallery" data-type="video">
                            <img src="https://img.youtube.com/vi/{{ $x->youtube }}/hqdefault.jpg " alt=""
                                class="rounded-4 w-100" style=" height:20rem;">
                        </a>
                         @endforeach
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
            </div>
        </div>
    </div>
@endsection
