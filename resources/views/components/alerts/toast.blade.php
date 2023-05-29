<script type="text/javascript" src="{{ asset('assets/js/alert.js') }}"></script>
@if (session()->has('message'))
    {!! session('message') !!}
@endif

@if ($errors->any())
    @php
        $numError = 1;
    @endphp
    @foreach ($errors->all() as $error)
        <div class="toastDel_{{ $numError }}">
            <script>
                $.toast({
                    text: "{{ $error }}",
                    icon: "error",
                    hideAfter: "5000",
                    loaderBg: "#d9edf7",
                    showHideTransition: "plain",
                    position: "bottom-right",
                    afterShown: function() {
                        $(".toastDel").remove()
                    }
                });
            </script>
        </div>
        @php
            $numError++;
        @endphp
    @endforeach
@endif

<script>
    window.addEventListener('newMessage', (e) => {
        $.toast({
            icon: e.detail.icon,
            loaderBg: "#d9edf7",
            text: e.detail.msg,
            hideAfter: "10000",
            showHideTransition: "plain",
            position: "bottom-right",
        });
    });
</script>
