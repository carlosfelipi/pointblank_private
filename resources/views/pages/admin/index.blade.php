<x-layouts.admin.app title="Estátisticas">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center">
                                <i data-feather="user-check"></i>
                            </div>
                            <div class="media-body">
                                <span class="m-0">Onlines</span>
                                <h4 class="mb-0 counter">{{ number_format($onlines) }}</h4>
                                <i class="icon-bg" data-feather="user-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center">
                                <i data-feather="users"></i>
                            </div>
                            <div class="media-body">
                                <span class="m-0">Contas</span>
                                <h4 class="mb-0 counter">{{ number_format($all) }}</h4>
                                <i class="icon-bg" data-feather="users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center">
                                <i data-feather="user-minus"></i>
                            </div>
                            <div class="media-body">
                                <span class="m-0">Banidos</span>
                                <h4 class="mb-0 counter">{{ number_format($bans) }}</h4>
                                <i class="icon-bg" data-feather="user-minus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center">
                                <i data-feather="shopping-cart"></i>
                            </div>
                            <div class="media-body">
                                <span class="m-0">Webshop</span>
                                <h4 class="mb-0 counter">{{ number_format($itens) }}</h4>
                                <i class="icon-bg" data-feather="shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin.app>