<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/shop.css') }}" />
</head>

<body>

    <div id="container">
        <x-layouts.main.partials.header />
        {{ $slot }}
        <x-layouts.main.partials.footer />
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bxslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/slick.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/global.js') }}"></script>
</body>

</html>
