<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BPKAD Kota Tasikmalaya</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo_tasik.svg') }}">

</head>

<body>
    @include('landing.ppid.permohonan_informasi.content')
    @include('components.header.header')
    @include('components.footer.footer')

    @yield('header')
    <main class="position-relative" style="min-height:70vh;">
        @yield('permohonan_informasi')
    </main>
    @yield('footer')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const perorangan = document.getElementById("perorangan");
            const masyarakat = document.getElementById("kelompok_masyarakat");
            const hukum = document.getElementById("pemohon_berbadan_hukum");
            const formInputs = document.getElementById("form-inputs");
            const formPerorangan = `
    <div class="col-12">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="nama_pemohon" required
                placeholder="nama pemohon" />
            <label class="label" for="nama_pemohon">
                Nama Pemohon <span class="text-danger">*</span>
            </label>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="ktp_sim" required placeholder="No KTP/SIM" />
            <label class="label" for="ktp_sim">
                No KTP/SIM <span class="text-danger">*</span>
            </label>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="nim"
                placeholder="NIM (Jika Pemohon adalah Mahasiswa)" />
            <label class="label" for="nim">
                NIM (Jika Pemohon adalah Mahasiswa)
            </label>
        </div>
    </div>
    <div class="col-12">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="univ"
                placeholder="Perguruan Tinggi (Jika Pemohon adalah Mahasiswa)" />
            <label class="label" for="univ">
                Perguruan Tinggi (Jika Pemohon adalah Mahasiswa)
            </label>
        </div>
    </div>
    <div class="col-12">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="alamat" placeholder="Alamat Pemohon" />
            <label class="label" for="alamat">
                Alamat Pemohon <span class="text-danger">*</span>
            </label>
        </div>
    </div>
    <div class="col-12">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="pekerjaan" required placeholder="Pekerjaan" />
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
            <input autocomplete="off" class="input" type="email" id="email" required placeholder="E-mail" />
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
    <div class="col-12 text-white">
        <p class="text-capitalize"> cara memperoleh informasi</p>
        <div class="ps-4">
            <div class="form-check  ">
                <input class="form-check-input" type="radio" name="cara_memperoleh" id="langsung_cara_memperoleh"
                    value="langsung" required>
                <label class="form-check-label" for="langsung_cara_memperoleh">Langsung</label>
            </div>
            <div class="form-check ">
                <input class="form-check-input" type="radio" name="cara_memperoleh" id="email_cara_memperoleh"
                    value="email">
                <label class="form-check-label" for="email_cara_memperoleh">Email</label>
            </div>
            <div class="form-check  ">
                <input class="form-check-input" type="radio" name="cara_memperoleh" id="whatsapp_cara_memperoleh"
                    value="whatsapp">
                <label class="form-check-label" for="whatsapp_cara_memperoleh">Whatsapp</label>
            </div>
        </div>

    </div>
    <div class="col-12 text-white">
        <p class="text-capitalize"> cara mengirimkan informasi</p>
        <div class="ps-4">
            <div class="form-check  ">
                <input class="form-check-input" type="radio" name="cara_mengirimkan"
                    id="langsung_cara_mengirimkan" value="langsung" required>
                <label class="form-check-label" for="langsung_cara_mengirimkan">Langsung</label>
            </div>
            <div class="form-check  ">
                <input class="form-check-input" type="radio" name="cara_mengirimkan" id="email_cara_mengirimkan"
                    value="email">
                <label class="form-check-label" for="email_cara_mengirimkan">Email</label>
            </div>
            <div class="form-check  ">
                <input class="form-check-input" type="radio" name="cara_mengirimkan"
                    id="whatsapp_cara_mengirimkan" value="whatsapp">
                <label class="form-check-label" for="whatsapp_cara_mengirimkan">Whatsapp</label>
            </div>
        </div>

    </div>
    <div class="col-12  my-3">
        <label for="identitas" class="form-label text-white">Identitas(KTP/SIM) Ukuran maksimal 300kb
            <span class="text-danger">*</span></label>
        <input data-bs-theme="dark" class="form-control" type="file" id="identitas" accept=".jpg,.png,.pdf">
    </div>
    `;
            const formMasyarakat = `
    <div class="col-12">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="nama_pemohon" required
                placeholder="nama pemohon" />
            <label class="label" for="nama_pemohon">
                Nama Badan Hukum <span class="text-danger">*</span>
            </label>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="ktp_sim" required
                placeholder="No KTP/SIM" />
            <label class="label" for="ktp_sim">
                No KTP/SIM <span class="text-danger">*</span>
            </label>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="nim"
                placeholder="NIM (Jika Pemohon adalah Mahasiswa)" />
            <label class="label" for="nim">
                NIM (Jika Pemohon adalah Mahasiswa)
            </label>
        </div>
    </div>
    <div class="col-12">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="univ"
                placeholder="Perguruan Tinggi (Jika Pemohon adalah Mahasiswa)" />
            <label class="label" for="univ">
                Perguruan Tinggi (Jika Pemohon adalah Mahasiswa)
            </label>
        </div>
    </div>
    <div class="col-12">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="alamat" placeholder="Alamat Pemohon" />
            <label class="label" for="alamat">
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
            <input autocomplete="off" class="input" type="email" id="email" required placeholder="E-mail" />
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
    <div class="col-12 text-white">
        <p class="text-capitalize"> cara memperoleh informasi</p>
        <div class="ps-4">
            <div class="form-check  ">
                <input class="form-check-input" type="radio" name="cara_memperoleh" id="langsung_cara_memperoleh"
                    value="langsung" required>
                <label class="form-check-label" for="langsung_cara_memperoleh">Langsung</label>
            </div>
            <div class="form-check ">
                <input class="form-check-input" type="radio" name="cara_memperoleh" id="email_cara_memperoleh"
                    value="email">
                <label class="form-check-label" for="email_cara_memperoleh">Email</label>
            </div>
            <div class="form-check  ">
                <input class="form-check-input" type="radio" name="cara_memperoleh" id="whatsapp_cara_memperoleh"
                    value="whatsapp">
                <label class="form-check-label" for="whatsapp_cara_memperoleh">Whatsapp</label>
            </div>
        </div>

    </div>
    <div class="col-12 text-white">
        <p class="text-capitalize"> cara mengirimkan informasi</p>
        <div class="ps-4">
            <div class="form-check  ">
                <input class="form-check-input" type="radio" name="cara_mengirimkan"
                    id="langsung_cara_mengirimkan" value="langsung" required>
                <label class="form-check-label" for="langsung_cara_mengirimkan">Langsung</label>
            </div>
            <div class="form-check  ">
                <input class="form-check-input" type="radio" name="cara_mengirimkan" id="email_cara_mengirimkan"
                    value="email">
                <label class="form-check-label" for="email_cara_mengirimkan">Email</label>
            </div>
            <div class="form-check  ">
                <input class="form-check-input" type="radio" name="cara_mengirimkan"
                    id="whatsapp_cara_mengirimkan" value="whatsapp">
                <label class="form-check-label" for="whatsapp_cara_mengirimkan">Whatsapp</label>
            </div>
        </div>

    </div>
    <div class="col-12  my-3">
        <label for="identitas" class="form-label text-white">Identitas(KTP/SIM) ukuran maksimal 300kb
            <span class="text-danger">*</span></label>
        <input data-bs-theme="dark" class="form-control" type="file" id="identitas" accept=".jpg,.png,.pdf">
    </div>
    <div class="col-12  my-3">
        <label for="surat_kuasa" class="form-label text-white">Surat kuasa ukuran maksimal 300kb
            <span class="text-danger">*</span></label>
        <input data-bs-theme="dark" class="form-control" type="file" id="identitas_2" accept=".jpg,.png,.pdf">
    </div>
    `;
            const formHukum = `
    <div class="col-12">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="nama_pemohon" required
                placeholder="nama pemohon" />
            <label class="label" for="nama_pemohon">
                Nama Kelompok Orang <span class="text-danger">*</span>
            </label>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="ktp_sim" required
                placeholder="No KTP/SIM" />
            <label class="label" for="ktp_sim">
                No KTP/SIM <span class="text-danger">*</span>
            </label>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="nim"
                placeholder="NIM (Jika Pemohon adalah Mahasiswa)" />
            <label class="label" for="nim">
                NIM (Jika Pemohon adalah Mahasiswa)
            </label>
        </div>
    </div>
    <div class="col-12">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="univ"
                placeholder="Perguruan Tinggi (Jika Pemohon adalah Mahasiswa)" />
            <label class="label" for="univ">
                Perguruan Tinggi (Jika Pemohon adalah Mahasiswa)
            </label>
        </div>
    </div>
    <div class="col-12">
        <div class="input-wrapper">
            <input autocomplete="off" class="input" type="text" id="alamat" placeholder="Alamat Pemohon" />
            <label class="label" for="alamat">
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
            <input autocomplete="off" class="input" type="email" id="email" required placeholder="E-mail" />
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
    <div class="col-12 text-white">
        <p class="text-capitalize"> cara memperoleh informasi</p>
        <div class="ps-4">
            <div class="form-check  ">
                <input class="form-check-input" type="radio" name="cara_memperoleh" id="langsung_cara_memperoleh"
                    value="langsung" required>
                <label class="form-check-label" for="langsung_cara_memperoleh">Langsung</label>
            </div>
            <div class="form-check ">
                <input class="form-check-input" type="radio" name="cara_memperoleh" id="email_cara_memperoleh"
                    value="email">
                <label class="form-check-label" for="email_cara_memperoleh">Email</label>
            </div>
            <div class="form-check  ">
                <input class="form-check-input" type="radio" name="cara_memperoleh" id="whatsapp_cara_memperoleh"
                    value="whatsapp">
                <label class="form-check-label" for="whatsapp_cara_memperoleh">Whatsapp</label>
            </div>
        </div>

    </div>
    <div class="col-12 text-white">
        <p class="text-capitalize"> cara mengirimkan informasi</p>
        <div class="ps-4">
            <div class="form-check  ">
                <input class="form-check-input" type="radio" name="cara_mengirimkan"
                    id="langsung_cara_mengirimkan" value="langsung" required>
                <label class="form-check-label" for="langsung_cara_mengirimkan">Langsung</label>
            </div>
            <div class="form-check  ">
                <input class="form-check-input" type="radio" name="cara_mengirimkan" id="email_cara_mengirimkan"
                    value="email">
                <label class="form-check-label" for="email_cara_mengirimkan">Email</label>
            </div>
            <div class="form-check  ">
                <input class="form-check-input" type="radio" name="cara_mengirimkan"
                    id="whatsapp_cara_mengirimkan" value="whatsapp">
                <label class="form-check-label" for="whatsapp_cara_mengirimkan">Whatsapp</label>
            </div>
        </div>

    </div>
    <div class="col-12  my-3">
        <label for="identitas" class="form-label text-white">Identitas(KTP/SIM) ukuran maksimal 300kb
            <span class="text-danger">*</span></label>
        <input data-bs-theme="dark" class="form-control" type="file" id="identitas" accept=".jpg,.png,.pdf">
    </div>
    <div class="col-12  my-3">
        <label for="akta_pendirian" class="form-label text-white">Akta pendirian ukuran maksimal 300kb
            <span class="text-danger">*</span></label>
        <input data-bs-theme="dark" class="form-control" type="file" id="identitas_2" accept=".jpg,.png,.pdf">
    </div>
    `;

            function updateForm() {
                formInputs.innerHTML = "";

                if (perorangan.checked) {
                    formInputs.innerHTML = formPerorangan;
                } else if (masyarakat.checked) {
                    formInputs.innerHTML = formMasyarakat;
                } else if (hukum.checked) {
                    formInputs.innerHTML = formHukum;
                }
            }

            perorangan.addEventListener("change", updateForm);
            hukum.addEventListener("change", updateForm);
            masyarakat.addEventListener("change", updateForm);

            updateForm();
        });
    </script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</body>

</html>
