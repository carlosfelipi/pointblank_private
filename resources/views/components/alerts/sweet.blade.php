@if (config('sweetalert.alwaysLoadJS') === true && config('sweetalert.neverLoadJS') === false)
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endif
@if (Session::has('alert.config'))
    @if (config('sweetalert.animation.enable'))
        <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
    @endif
    @if (config('sweetalert.alwaysLoadJS') === false && config('sweetalert.neverLoadJS') === false)
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @endif

    <script>
        Swal.fire({!! Session::pull('alert.config') !!});
    </script>
@endif


