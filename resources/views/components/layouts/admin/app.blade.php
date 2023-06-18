<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('admin/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" type="image/x-icon">
    <title>Painel {{ env('APP_NAME') }} {{ $title ?? '' }}</title>
    <x-layouts.admin.partials.css />
    {{ $css ?? '' }}
</head>

<body class="dark-only">
    <x-layouts.admin.partials.preloader />
    <div class="tap-top">
        <i data-feather="chevrons-up"></i>
    </div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <x-layouts.admin.partials.header />
        <div class="page-body-wrapper">
            <x-layouts.admin.partials.sidebar />
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>{{ $title ?? '' }}</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('indexAdminPage') }}">
                                            Início
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        {{ $title ?? '' }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $slot }}
            </div>
            <x-layouts.admin.partials.footer />
        </div>
    </div>
    <x-layouts.admin.partials.script />
 
    {{ $js ?? '' }}
</body>

</html>
