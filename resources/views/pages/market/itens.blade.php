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
<div class="shop-page padding-top padding-bottom bg page">
    <div class="container">
        <div class="row justify-content-center pb-15">
            <div class="col-lg-12 col-12">
                <article>
                    <div class="shop-title d-flex flex-wrap justify-content-between">
                        <div class="product-view-mode mg-auto ">
                            <p>
                            <h3 class="value">Saldo Atual <img src="{{ asset('assets/images/shop/coin.png') }}">:
                                <span id="coin">
                                    @if (Auth::user()->coin <= 20)
                                        <b style="color:red;">{{ number_format(Auth::user()->coin) }}</b>
                                    @else
                                        <b style="color:gold;">{{ number_format(Auth::user()->coin) }}</b>
                                    @endif
                                </span>
                            </h3>
                            </p>
                        </div>
                        <div class="product-view-mode auto">
                            <a class="active" data-target="grid"><i class="fa fa-bars" aria-hidden="true"></i></a>
                            <a data-target="list"><i class="fa fa-list" aria-hidden="true"></i></a>
                        </div>
                        <div class="widget widget-search">
                            <form class="search-wrapper">
                                <input type="text" wire:model="Filter" placeholder="Item">
                                <button type="button">
                                    {{-- @if ($this->Filter == null)
                                        <button type="button">
                                            <i class="fa fa-filter" aria-hidden="true"></i>
                                        </button>
                                    @else
                                        <button type="submit" wire:click="ResetSearch()">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    @endif --}}
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="shop-product-wrap row justify-content-center g-4 grid">
                        {{-- @forelse ($this->Itens() as $Show)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="product-item">
                                    <div class="product-thumb  text-center">
                                        <a href="javascript:void(0);" wire:click="Modal({{ $Show->id }})">
                                            <img class="ef" src="{{ $Show->item_image }}" />
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h4><?= $this->Shop->Tag($Show->item_tag) ?></h4>
                                        <h5>
                                            <a href="javascript:void(0);" wire:click="Modal({{ $Show->id }})">{{ $Show->item_name }}
                                                {{ $Show->item_class }}</a>
                                        </h5>
                                        <h6>
                                            <div class="pay">
                                                <img src="{{ asset('assets/images/shop/coin.png') }}" />
                                                {{ $Show->item_price }}
                                            </div>
                                        </h6>
                                    </div>
                                </div>
                                <div class="product-list-item">
                                    <div class="product-thumb text-center">
                                        <img style="width: 60%;" src="{{ $Show->item_image }}" />
                                    </div>
                                    <div class="product-content">
                                        <h4><?= $this->Shop->Tag($Show->item_tag) ?></h4>
                                        <h5>
                                            <a href="javascript:void(0);"
                                                wire:click="Modal({{ $Show->id }})">{{ $Show->item_name }}
                                                {{ $Show->item_class }}</a>
                                        </h5>
                                        <h6>Categoria :<?= $this->Shop->Slot($Show->item_category) ?></h6>
                                        <p>{{ $Show->item_description }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="shop-title d-flex flex-wrap justify-content-between">
                                <p>
                                <h3>
                                    <i class="fa fa-info" aria-hidden="true"></i> Nenhum resultado encontrado
                                </h3>
                                </p>
                            </div>
                        @endforelse --}}
                    </div>
                    
                
                    {{-- @if ($this->Modal == true)
                        <div class="modal show">
                            <div class="black-box" wire:click="State(false)"></div>
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <button type="button" class="close" wire:click="State(false)">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                    <div class="modal-body">
                                        <div class="product-details-inner">
                                            <div class="row align-items-center">
                                                <div class="col-lg-5 col-12">
                                                    <div class="thumb text-center">
                                                        <div class="pro-thumb">
                                                            <img src="" style="width: 70%;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="product-content">
                                                        <h5>
                                                            <a href="#">
                                                               </a>
                                                        </h5>
                                                        <p>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </p>
                                                        <h6>
                                                            Preço :
                                                            <b> coin</b>
                                                        </h6>
                                                        <h6>Duração :
                                                           </h6>
                                                        <h4></h4>
                                                        <p></p>
                                                    </div>
                                                    <div class="cart-button">
                
                                                        <a href="javascript:void(0);" wire:click='Purcharse()'
                                                            class="default-button"><span>Comprar</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif --}}
                
                
                </article>
                
            </div>
        </div>
    </div>
</div>
