<script type="text/javascript" src="{{ asset('assets/js/alert.js') }}"></script>
@if (session()->has('message'))
    {!! session('message') !!}
@endif

