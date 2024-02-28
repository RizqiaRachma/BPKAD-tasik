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
    <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

</head>

<body class="sidebar-light">
    @include('dashboard.carousel.content')
    @include('components.header.dashboard')
    @include('components.footer.dashboard')
    @include('components.sidebar.dashboard')

    <div class="cointainer-scroller">
        @yield('header')
        <div class="container-fluid page-body-wrapper">
            @yield('sidebar')
            <div class="main-panel">
                @yield('carousel')

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
    <script src="{{ asset('template/js/file-upload.js') }}"></script>
    <script src="{{ asset('template/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('template/js/template.js') }}"></script>
    <script src="{{ asset('template/js/settings.js') }}"></script>
    <script src="{{ asset('template/js/todolist.js') }}"></script>
    <script src="{{ asset('template/js/dashboard.js') }}"></script>
    <script src="{{ asset('template/js/Chart.roundedBarCharts.js') }}"></script>

    @vite(['resources/js/app.js'])

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var imageLinks = document.querySelectorAll('.image-spotlight');

            imageLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    var imageId = this.getAttribute('href');

                    // Create the iframe element
                    const iframe = document.createElement("iframe");
                    iframe.src = imageId;
                    iframe.style.width = '100vw';
                    iframe.style.height = '100vh';
                    iframe.style.display = 'block';
                    iframe.style.margin = 'auto';
                    iframe.onload = function() {
                        var iframeContent = this.contentDocument;
                        var img = iframeContent.querySelector('img');
                        if (img) {
                            img.style.display = 'block';
                            img.style.margin = 'auto';
                        }
                    };
                    Spotlight.show([{
                        media: "node",
                        autohide: "false",
                        controls: "true",
                        src: iframe
                    }]);
                });
            });
        });
    </script>
    <script>
        tinymce.init({
            selector: 'textarea', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar:  'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>

</body>

</html>
