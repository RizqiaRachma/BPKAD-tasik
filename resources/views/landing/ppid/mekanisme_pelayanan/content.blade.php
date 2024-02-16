@section('mekanisme_pelayanan')
    <!-- Modal -->
    <div class="modal fade" id="detail-file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content text-white">
                <div class="modal-header" data-bs-theme="dark">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nama File</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <embed width="100%" height="650"
                        src="https://drive.google.com/file/d/1Camvj78lOd8LsmEBTgJvipaux7DYdlY9/view" type="application/pdf">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="position-relative px-5 mt-5">
        <nav aria-label="breadcrumb " data-bs-theme="dark">
            <ol class="breadcrumb">
                <li class="breadcrumb-item breadcrumb-nonactive ">PPID</li>
                <li class="breadcrumb-item active " aria-current="page">Mekanisme Pelayanan</li>
            </ol>
        </nav>
        <div class="container-fluid table-responsive">
            <table class="rounded-corners w-100">
                <thead>
                    <tr>
                        <th scope="col" class="p-3 col-1">No</th>
                        <th scope="col" class="p-3 col-1">Tanggal</th>
                        <th scope="col" class="p-3 col">Nama File</th>
                        <th scope="col" class="p-3 col-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="p-3">1</th>
                        <td class="p-3">Mark</td>
                        <td class="p-3">Otto</td>
                        <td class="p-3">
                            <button class="btn btn-success">Unduh</button>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#detail-file" data-bs-theme="dark"
                                href="javascript:void(0)" class="btn btn-info text-white">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="p-3">2</th>
                        <td class="p-3">Jacob</td>
                        <td class="p-3">Thornton</td>
                        <td class="p-3">
                            <button class="btn btn-success">Unduh</button>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#detail-file" data-bs-theme="dark"
                                href="javascript:void(0)" class="btn btn-info text-white">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="p-3">3</th>
                        <td class="p-3">Jacob</td>
                        <td class="p-3">lorem</td>
                        <td class="p-3 ">
                            <button class="btn btn-success">Unduh</button>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#detail-file" data-bs-theme="dark"
                                href="javascript:void(0)" class="btn btn-info text-white">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="w-100 d-flex justify-content-center justify-content-lg-end mt-5">
                <nav aria-label="Page navigation example" data-bs-theme="dark">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&lt;</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&gt;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
