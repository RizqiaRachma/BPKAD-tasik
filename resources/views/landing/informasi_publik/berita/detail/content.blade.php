@section('detail_berita')
    <div class="position-relative px-3 px-lg-5 mt-5">
        <nav aria-label="breadcrumb " data-bs-theme="dark">
            <ol class="breadcrumb">
                <li class="breadcrumb-item breadcrumb-nonactive ">Informasi Publik</li>
                <li class="breadcrumb-item breadcrumb-nonactive" aria-current="page">Berita & Artikel</li>
                <li class="breadcrumb-item active " aria-current="page">{{ $detailBerita->judul }}</li>
            </ol>
        </nav>
        <div class="row gy-3 text-dark bg-white rounded-3 px-3 pb-3">
            <div class="col-12 col-xl-12 d-flex justify-content-center">
                <img src="{{ asset($detailBerita->foto) }}" alt="" style="max-height: 40rem"
                    class="img-fluid rounded mx-auto d-block">
            </div>

            <div class="col-12 col-xl-12 d-flex flex-column justify-content-center">
                <nav aria-label="breadcrumb" class="my-4">
                    <ol class="breadcrumb text-dark">
                        <li class="breadcrumb-item fw-medium">{{ $detailBerita->created_at }}</li>
                        <li class="breadcrumb-item fw-medium">| {{ $detailBerita->kategori }}</li>
                    </ol>
                </nav>
                <p class="h2 fw-semibold text-dark mb-3">{{ $detailBerita->judul }}</p>
                <p class="h4 text-dark text-capitalize">{!! $detailBerita->deskripsi !!}</p>
            </div>
        </div>

    </div>
@endsection
