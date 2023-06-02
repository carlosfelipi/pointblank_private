<x-layouts.main.app title="Roleta ">
    <section class="pageheader-section">
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">Roleta</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Roleta</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="fore-zero padding-top padding-bottom">
        <div class="container">
            <div class="section-wrapper">
                <div class="zero-item">

                    <div class="zero-content">
                        <div id="app">
                            <img class="marker" src="{{ asset('assets/images/roulette/marker.png') }}" />
                            <img class="wheel" src="{{ asset('assets/images/roulette/wheel.png') }}" />
                        </div>
                        <button type="button" class="default-button reverse-effect button">
                            <span>
                                Girar Roleta
                            </span>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-slot:js>
        <script>
            (function() {
                const wheel = document.querySelector(".wheel");
                const startButton = document.querySelector(".button");
                const submit = "/player/roulette/proccess/spin";
                const debug = true;
                let deg = 0;
                startButton.addEventListener("click", () => {
                    $.ajax({
                        url: submit,
                        type: "GET",
                        dataType: "json",
                        success: function(res) {
                            if (debug == true) {
                                console.log(res);
                            }
                            if (res != 10) {
                                startButton.style.pointerEvents = "none";
                                deg = Math.floor(5000 + res * 5000);
                                wheel.style.transition = "all 10s ease-out";
                                wheel.style.transform = `rotate(${deg}deg)`;
                                wheel.classList.add("blur");
                            } else {
                                $.toast({
                                    icon: "info",
                                    loaderBg: "#d9edf7",
                                    text: "Você já girou hoje, Volte amanhá !",
                                    hideAfter: "5000",
                                    showHideTransition: "plain",
                                    position: "bottom-right",
                                });
                            }
                        },
                    });
                });

                wheel.addEventListener("transitionend", () => {
                    wheel.classList.remove("blur");
                    startButton.style.pointerEvents = "auto";
                    wheel.style.transition = "none";
                    const actualDeg = deg % 360;
                    const submit = "/player/roulette/proccess/roulette";
                    wheel.style.transform = `rotate(${actualDeg}deg)`;
                    $.ajax({
                        url: submit,
                        type: "GET",
                        success: function(res) {
                            $.toast({
                                icon: "success",
                                loaderBg: "#d9edf7",
                                text: res,
                                hideAfter: "5000",
                                showHideTransition: "plain",
                                position: "bottom-right",
                            });
                        },
                    });
                });
            })();
        </script>
    </x-slot:js>
</x-layouts.main.app>
