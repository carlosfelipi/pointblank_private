<script src="{{ asset('admin/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('admin/js/icons/feather-icon/feather-icon.js') }}"></script>
<script src="{{ asset('admin/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('admin/js/scrollbar/custom.js') }}"></script>
<script src="{{ asset('admin/js/config.js') }}"></script>
<script id="menu" src="{{ asset('admin/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('admin/js/script.js') }}"></script>
{{-- <script src="{{asset('admin/js/theme-customizer/customizer.js')}}"></script> --}}
<script type="text/javascript">
    if ($(".page-wrapper").hasClass("horizontal-wrapper")) {
        $(".according-menu.other").css("display", "none");
        $(".sidebar-submenu").css("display", "block");
    }
</script>
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
