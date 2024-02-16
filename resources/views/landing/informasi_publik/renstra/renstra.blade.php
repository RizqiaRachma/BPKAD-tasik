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
    @include('landing.informasi_publik.renstra.content')
    @include('components.header.header')
    @include('components.footer.footer')

    @yield('header')
    <main class="position-relative" style="min-height:70vh;">
        @yield('renstra')
    </main>
    @yield('footer')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</body>

</html>
