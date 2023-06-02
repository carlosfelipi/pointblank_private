<x-slot:title>
    Mercado Shark Item {{ $item->item_name }}
</x-slot:title>
<div>
    <section class="pageheader-section">
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">Detalhe Item {{ $item->item_name }}</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Detalhe Item {{ $item->item_name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="shop-single padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    <article>
                        <div class="product-details">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12">
                                    <div class="product-thumb">
                                        <img class="ef" src="{{ $item->image }}" title="{{ $item->item_name }}"
                                            alt="{{ $item->item_name }}" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="post-content">
                                        <h4><?= $modulesItem->tagBadge($item->tag) ?></h4>
                                        <h4>{{ $item->item_name }}</h4>
                                        <h6>Duração: {{ $modulesItem->countDayItem($item->count) }}</h6>
                                        <h6>Categoria: <?= $modulesItem->slot($item->category) ?></h6>
                                        <h6>
                                            <div class="pay">
                                                <img src="{{ asset('assets/images/coin.png') }}" />
                                                $ {{ number_format($item->price) }}
                                            </div>
                                        </h6>

                                        <button type="submit" class="default-button" wire:click="purchaseItem">
                                            <span>Comprar</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
