<x-layouts.main.app title="Downloads">
    <section class="pageheader-section">
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">Downloads</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Downloads</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="about-section">
        <div class="container">
            <div class="section-wrapper padding-top">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-image">
                            <img class="logo" src="/assets/images/download/03.png" alt="about-image">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-10">
                        <div class="about-wrapper">
                            <div class="section-header">
                                <h2>Download do Cliente</h2>
                                <p>Jogue gratis</p>
                            </div>
                            <div class="about-content">
                                <p>Clique no botão abaixo para fazer download da versão mais recente do jogo!</p>
                                <ul class="about-list">
                                    @if (env('DOWNLOAD_LAUNCHER') != null)
                                        <li class="about-item d-flex flex-wrap">
                                            <div class="about-item-thumb">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                            </div>
                                            <div class="about-item-content">
                                                <h5>
                                                    <a href="{{ env('DOWNLOAD_LAUNCHER') }}" target="_blank">
                                                        PFLauncher
                                                    </a>
                                                </h5>
                                                <p>Baixe o arquivo, extraia e coloque na pasta do jogo!</p>
                                            </div>
                                        </li>
                                    @endif
                                    @if (env('DOWNLOAD_MEDIAFIRE') != null)
                                        <li class="about-item d-flex flex-wrap">
                                            <div class="about-item-thumb">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                            </div>
                                            <div class="about-item-content">
                                                <h5>
                                                    <a href="{{ env('DOWNLOAD_MEDIAFIRE') }}" target="_blank">
                                                        Client - MEDIA FIRE
                                                    </a>
                                                </h5>
                                                <p>Você também pode fazer o download do Client pelo MEDIA FIRE.</p>
                                            </div>
                                        </li>
                                    @endif

                                    @if (env('DOWNLOAD_MEGA') != null)
                                        <li class="about-item d-flex flex-wrap">
                                            <div class="about-item-thumb">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                            </div>
                                            <div class="about-item-content">
                                                <h5>
                                                    <a href="{{ env('DOWNLOAD_MEGA') }}" target="_blank">
                                                        Client - MEGA
                                                    </a>
                                                </h5>
                                                <p>Você também pode fazer o download do Client pelo MEGA.</p>
                                            </div>
                                        </li>
                                    @endif

                                    @if (env('DOWNLOAD_DRIVE') != null)
                                        <li class="about-item d-flex flex-wrap">
                                            <div class="about-item-thumb">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                            </div>
                                            <div class="about-item-content">
                                                <h5>
                                                    <a href="{{ env('DOWNLOAD_DRIVE') }}" target="_blank">
                                                        Client - GoogleDrive
                                                    </a>
                                                </h5>
                                                <p>Você também pode fazer o download do Client pelo GoogleDrive.</p>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.main.app>
