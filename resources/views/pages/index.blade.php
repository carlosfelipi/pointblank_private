<x-layouts.main.app>
    <section class="banner-section">
        <div class="container">
            <div class="cta-wrapper item-layer">
                <div class="cta-item px-4 px-sm-5 pt-4 pt-sm-5 pt-lg-0" style="background-image: url({{ asset('assets/images/cta/bg.jpg') }});
                    background-position: center;background-size: cover;
                    ">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="cta-content">
                                <p class="theme-color text-uppercase ls-2">Let's go</p>
                                <h2 class="mb-3">JUNTE -SE AO <span class="theme-color text-uppercase">{{
                                        env('APP_NAME') }}</span>,
                                    VENHA SE DIVERTIR! </h2>
                                <p class="mb-4">Funcionalidade de nosso servidores e para sua diversão !!</p>
                                <a href="{{ env('DISCORD_URL') }}" target="_blank" class="default-button"><span>Junte-se
                                        à
                                        comunidade <i class="icofont-circled-right"></i></span></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="cta-thumb text-end">
                                <img class="banner_figure" src="{{ asset('assets/images/cta/char.png') }}"
                                    alt="gamer-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="match-section padding-top padding-bottom"
        style="background-image:url(/assets/images/banner/bg_.jpg)">
        <div class="container">
            <div class="section-header">
                <h2>RANKING</h2>
                <p>---</p>
            </div>
            <div class="section-wrapper">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="upcome-matches">
                            <h3 class="upcome-match-header">CLASSIFICAÇÃO INDIVIDUAL</h3>
                            <div class="row g-3">
                                @forelse ($players as $player)
                                <div class="col-12">
                                    <div class="match-item-2 item-layer">
                                        <div class="match-inner">
                                            <div
                                                class="match-header d-flex flex-wrap justify-content-between align-items-center">
                                                <p class="match-team-info">
                                                    <small>{{ $ranking->positionPlayer($player->player_id) }}º</small>
                                                    <a class="link"
                                                        href="{{ route('profilePlayerPage', ['id' => $player->player_id, 'name' => str_replace(' ', '_', strtolower($player->player_name))]) }}">
                                                        {{ $player->player_name }}
                                                    </a>
                                                    -
                                                    <small>Exp {{ number_format($player->exp) }}</small>
                                                </p>
                                                <p class="match-prize">
                                                    <small>{{ $patent->namePlayerPt($player->rank) }}</small> -
                                                    <img src="{{ asset('assets/images/patents/' . $player->rank . '.gif') }}"
                                                        title="{{ $patent->namePlayerPt($player->rank) }}"
                                                        alt="{{ $patent->namePlayerPt($player->rank) }}" />
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <div class="match-item-2 item-layer">
                                        <div class="match-inner">
                                            <div
                                                class="match-header d-flex flex-wrap justify-content-between align-items-center">
                                                <p class="match-team-info">
                                                    <a class="link">
                                                        Nenhum jogador encontrado!
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="upcome-matches">
                            <h3 class="upcome-match-header">CLASSIFICAÇÃO DE CLÃ</h3>
                            <div class="row g-3">
                                @forelse ($clans as $clan)
                                <div class="col-12">
                                    <div class="match-item-2 item-layer">
                                        <div class="match-inner">
                                            <div
                                                class="match-header d-flex flex-wrap justify-content-between align-items-center">
                                                <p class="match-team-info">
                                                    <small>{{ $ranking->positionClan($clan->clan_id) }}º</small>
                                                    {{ $clan->clan_name }} - <small>Exp <span class="fw-bold">{{
                                                            number_format($clan->clan_exp) }}</span>
                                                    </small>
                                                </p>
                                                <p class="match-prize">
                                                    <small>{{ $patent->nameClaPt($clan->rank) }}</small> -
                                                    <img src="{{ asset('assets/images/patents/' . $clan->clan_rank . '.jpg') }}"
                                                        title="{{ $patent->nameClaPt($clan->clan_rank) }}"
                                                        alt="{{ $patent->nameClaPt($clan->clan_rank) }}" />
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <div class="match-item-2 item-layer">
                                        <div class="match-inner">
                                            <div
                                                class="match-header d-flex flex-wrap justify-content-between align-items-center">
                                                <p class="match-team-info">
                                                    <a class="link">
                                                        Nenhum clã encontrado!
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($news->count() != 0)
    <div class="blog-section padding-top padding-bottom">
        <div class="container">
            <div class="section-header">
                <h2>NOTÍCIAS</h2>
                <p>NOSSAS NOTÍCIAS RECENTES</p>
            </div>
            <div class="section-wrapper">
                <div class="row g-4 justify-content-center row-cols-lg-2 row-cols-1">
                    @foreach ($news as $item)
                    <div class="col">
                        <div class="blog-item">
                            <div class="blog-inner">
                                <div class="blog-thumb">
                                    <a href="{{ route('blogPageDetail', [
                                                    'id' => $item->id,
                                                ]) }}">
                                        <img src="{{ $item->card }}" alt="{{ $item->title }}"
                                            title="{{ $item->title }}" />
                                    </a>
                                </div>
                                <div class="blog-content px-3 py-4">
                                    <a href="{{ route('blogPageDetail', [
                                                    'id' => $item->id,
                                                ]) }}">
                                        <h3>{{ $item->title }}</h3>
                                    </a>
                                    <div class="meta-post">
                                        <span class="badge badge-pill badge-{{ $blog->typeBlogColor($item->type) }}">
                                            {{ $blog->typeBlog($item->type) }}
                                        </span>
                                        &nbsp;
                                        <a>
                                            {{ $date->dateBlog($item->created_at) }}
                                        </a>
                                    </div>
                                    <a href="{{ route('blogPageDetail', [
                                                'id' => $item->id
                                            ]) }}" class="default-button reverse-effect">
                                        <span>Ver
                                            <i class="icofont-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    @if ($itens->count() > 0)
    <div class="product-section padding-top padding-bottom"
        style="background: url(assets/images/banner/shop_bg.png);background-size: cover;">
        <div class="container">
            <div class="section-header">
                <h2>LOJA</h2>
            </div>
            <div class="section-wrapper">
                <div class="row g-4 justify-content-center">
                    @foreach ($itens as $item)
                    <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                        <div class="product-item">
                            <div class="product-inner">
                                <div class="product-thumb">
                                    <img src="{{ $item->image }}" title="{{ $item->item_name }}"
                                        alt="{{ $item->item_name }}" class="w-100" />
                                </div>
                                <div class="product-content text-center p-3">
                                    <h4>
                                        <?= $modulesItem->tagBadge($item->tag) ?>
                                    </h4>
                                    <a
                                        href="{{ route('marketDetailPage', ['item' => $item->id, 'name' => str_replace(' ', '_', strtolower($item->item_name))]) }}">
                                        <h5 class="product-title">{{ $item->item_name }}</h5>
                                    </a>
                                    <h6>Categoria:
                                        <?= $modulesItem->slot($item->category) ?>
                                    </h6>
                                    <h6>
                                        <img src="{{ asset('assets/images/coin.png') }}" />
                                        $ {{ number_format($item->price) }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="text-center mt-5">
                        <a href="{{ route('marketPage') }}" class="default-button">
                            <span>Ver mais
                                <i class="icofont-circled-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-layouts.main.app>