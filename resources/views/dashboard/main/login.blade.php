<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BPKAD Kota Tasikmalaya</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo_tasik.svg') }}">

    <link href="{{ asset('template/css/vertical-layout-light/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/vendors/feather/feather.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/vendors/ti-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/vendors/ti-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('template/js/select.dataTables.min.css') }}" rel="stylesheet" />

</head>

<body class="sidebar-light">
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="img/logo_tasik.svg" alt="logo">
              </div>
              <h4 class="text-center">BPKAD Kota Tasikmalaya</h4>
              <h6 class="font-weight-light text-center">Silahkan masukan email dan password untuk login.</h6>
              <form method="POST" action="{{ route('proses-login') }}" class="pt-3">
                @csrf <!-- Add this CSRF token for security -->
                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                </div>
            </form>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="{{ asset('template/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('template/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('template/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('template/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('template/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('template/js/off-canvas.js') }}"></script>
    <script src="{{ asset('template/js/file-upload.js') }}"></script>
    <script src="{{ asset('template/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('template/js/template.js') }}"></script>
    <script src="{{ asset('template/js/settings.js') }}"></script>
    <script src="{{ asset('template/js/todolist.js') }}"></script>
    <script src="{{ asset('template/js/dashboard.js') }}"></script>
    <script src="{{ asset('template/js/Chart.roundedBarCharts.js') }}"></script>

    @vite(['resources/js/app.js'])



</body>

</html>