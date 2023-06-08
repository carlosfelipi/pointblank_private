<x-layouts.main.app title="Status Do Servidor">
    <section class="pageheader-section">
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">Status Do Servidor</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Status Do Servidor</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="fore-zero padding-top padding-bottom">
        <div class="container">
            <div class="section-wrapper">
                <div class="zero-item">
                    <div class="alert alert-Secondary">
                        <div class="zero-content">
                            <h2>STATUS DOS SERVIÇOS</h2>
                            <p>
                            <h4><strong> Informações do servidor</strong> <i class="fa-solid fa-circle-info"
                                    title="Atualização em tempo real"></i></h4>
                            </p>
                            <p>
                            <h4><strong>
                                    Servidor : <span style="color:lime;">ONLINE</span></strong></h4>
                            </p>
                            <p>
                            <h4>Localização : <i class="flag-icon flag-icon-br" title="br" id="br"></i></h4>
                            </p>
                            <p>
                            <h4>Jogadores Online :
                                <span class="@if ($onlines === 0) text-danger @else text-success @endif">
                                    <strong>{{ number_format($onlines) }}</strong>
                                </span>/
                                <strong>{{ number_format($all) }}</strong>
                            </h4>
                            </p>
                        </div>
                        <p class="text-success"> <small>Atualização em tempo real!</small></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
</x-layouts.main.app>
