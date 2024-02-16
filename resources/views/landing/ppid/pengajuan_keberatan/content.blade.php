@section('pengajuan_keberatan')
    <div class="position-relative px-5 mt-5">
        <nav aria-label="breadcrumb " data-bs-theme="dark">
            <ol class="breadcrumb">
                <li class="breadcrumb-item breadcrumb-nonactive ">PPID</li>
                <li class="breadcrumb-item active " aria-current="page">Pengajuan Keberatan</li>
            </ol>
        </nav>
        <div class="container-fluid ">
            {{-- kanan --}}
            <form action="" class="row w-100">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            {{-- input --}}
                            <div class="col-12">
                                <div class="input-wrapper">
                                    <input autocomplete="off" class="input" type="text" id="nomor_pendaftaran" required
                                        placeholder="nomor pendaftaran" />
                                    <label class="label" for="nomor_pendaftaran">
                                        Nomor Pendaftaran Permohonan Informasi
                                        <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-wrapper">
                                    <textarea required autocomplete="off" class="textarea" name="informasi_dimohonkan" id="informasi_dimohonkan"
                                        placeholder="tujuan informasi"></textarea>
                                    <label class="label" for="informasi_dimohonkan">
                                        Informasi yang dimohonkan
                                        <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="input-wrapper">
                                    <textarea required autocomplete="off" class="textarea" name="tujuan_informasi" id="tujuan_informasi"
                                        placeholder="tujuan informasi"></textarea>
                                    <label class="label" for="tujuan_informasi">
                                        Tujuan Pengunaan Informasi
                                        <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <p class="fw-semibold fs-5 text-white mt-4">Identitas Pemohon</p>
                            <div class="col-12">
                                <div class="input-wrapper">
                                    <input autocomplete="off" class="input" type="text" id="nama_pemohon" required
                                        placeholder="nama pemohon" />
                                    <label class="label" for="nama_pemohon">
                                        Nama Pemohon <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-wrapper">
                                    <input autocomplete="off" class="input" type="text" id="alamat_pemohon" required
                                        placeholder="alamat pemohon" />
                                    <label class="label" for="alamat_pemohon">
                                        Alamat Pemohon <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-wrapper">
                                    <input autocomplete="off" class="input" type="text" id="pekerjaan" required
                                        placeholder="Pekerjaan" />
                                    <label class="label" for="pekerjaan">
                                        Pekerjaan <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="input-wrapper">
                                    <input autocomplete="off" class="input" type="tel" id="no_hp" required
                                        placeholder="No Telepon/HP" />
                                    <label class="label" for="no_hp">
                                        No Telepon/HP <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="input-wrapper">
                                    <input autocomplete="off" class="input" type="email" id="email" required
                                        placeholder="E-mail" />
                                    <label class="label" for="no_hp">
                                        E-mail <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="input-wrapper">
                                    <textarea required autocomplete="off" class="textarea" name="informasi_dibutuhkan" id="informasi_dibutuhkan"
                                        placeholder="Informasi Yang Dibutuhkan"></textarea>
                                    <label class="label" for="informasi_dibutuhkan">
                                        Informasi Yang Dibutuhkan
                                        <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="input-wrapper">
                                    <textarea required autocomplete="off" class="textarea" name="alasan_informasi" id="alasan_informasi"
                                        placeholder="Alasan Permintaan Informasi"></textarea>
                                    <label class="label" for="alasan_informasi">
                                        Alasan Permintaan Informasi
                                        <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 text-white my-3">
                                <p class="text-capitalize"> cara memperoleh informasi</p>
                                <div class="ps-4">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="cara_memperoleh"
                                            id="langsung_cara_memperoleh" value="langsung" required>
                                        <label class="form-check-label" for="langsung_cara_memperoleh">Langsung</label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="cara_memperoleh"
                                            id="email_cara_memperoleh" value="email">
                                        <label class="form-check-label" for="email_cara_memperoleh">Email</label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="cara_memperoleh"
                                            id="whatsapp_cara_memperoleh" value="whatsapp">
                                        <label class="form-check-label" for="whatsapp_cara_memperoleh">Whatsapp</label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 text-white ">
                                <p class="text-capitalize"> cara mengirimkan informasi</p>
                                <div class="ps-4">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="cara_mengirimkan"
                                            id="langsung_cara_mengirimkan" value="langsung" required>
                                        <label class="form-check-label" for="langsung_cara_mengirimkan">Langsung</label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="cara_mengirimkan"
                                            id="email_cara_mengirimkan" value="email">
                                        <label class="form-check-label" for="email_cara_mengirimkan">Email</label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="cara_mengirimkan"
                                            id="whatsapp_cara_mengirimkan" value="whatsapp">
                                        <label class="form-check-label" for="whatsapp_cara_mengirimkan">Whatsapp</label>
                                    </div>
                                </div>

                            </div>
                            {{-- Ganti Value jangan lupa --}}
                            <div class="col-12 text-white mt-3">
                                <label for="alasan" class="form-label text-white">Alasan Pengajuan Keberatan
                                    <span class="text-danger">*</span></label>
                                <select class="form-select" name="alasan" aria-label="Default select example"
                                    data-bs-theme="dark" required>
                                    <option selected hidden>Pilih Alasan Pengajuan Keberatan</option>
                                    <option value="1">Permohonan informasi ditolak</option>
                                    <option value="2">Informasi berkala tidak disediakan</option>
                                    <option value="3">Permintaan informasi tidak ditanggapi</option>
                                    <option value="3">Permintaan informasi ditanggapi tidak sebagaimana yang diminta
                                    </option>
                                    <option value="3">Permintaan informasi tidak terpenuhi</option>
                                    <option value="3">Biaya yang dikenakan tidak wajar</option>
                                    <option value="3">Informasi disampaikan melebihi jangka waktu yang ditentukan
                                    </option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="input-wrapper">
                                    <input autocomplete="off" class="input" type="text" id="kasus_posisi"
                                        name="kasus_posisi" required placeholder="Kasus Posisi" />
                                    <label class="label" for="kasus_posisi">
                                        Kasus Posisi <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12  my-3">
                                <label for="identitas" class="form-label text-white">Identitas(KTP/SIM) Ukuran maksimal
                                    300kb
                                    <span class="text-danger">*</span></label>
                                <input data-bs-theme="dark" class="form-control" type="file" id="identitas"
                                    accept=".jpg,.png,.pdf">
                            </div>
                        </div>
                    </div>
                    {{-- text --}}
                    <div class="col-12 col-lg-4">
                        <div class=" text-white p-3">
                            <p class="fw-semibold fs-5">Pemohon Informasi Publik berhak mengajukan keberatan dalam hal
                                ditemukannya alasan sebagai berikut:
                            </p>
                            <ol>
                                <li>
                                    Penolakan berdasarkan alasan Pengecualian Informasi Publik; </li>
                                <li>
                                    Tidak disediakannya Informasi berkala; </li>
                                <li>
                                    Tidak ditanggapinya Permintaan Informasi Publik; </li>
                                <li>
                                    Permintaan Informasi Publik ditanggapi tidak sebagaimana yang diminta; </li>
                                <li>
                                    Tidak dikabulkannya Permintaan Informasi Publik; </li>
                                <li>
                                    Pengenaan biaya yang tidak wajar; dan/atau </li>
                                <li>
                                    Penyampaian Informasi Publik yang melebihi waktu penyampaian informasi publik.
                                </li>

                            </ol>

                            <p class="fw-semibold fs-5">
                                Tata Cara Permohonan Keberatan :
                            </p>
                            <ol>
                                <li>
                                    Keberatan diajukan kepada atasan PPID (Pejabat Pengelola Informasi dan Dokuemntasi)
                                    dalam
                                    jangka waktu paling lambat 30 (tiga puluh) hari kerja setelah ditemukan alasan
                                    keberatan.
                                </li>
                                <li>
                                    Atasan PPID memberikan keputusan / tanggapan atas pengajuan keberatan paling lambat 30
                                    (tiga
                                    puluh) hari kerja setelah diterimanya keberatan secara tertulis, Apabila atasan PPID
                                    mengutkan putusan maka alasan tertulis disertakan.
                                </li>
                                <li>
                                    Jika pengajuan puas atas tanggapan atasan PPID, maka selesai proses keberatan informasi
                                </li>
                                <li>
                                    Jika pengajuan tidak puas atas tanggapan atasan PPID, maka dapat mengajukan sengketa
                                    informasi ke Komisi Informasi provinsi Jawa Barat.
                                </li>
                            </ol>

                            <p class="fw-semibold fs-5">
                                Biaya/Tarif :
                            </p>

                            <p>
                                Informasi yang disediakan adalah <span class="fw-semibold">gratis</span> (tidak dipungut
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
