@section('footer')
    <footer class="row  pt-5 mt-5 text-white d-flex justify-content-center special-footer" id="footer">
        <div class="col-12 row w-75">
            <div class="col-12 border-white border-bottom mb-3">
                <div class="row mb-5 d-flex justify-content-center">
                    <div class="d-none col-xxl-1 d-flex align-items-center justify-content-center d-xxl-block">
                        <img src="{{ asset('img/logo_tasik.svg') }}" alt="" style="width:5vw">
                    </div>
                    <div class="col p-0 d-flex align-items-center justify-content-center">
                        <p class="d-none d-xxl-block h2 text-white ">
                            BADAN PENGELOLA KEUANGAN DAN ASET DAERAH KOTA TASIKMALAYA
                        </p>
                        <p class="d-block d-xxl-none h2 text-white ">
                            BADAN PENGELOLA KEUANGAN DAN ASET DAERAH KOTA TASIKMALAYA
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 row gx-0">
                <div class="col-12 col-xxl-5 ">
                    <p class="h4 text-white">ALAMAT</p>
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3291234262592!2d108.19378581122629!3d-7.31687617191761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f50d35827a361%3A0x400af883572bf4f9!2sBPKAD%20Kota%20Tasikmalaya!5e0!3m2!1sen!2sid!4v1703209697037!5m2!1sen!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <p class="text-white mt-2">
                        Badan Pengelola Keuangan dan Aset Daerah Kota Tasikmalaya
                        <br>
                        Jl. Letnan Harun No.1 Tasikmalaya 46134
                    </p>
                    <p class="text-white mt-2">
                        Tel: (0265) 316.8828
                    </p>
                    <p class="text-white mt-2">
                        Fax: (0265) 316.7110
                    </p>
                    <p class="text-white mt-2">
                        Email: bpkad@tasikmalayakota.go.id
                    </p>

                </div>
                <div class="col-12 col-xxl-5 px-0  mt-3 mt-lg-0">
                    <p class="h4 text-white">TINGGALKAN PESAN</p>
                    @if (session('success'))
                        <div class="alert alert-danger">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="row w-100" id="footer-form" action="{{ route('pesan.simpan') }}" method="post">
                        @csrf
                        <div class="col-12 col-lg-6">
                            <div class="input-wrapper-pesan">
                                <input autocomplete="off" class="input-pesan" name="nama_pemohon" type="text"
                                    id="nama" required placeholder="Nama" />
                                <label class="label-pesan" for="nama">
                                    Nama
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="input-wrapper-pesan">
                                <input autocomplete="off" class="input-pesan" name="email" type="email" id="email"
                                    required placeholder="E-mail" />
                                <label class="label-pesan" for="email">
                                    Alamat Email
                                </label>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="input-wrapper-pesan">
                                <textarea required autocomplete="off" name="pesan" class="textarea-pesan" name="pesan" id="pesan"
                                    placeholder="Masukan Pesan"></textarea>
                                <label class="label-pesan" for="pesan">
                                    Masukan Pesan </label>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn btn-primary w-100" type="submit" id="submit-button">Kirim Pesan</button>

                        </div>
                    </form>
                </div>
                <div class="col-12 col-xxl-2 my-5 my-xxl-0 text-xxl-center p-0">
                    <p class="h4 text-white col-12">LINK TAUTAN</p>
                    <div class="row gy-3 mt-3 text-xxl-center ">
                        <a href="https://ppid.tasikmalayakota.go.id/"
                            class="col-6 col-xxl-12 h5 text-white fw-lighter text-decoration-none link-tautan">PPID</a>
                        <a href="https://esakip.tasikmalayakota.go.id/"
                            class="col-6 col-xxl-12 h5 text-white fw-lighter text-decoration-none link-tautan">E-SAKIP</a>
                        <a href="https://sispek.tasikmalayakota.go.id/"
                            class="col-6 col-xxl-12 h5 text-white fw-lighter text-decoration-none link-tautan">SISPEK</a>
                        <a href="https://lpse.tasikmalayakota.go.id/"
                            class="col-6 col-xxl-12 h5 text-white fw-lighter text-decoration-none link-tautan">LPSE</a>
                        <a href="https://www.lapor.go.id/"
                            class="col-6 col-xxl-12 h5 text-white fw-lighter text-decoration-none link-tautan">SP4N
                            LAPOR</a>
                        <a href="https://portal.tasikmalayakota.go.id/"

                            class="col-6 col-xl-12 h5 text-white fw-lighter text-decoration-none link-tautan">PORTAL TASIKMALAYA</a>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 overflow-hidden">


            <p id="copyright" class="bottom-0 text-center">©
                <script>
                    document.write(new Date().getFullYear())
                </script> DISKOMINFO Kota Tasikmalaya. All Right Reserved
            </p>
        </div>

    </footer>
@endsection
