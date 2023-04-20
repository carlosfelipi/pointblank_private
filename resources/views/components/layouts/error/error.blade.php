<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sub.css') }}" />
</head>

<body>
    <div class="error_wrap">
        {{ $slot }}
        <x-layouts.error.partials.footer />
    </div>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/global.js') }}"></script>
</body>

</html>
