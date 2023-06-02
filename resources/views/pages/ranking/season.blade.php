<div>
    <x-slot:title>
        Ranking Temporada {{ $date->month(date('m')) }}
    </x-slot:title>
    <section class="pageheader-section">
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">Ranking Temporada {{ $date->month(date('m')) }}</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Ranking Temporada</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="achievement-section padding-top padding-bottom">
        <div class="container">
            <div class="section-wrapper">
                <div class="achievement-area">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="widget widget-search mb-3">
                                        <form class="search-wrapper">
                                            <input type="text" wire:model="search" placeholder="Nickname">
                                            <button type="button">
                                                @if ($this->search == null)
                                                    <button type="button">
                                                        <i class="fa fa-filter" aria-hidden="true"></i>
                                                    </button>
                                                @else
                                                    <button type="submit" wire:click="resetSearch()">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </button>
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table class="table text-white">
                                <thead class="thead-table text-uppercase">
                                    <tr>
                                        <th scope="col">Rank</th>
                                        <th scope="col">Nickname</th>
                                        <th scope="col">Patente</th>
                                        <th scope="col">Exp</th>
                                        <th scope="col">K/D</th>
                                        <th scope="col">HS%</th>
                                        <th scope="col">WIN%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($players as $player)
                                        <tr>
                                            <td>
                                                <div>
                                                    <span
                                                        class="win_wrap win0{{ $ranking->positionPlayerSeason($player->player_id) }}">
                                                        @if ($ranking->positionPlayerSeason($player->player_id) <= 3)
                                                            {{ number_format($ranking->positionPlayerSeason($player->player_id)) }}
                                                        @else
                                                            {{ number_format($ranking->positionPlayerSeason($player->player_id)) }}
                                                            º
                                                        @endif
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    {{ $player->player_name }}
                                                </a>
                                            </td>
                                            <td>
                                                <img
                                                    title="{{ $patent->namePlayerPt($player->player_rank) }}" width="24"
                                                    src="{{ asset('assets/images/patents/season/rank_' . $player->player_rank . '.png') }}" />
                                                <small>{{ $patent->namePlayerPt($player->player_rank) }}</small>
                                            </td>
                                            <td>
                                                <b>{{ number_format($player->season_exp) }}</b>
                                            </td>
                                            <td>
                                                <b>{{ $ranking->rateKd($player->season_kills_count, $player->season_deaths_count) }}</b>
                                            </td>
                                            <td>
                                                <b>{{ $ranking->rateHs($player->season_headshots_count, $player->season_totalkills_count) }}</b>
                                            </td>
                                            <td>
                                                <b>{{ $ranking->rateWin($player->season_fights_win, $player->season_fights) }}</b>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="item">
                                            <td style="text-align: center;" colspan="100%">Nenhum resultado encontrado
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $players->links('components.vendor.pagination.livewire.links') }}
            </div>
        </div>
        {{-- <style>
            body {
                overflow: hidden;
            }
        </style> --}}
        {{-- <div class="modal show" style="display: block;">
            <div class="black-box"></div>
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal"><i class="icofont-close"></i></button>
                    <div class="modal-body">
                        <div class="product-details-inner">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-12">
                                    <div class="thumb text-center">
                                        <div class="pro-thumb">
                                            <img src="{{ asset('assets/images/patents/51.png') }}" alt="shop">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-content">
                                        <h5><a href="#">Product Title Here</a></h5>
                                        <p>
                                            <i class="icofont-star"></i><i class="icofont-star"></i><i
                                                class="icofont-star"></i><i class="icofont-star"></i><i
                                                class="icofont-star"></i>
                                        </p>
                                        <h6>$200</h6>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                    </div>
                                    <div class="cart-button">
                                        <div class="cart-plus-minus">
                                            <div class="dec qtybutton">-</div>
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton"
                                                value="2">
                                            <div class="inc qtybutton">+</div>
                                        </div>
                                        <a href="#" class="default-button"><span>Add to Cart</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

</div>
