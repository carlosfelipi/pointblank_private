<script type="text/javascript" src="{{ asset('assets/js/alert.js') }}"></script>
<audio id="errorSound">
    <source src="/admin/sound/error.mp3" type="audio/mp3">
</audio>

<audio id="successSound">
    <source src="/admin/sound/success.mp3" type="audio/mp3">
</audio>

<audio id="infoSound">
    <source src="/admin/sound/info.mp3" type="audio/mp3">
</audio>

@if (session()->has('message'))
{!! session('message') !!}
@endif

<script>
    //Livewire
    window.addEventListener("newMessage", (e) => {
        const icon = e.detail.icon;
        const soundsMap = {
            success: () => document.getElementById("successSound").play(),
            error: () => document.getElementById("errorSound").play(),
            info: () => document.getElementById("infoSound").play(),
        };
        const playSoundByIcon = (icon) => {
            const playSound = soundsMap[icon];
            if (playSound) {
                playSound();
            }
        };
        playSoundByIcon(icon);
        $.toast({
            icon: icon,
            loaderBg: "#d9edf7",
            text: e.detail.msg,
            hideAfter: "10000",
            showHideTransition: "plain",
            position: "bottom-right",
        });
    });
</script>
