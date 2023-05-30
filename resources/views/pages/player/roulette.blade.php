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
        
        </script>
    </x-slot:js>
</x-layouts.main.app>
