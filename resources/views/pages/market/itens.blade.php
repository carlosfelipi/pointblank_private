<x-slot:title>
    Mercado Shark
</x-slot:title>
<div>
    <section class="pageheader-section">
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">Mercado Shark</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Mercado Shark</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="shop-page padding-top padding-bottom bg page">
        <div class="container">
            <div class="row justify-content-center pb-15">
                <div class="col-lg-12 col-12">
                    <article>
                        <div class="shop-title d-flex flex-wrap justify-content-between">
                            @auth
                                <p>Saldo:
                                    <span style="color:{{ auth()->user()->coin <= 20 ? '#d84a4a' : '#d8b44a' }};">
                                        {{ number_format(auth()->user()->coin) }}
                                    </span>
                                    Coin
                                </p>
                            @endauth
                            @guest
                                <p>
                                    Para efetuar uma compra, faça o <a href="{{ route('loginPage') }}">login</a>.
                                </p>
                            @endguest
                            <div class="product-view-mode">
                                <a class="active" data-target="grid">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </a>
                                <a data-target="list">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="shop-product-wrap row justify-content-center g-4 grid">
                            @forelse ($itens as $item)
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="product-item">
                                        <div class="product-thumb  text-center">
                                            <a href="javascript:void(0);" wire:click="detailItem({{ $item->id }})">
                                                <img class="ef" src="{{ $item->image }}"
                                                    title="{{ $item->item_name }}" alt="{{ $item->item_name }}" />
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h4><?= $modulesItem->tagBadge($item->tag) ?></h4>
                                            <h5>
                                                <a href="javascript:void(0);"
                                                    wire:click="detailItem({{ $item->id }})">
                                                    {{ $item->item_name }}
                                                </a>
                                            </h5>
                                            <h6>
                                                <p>Duração: {{ $modulesItem->convertSecondsToDays($item->count) }}</p>
                                                {{-- <p>Categoria: <?= $modulesItem->slot($item->category) ?></p> --}}
                                                <div class="pay">
                                                    <img src="{{ asset('assets/images/coin.png') }}" />
                                                    $ {{ number_format($item->price) }}
                                                </div>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="product-list-item">
                                        <div class="product-thumb text-center">
                                            <img style="width: 60%;" src="{{ $item->image }}" />
                                        </div>
                                        <div class="product-content">
                                            <h4><?= $modulesItem->tagBadge($item->tag) ?></h4>
                                            <h5>
                                                <a href="javascript:void(0);"
                                                    wire:click="detailItem({{ $item->id }})">
                                                    {{ $item->item_name }}
                                                </a>
                                            </h5>
                                            <p>Duração: {{ $modulesItem->countDayItem($item->count) }}</p>
                                            <p>Categoria: <?= $modulesItem->slot($item->category) ?></p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="match-prize text-center">
                                    <i class="fa fa-info" aria-hidden="true"></i>
                                    Mercado Shark em manuntenção aguarde.
                                </p>
                            @endforelse
                        </div>
                        @if ($this->modalItem == true)
                            <div class="modal show" wire:click="modalState(false)">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <button type="button" class="close" wire:click="modalState(false)">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                        <div class="modal-body">
                                            <div class="product-details-inner">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-5 col-12">
                                                        <div class="thumb text-center">
                                                            <div class="pro-thumb">
                                                                <img id="image-thumb"
                                                                    src="{{ $this->pullItem()->image }}"
                                                                    title="{{ $this->pullItem()->item_name }}"
                                                                    alt="{{ $this->pullItem()->item_name }}"
                                                                    style="width: 70%;" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="product-content">
                                                            <h4><?= $modulesItem->tagBadge($this->pullItem()->tag) ?>
                                                            </h4>
                                                            <h5>
                                                                <a href="javascript:void(0);">
                                                                    {{ $this->pullItem()->item_name }}
                                                                </a>
                                                            </h5>

                                                            <p>Duração:
                                                                {{ $modulesItem->convertSecondsToDays($this->pullItem()->count) }}
                                                            </p>
                                                            <p>Valor:
                                                                <img src="{{ asset('assets/images/coin.png') }}" />
                                                                $ {{ number_format($this->pullItem()->price) }}
                                                            </p>
                                                            <p>Categoria:
                                                                <?= $modulesItem->slot($this->pullItem()->category) ?>
                                                            </p>
                                                        </div>
                                                        <div class="cart-button">
                                                            <a href="javascript:void(0);" wire:click="purchaseItem"
                                                                class="default-button">
                                                                <span>Comprar</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <style>
                                body {
                                    overflow: hidden;
                                }
                            </style>
                        @endif
                        {{ $itens->links('components.vendor.pagination.livewire.links') }}
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
