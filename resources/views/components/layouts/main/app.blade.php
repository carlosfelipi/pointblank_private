<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="canonical" href="{{ Request::url() }}" />
    <meta name="title" content="{{ env('APP_NAME') }} - Jogo de tiro" />
    <meta name="description" content="Experimente a rica jogabilidade de tiro" />
    <meta name="keywords"
        content="Grátis, Free, Realista, Realistic, Zumbi, Zombie, FPS, Tiro, Atirador, Armas de Fogo, Shooting, Shooter, Firearms, " />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="{{ asset('assets/images/og.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <title>{{ env('APP_NAME') }} {{ $title ?? '' }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    @livewireStyles
    {{ $css ?? '' }}
</head>

<body>
    <x-layouts.main.partials.preloader />
    <a href="#" class="scrollToTop">
        <i class="icofont-rounded-up"></i>
    </a>
    <div class="body-shape">
        <img src="{{ asset('assets/images/shape/body-shape.png') }}" alt="shape">
    </div>
    <x-layouts.main.partials.header />
    {{ $slot }}
    <x-layouts.main.partials.footer />
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/circularProgressBar.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/lightcase.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <x-alerts.toast />
    @livewireScripts
    {{ $js ?? '' }}
</body>

</html>
