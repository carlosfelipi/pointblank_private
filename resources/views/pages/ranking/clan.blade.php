<div>
    <x-slot:title>
        Ranking Clã
    </x-slot:title>
    <section class="pageheader-section">
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">Ranking Clã</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Ranking Clã</li>
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
                                            <input type="text" wire:model="search" placeholder="Clãname">
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
                                        <th scope="col">Clãname</th>
                                        <th scope="col">Patente</th>
                                        <th scope="col">Exp</th>
                                        <th scope="col">WIN%</th>
                                        <th scope="col">Dono</th>
                                        <th scope="col">Membros</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($clans as $clan)
                                        <tr>
                                            <td>
                                                @if ($ranking->positionClan($clan->clan_id) == 1)
                                                    <img src="{{ asset('assets/images/rank/01.png') }}" />
                                                @elseif ($ranking->positionClan($clan->clan_id) == 2)
                                                    <img src="{{ asset('assets/images/rank/02.png') }}" />
                                                @elseif ($ranking->positionClan($clan->clan_id) == 3)
                                                    <img src="{{ asset('assets/images/rank/03.png') }}" />
                                                @else
                                                    {{ number_format($ranking->positionClan($clan->clan_id)) }}º
                                                @endif
                                            </td>
                                            <td>
                                                <a>{{ $clan->clan_name }}</a>
                                            </td>
                                            <td>
                                                <img width="22" title="{{ $patent->nameClaPt($clan->clan_rank) }}"
                                                    src="{{ asset('assets/images/patents/' . $clan->clan_rank . '.jpg') }}" />
                                                <small>{{ $patent->nameClaPt($clan->clan_rank) }}</small>
                                            </td>
                                            <td>
                                                <b>{{ number_format($clan->clan_exp) }}</b>
                                            </td>
                                            <td>{{ $ranking->rateWinClan($clan) }}</td>
                                            <td>
                                                <img width="22"
                                                    title="{{ $patent->namePlayerPt($clan->rank) }}"
                                                    src="{{ asset('assets/images/patents/' . $clan->rank . '.png') }}" />
                                                &nbsp;
                                                <a
                                                href="{{ route('profilePlayerPage', ['id' => $clan->player_id, 'name' => str_replace(' ', '_', strtolower($clan->player_name))]) }}">{{ $clan->player_name }}</a>
                                            </td>
                                            <td>
                                                {{ number_format($this->members($clan)) }}/{{ number_format($clan->max_players) }}
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
                {{ $clans->links('components.vendor.pagination.livewire.links') }}
            </div>
        </div>
    </div>
</div>
