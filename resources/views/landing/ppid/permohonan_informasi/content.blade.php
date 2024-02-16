@section('permohonan_informasi')
    <div class="position-relative px-5 mt-5">
        <nav aria-label="breadcrumb " data-bs-theme="dark">
            <ol class="breadcrumb">
                <li class="breadcrumb-item breadcrumb-nonactive ">PPID</li>
                <li class="breadcrumb-item active " aria-current="page">Permohonan Informasi</li>
            </ol>
        </nav>
        <div class="container-fluid ">
            {{-- kanan --}}
            <form action="" class="row w-100">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="col-12 text-white">
                            <p>Tipe Pemohon</p>
                            <input type="radio" class="btn-check" name="tipe-pemohon" id="perorangan" autocomplete="off"
                                value="perorangan" checked>
                            <label class="btn btn-outline-light" for="perorangan">Perorangan</label>

                            <input type="radio" class="btn-check" name="tipe-pemohon" id="kelompok_masyarakat"
                                value="kelompok_masyarakat" autocomplete="off">
                            <label class="btn btn-outline-light" for="kelompok_masyarakat">Kelompok Masyarakat</label>

                            <input type="radio" class="btn-check" name="tipe-pemohon" id="pemohon_berbadan_hukum"
                                value="pemohon_berbadan_hukum" autocomplete="off">
                            <label class="btn btn-outline-light" for="pemohon_berbadan_hukum">Pemohon Berbadan
                                Hukum</label>


                        </div>
                        <div class="row g-2" id="form-inputs">
                            {{-- input --}}

                        </div>
                    </div>
                    {{-- text --}}
                    <div class="col-12 col-lg-4">
                        <div class=" text-white p-3">
                            <p class="fw-semibold fs-5">Pemohon Informasi berhak untuk meminta seluruh informasi yang berada
                                di
                                Badan
                                Publik kecuali :
                            </p>
                            <ol>
                                <li>
                                    informasi yang apabila dibuka dan diberikan kepada pemohon informasi dapat: Menghambat
                                    proses
                                    penegakan hukum; </li>
                                <li>
                                    Menganggu kepentingan perlindungan hak atas kekayaan intelektual dan perlindungan dari
                                    persaingan usaha tidak sehat; </li>
                                <li>
                                    Membahayakan pertahanan dan keamanan Negara; </li>
                                <li>
                                    Mengungkap kekayaan alam Indonesia; </li>
                                <li>
                                    Merugikan ketahanan ekonomi nasional; </li>
                                <li>
                                    Merugikan kepentingan hubungan luar negeri; </li>
                                <li>
                                    Mengungkap isi akta otentik yang bersifat pribadi dan kemauan terakhir ataupun wasiat
                                    seseorang;
                                </li>
                                <li>Mengungkap rahasia pribadi;</li>
                                <li>Memorandum atau surat-suat antar Badan Publik atau intra Badan Publik yang menurut
                                    sifatnya
                                    dirahasiakan kecuali atas putusan Komisi Informasi atau Pengadilan;</li>
                                <li>
                                    Informasi yang tidak boleh diungkapkan berdasarkan Undang-undang.
                                </li>
                                <li>
                                    Badan Publik juga dapat tidak memberikan informasi yang belum dikuasai atau
                                    didokumentasikan.
                                </li>
                            </ol>

                            <p class="fw-semibold fs-5">
                                Jangka Waktu Penyelesaian :
                            </p>
                            <p>
                                10 (Sepuluh) Hari Kerja + 7 (Tujuh) Hari Kerja
                            </p>

                            <p class="fw-semibold fs-5">
                                Biaya/Tarif :
                            </p>

                            <p>
                                informasi yang disediakan adalah <span class="fw-semibold">gratis</span> (tidak dipungut
                                biaya),
                                jika ada penggandaan atau perekaman, biaya ditanggung oleh pemohon informasi.
                            </p>

                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn text-white btn-primary w-100">
                            Kirim
                        </button>
                    </div>
                </div>
            </form>


            {{-- kiri --}}

        </div>
    </div>
@endsection
