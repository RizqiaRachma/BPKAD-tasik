@section('cari')
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
    </div>
@endsection
