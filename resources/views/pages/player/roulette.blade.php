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
                                <img class="marker" src="{{ asset('assets/images/roulette/topz.png') }}" />
                                <img class="wheel" src="{{ asset('assets/images/roulette/roletapbtopz.png') }}" />
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
                const wheel = document.querySelector('.wheel');
                const startButton = document.querySelector('.button');
                let deg = 0;

                startButton.addEventListener('click', () => {
                    $.ajax({
                        url: "{{ route('spinRoulette') }}",
                        type: 'GET',
                        dataType: 'json', // added data type
                        success: function(res) {
                            console.log(res);
                            if (res != 10) {
                                startButton.style.pointerEvents = 'none';
                                deg = Math.floor(5000 + res * 5000);
                                wheel.style.transition = 'all 10s ease-out';
                                wheel.style.transform = `rotate(${deg}deg)`;
                                wheel.classList.add('blur');
                            } else {
                                alert('Você já girou hojé, Volte amanhá !');
                            }

                        }
                    });

                });

                wheel.addEventListener('transitionend', () => {
                    wheel.classList.remove('blur');
                    startButton.style.pointerEvents = 'auto';
                    wheel.style.transition = 'none';
                    const actualDeg = deg % 360;
                    wheel.style.transform = `rotate(${actualDeg}deg)`;
                    $.ajax({
                        url: "{{ route('receiveRoulette') }}",
                        type: 'GET',
                        success: function(res) {
                            alert(res);
                        }
                    });
                });
            })();
        </script>
    </x-slot:js>
</x-layouts.main.app>
