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
    @include('dashboard.main.content')
    @include('components.header.dashboard')
    @include('components.footer.dashboard')
    @include('components.sidebar.dashboard')

    <div class="cointainer-scroller">
        @yield('header')
        <div class="container-fluid page-body-wrapper">

            @yield('sidebar')

            <div class="main-panel">
                @yield('main')

                @yield('footer')
            </div>
        </div>

    </div>
    <script src="{{ asset('template/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('template/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('template/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('template/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('template/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('template/js/off-canvas.js') }}"></script>
    <script src="{{ asset('template/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('template/js/template.js') }}"></script>
    <script src="{{ asset('template/js/settings.js') }}"></script>
    <script src="{{ asset('template/js/todolist.js') }}"></script>
    <script src="{{ asset('template/js/dashboard.js') }}"></script>
    <script src="{{ asset('template/js/Chart.roundedBarCharts.js') }}"></script>




</body>

</html>
