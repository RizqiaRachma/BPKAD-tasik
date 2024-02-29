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
    @include('landing.beranda.content')
    @include('components.header.header')
    @include('components.footer.footer')

    @yield('header')
    <main class="z-n1" style="min-height:80vh">
        @yield('beranda')
    </main>
    @yield('footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script>
        $(document).ready(function() {
            $('#pengumuman').modal('show');
        });
        $('#pengumuman').carousel({
            interval: 2500,
            cycle: true
        });
    </script>

</body>

</html>
