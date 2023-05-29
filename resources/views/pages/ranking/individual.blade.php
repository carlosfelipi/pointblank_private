<div>
    <x-slot:title>
        Ranking Individual
    </x-slot:title>
    <section class="pageheader-section">
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">Ranking Individual</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Ranking Individual</li>
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
                                            <input type="text" wire:model="search" placeholder="Nickname"
                                                name="tenta-a-sorte-aE" />
                                            @if ($this->search == null)
                                                <button type="button">
                                                    <i class="fa fa-filter" aria-hidden="true"></i>
                                                </button>
                                            @else
                                                <button type="submit" wire:click="resetSearch()">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </button>
                                            @endif
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
                                                @if ($ranking->positionPlayer($player->player_id) == 1)
                                                    <img src="{{ asset('assets/images/rank/01.png') }}" />
                                                @elseif ($ranking->positionPlayer($player->player_id) == 2)
                                                    <img src="{{ asset('assets/images/rank/02.png') }}" />
                                                @elseif ($ranking->positionPlayer($player->player_id) == 3)
                                                    <img src="{{ asset('assets/images/rank/03.png') }}" />
                                                @else
                                                    {{ number_format($ranking->positionPlayer($player->player_id)) }}º
                                                @endif
                                            </td>
                                            <td>
                                                <a
                                                    href="{{ route('profilePlayerPage', ['id' => $player->player_id, 'name' => str_replace(' ', '_', strtolower($player->player_name))]) }}">
                                                    {{ $player->player_name }}
                                                </a>
                                            </td>
                                            <td>
                                                <img title="{{ $patent->namePlayerPt($player->rank) }}"
                                                    src="{{ asset('assets/images/patents/' . $player->rank . '.gif') }}" />
                                                <small>{{ $patent->namePlayerPt($player->rank) }}</small>
                                            </td>
                                            <td>
                                                <b>{{ number_format($player->exp) }}</b>
                                            </td>
                                            <td>
                                                <b>{{ $ranking->rateKd($player->kills_count, $player->deaths_count) }}</b>
                                            </td>
                                            <td>
                                                <b>{{ $ranking->rateHs($player->headshots_count, $player->totalkills_count) }}</b>
                                            </td>
                                            <td>
                                                <b>{{ $ranking->rateWin($player->fights_win, $player->fights) }}</b>
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
    </div>
</div>
