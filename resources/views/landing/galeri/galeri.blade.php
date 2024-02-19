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
    @include('landing.galeri.content')
    @include('components.header.header')
    @include('components.footer.footer')

    @yield('header')
    <main class="position-relative" style="min-height:100vh;">
        @yield('galeri')

    </main>
    @yield('footer')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var videoLinks = document.querySelectorAll('.video-spotlight');

            videoLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    var videoId = this.getAttribute('data-video-id');
                    Spotlight.show([{
                        media: "node",
                        autohide: "false",
                        controls: "true",
                        src: (function() {
                            const iframe = document.createElement("iframe");
                            iframe.src = "https://www.youtube.com/embed/" +
                                videoId;

                            iframe.style.width = '80%';
                            iframe.style.height = '75%';
                            return iframe;
                        }())
                    }]);
                });
            });
        });
    </script>


</body>

</html>
