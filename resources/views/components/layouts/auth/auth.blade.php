<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $config->name }} {{ $title }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sub.css') }}" />
    {{ $css ?? '' }}
</head>

<body>
    <x-layouts.main.partials.preloader />
    <div class="account_wrap">
        <div class="account_wrap">
            <article class="account signup register new_join new_join_v2">
                {{ $slot }}
                <article class="new_join_v2_bg">
                    <!-- login(bg) -->
                    <div class="new_login_bg">

                        <a href="https://www.pointblank.id/login/form" target="_SELF" class="ad_link"></a>





                        <div class="ad_img ad_img_m">
                            <div class="pc"><img
                                    src="https://cdn2.pointblank.id/Web/upload/image/20230324/131636842.png"
                                    alt="pc ad"></div>
                            <div class="mobile"><img
                                    src="https://cdn2.pointblank.id/Web/upload/image/20230324/131636885.jpg"
                                    alt="mobile ad"></div>
                        </div>


                    </div>
                    <!-- //login(bg) -->
                </article>
            </article>
        </div>
        
        <x-layouts.auth.partials.footer />
        <script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/global.js') }}"></script>
        <x-alerts.toast />
        {{ $js ?? '' }}
    </div>
</body>

</html>
