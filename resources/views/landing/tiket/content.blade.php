@section('tiket')
    <div class="position-relative px-5 mt-5">
        <!-- Bagian form pencarian -->
        <div class="container">
            <form id="searchForm" action="{{ route('cek-tiket.cari') }}" method="post">
                @csrf 
                <div class="input-group mb-3" data-bs-theme="light">
                    <input type="text" class="form-control bg-white" id="ticketInput" placeholder="Masukan Tiket"
                           aria-label="Masukan Tiket" name="tiket" aria-describedby="button-addon2">
                    <button class="btn btn-outline-light" type="submit" id="button-addon2">Cek</button>
                </div>
            </form>            
        </div>

        <!-- Bagian tabel hasil pencarian -->
        <div class="container-fluid table-responsive">
            <table class="rounded-corners w-100" id="ticketTable">
                <thead>
                <tr>
                    <th scope="col" class="p-3 col">Tiket</th>
                    <th scope="col" class="p-3 col">Tanggal</th>
                    <th scope="col" class="p-3 col">Nama Pemohon</th>
                    <th scope="col" class="p-3 col">Pesan</th>
                    <th scope="col" class="p-3 col">Status</th>
                    <th scope="col" class="p-3 col">Jawaban</th>
                    <th scope="col" class="p-3 col">Alasan</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($pesan as $x)
                        <tr>
                            <td class="p-3">{{ $x->tiket}}</td>
                            <td class="p-3">{{ $x->created_at}}</td>
                            <td class="p-3">{{ $x->nama_pemohon}}</td>
                            <td class="p-3">{{ $x->pesan}}</td>
                            <td class="p-3">
                                @if($x->status == "Dijawab")
                                    <div class="btn btn-success">Dijawab</div>
                                @elseif($x->status == "Ditolak")
                                    <div class="btn btn-danger">Ditolak</div>
                                @else
                                    <div class="btn btn-secondary">Menunggu</div>
                                @endif
                            </td>
                            <td class="p-3">{{ $x->jawaban}}</td>
                            <td class="p-3">{{ $x->alasan}}</td>
                        </tr>
                    @empty
                        <!-- Tambahkan pesan jika tidak ada hasil pencarian -->
                        <tr>
                            <td colspan="6" class="text-center">Tiket tidak ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Bagian script JavaScript -->
        <script>
            $(document).ready(function () {
                // Sembunyikan tabel saat halaman dimuat
                $("#ticketTable").hide();

                $("#searchForm").submit(function (event) {
                    event.preventDefault();
                    // Lakukan pencarian di sini dan perbarui tabel
                    updateTable($("#ticketInput").val());
                });
            });

            function updateTable(searchTerm) {
                // Implementasi logika pencarian sesuai dengan kebutuhan Anda di sini
                // Misalnya, kita simulasikan hasil pencarian dengan memuat seluruh data
                var searchData = {!! json_encode($pesan) !!};

                var tableBody = $("#ticketTable tbody");
                tableBody.empty(); // Bersihkan isi tabel sebelum menambahkan hasil pencarian baru

                if (searchData.length > 0) {
                    // Tampilkan tabel dan tambahkan hasil pencarian ke dalam tabel
                    $("#ticketTable").show();

                    for (var i = 0; i < searchData.length; i++) {
                        var row = "<tr>" +
                            "<td class='p-3'>" + searchData[i].tiket + "</td>" +
                            "<td class='p-3'>" + searchData[i].created_at + "</td>" +
                            "<td class='p-3'>" + searchData[i].nama_pemohon + "</td>" +
                            "<td class='p-3'>" +
                                "<div class='btn " +
                                (searchData[i].status == 'Dijawab' ? 'btn-success' :
                                 (searchData[i].status == 'Ditolak' ? 'btn-danger' : 'btn-secondary')) +
                                "'>" + searchData[i].status + "</div>" +
                            "</td>" +
                            "<td class='p-3'>" + searchData[i].jawaban + "</td>" +
                            "<td class='p-3'>" + searchData[i].alasan + "</td>" +
                            "</tr>";
                        tableBody.append(row);
                    }
                } else {
                    // Tampilkan pesan jika tidak ada hasil pencarian
                    $("#ticketTable").hide();
                }
            }
        </script>
    </div>
@endsection
