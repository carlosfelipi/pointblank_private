<header id="header" class="pc">
    <div class="header_wrap clr">
        <h1>
            <a href="/">
                <img src="{{ asset('assets/img/logo_pointblank.png') }}" title="{{ $config->name }}"
                    alt="logo_pointblank" />
            </a>
        </h1>
        <a href="#" class="m_menu">
            <img src="{{ asset('assets/img/btn_menu.png') }}" alt="mobile menu" />
        </a>
        <a href="#" class="m_user">
            <img src="{{ asset('assets/img/btn_user.png') }}" alt="mobile user" />
        </a>
        <nav class="gnb">
            <ul>
                <li class="depth1 in_ul">
                    <a href="{{ route('indexPage') }}" data-content="Comenzar">Comenzar</a>
                </li>

                <li class="depth1"><a href="/news/list" data-content="Noticias">Noticias</a></li>

                <li class="depth1"><a href="/faq/list" data-content="Descargar">Descargar</a></li>

                <li class="depth1 in_ul">
                    <a href="/ranking/individual/list" data-content="Ranking">RANK</a>
                    <ul class="depth2">
                        <li class="line2"><a href="/ranking/individual/list"><img
                                    src="{{ asset('assets/img/ico_2depth_individual.png') }}"
                                    alt="RANK INDIVIDU"><span>RANK<br>
                                    INDIVIDU</span></a>
                        </li>
                        <li class="line2"><a href="/ranking/clan/list"><img
                                    src="{{ asset('assets/img/ico_2depth_clan.png') }}" alt="RANK CLAN"><span>RANK<br>
                                    CLAN</span></a>
                        </li>
                        <li class="line2"><a href="/ranking/clan/map"><img
                                    src="{{ asset('assets/img/ico_2depth_map.png') }}"
                                    alt="RANK MAP"><span>RANK<br>MAP</span></a>
                        </li>
                    </ul>
                </li>

                <li class="depth1 in_ul">
                    <a href="javascript:void(0);" data-content="Forum">FORUM</a>
                    <ul class="depth2 depth2_sns">
                        <li>
                            <a href="https://discord.gg/pbzepetto" target="_blank" class="discord">
                                <img src="{{ asset('assets/img/ico_sns_discord.png') }}"
                                    alt="DISCORD"><span>DISCORD</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/PBIndonesiaZepetto/" target="_blank" class="facebook">
                                <img src="{{ asset('assets/img/ico_sns_facebook.png') }}"
                                    alt="FACEBOOK"><span>FACEBOOK</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/zepetto_pbindonesia" target="_blank" class="insta">
                                <img src="{{ asset('assets/img/ico_sns_insta.png') }}"
                                    alt="INSTAGRAM"><span>INSTAGRAM</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/c/ZepettoPBIndonesia" target="_blank" class="youtube">
                                <img src="{{ asset('assets/img/ico_sns_youtube.png') }}"
                                    alt="YOUTUBE"><span>YOUTUBE</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="depth1 in_ul">
                    <a href="/clan/main" data-content="Forum">CLAN</a>
                    <ul class="depth2 depth2_sns">
                        <li>
                            <a href="/clan/main" class="clanmain">
                                <img src="{{ asset('assets/img/icon_clanmain.png') }}" alt="clanmain"><span>INFO
                                    CLAN</span>
                            </a>
                        </li>
                        <li class="line2">
                            <a href="/clan/clanmedal" class="clanmedal">
                                <img src="{{ asset('assets/img/ico_clanmedal.png') }}" alt="clanmedal"><span>CLAN<br>
                                    MEDAL</span>
                            </a>
                        </li>
                        <li>
                            <a href="/clan/myclan" class="myclan">
                                <img src="{{ asset('assets/img/icon_myclan.png') }}" alt="myclan"><span>MY
                                    CLAN</span>
                            </a>
                        </li>
                        <li class="line2">
                            <a href="/clan/board/list" class="clancommunity">
                                <img src="{{ asset('assets/img/icon_clancommunity.png') }}"
                                    alt="clancommunity"><span>CLAN<br>COMMUNITY</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="depth1"><a href="/shop/list" data-content="Premiun Shop">PREMIUM SHOP</a></li>

            </ul>
        </nav>
        @auth
            <div class="login_box" style="opacity: 0;">
                <ul>
                    <li class="my_account">
                        <div class="my_account_wrap">
                            <a href="/ph/mypage/info" class="my_account_btn">{{ auth()->user()->login }}</a>
                            <ul class="my_account_list">
                                <li><a href="/ph/mypage/info">INFO</a></li>
                                <li><a href="/ph/ticket/list">TICKET</a></li>
                                <li><a href="/ph/game/profile">PROFILE</a></li>
                                <li><a href="/ph/mypage/esports">E-SPORTS</a></li>
                                <li><a href="/ph/mypage/notifications">NOTIFICATIONS</a></li>
                                <li><a href="/ph/topup/auth">PB TOP UP VOUCHER</a></li>
                                <li><a href="{{ route('logoutProccess') }}">LOGOUT</a></li>
                            </ul>
                        </div>
                        <div class="my_noti"><a href="/ph/mypage/notifications"><img
                                    src="{{ asset('assets/img/btn_account.png') }}" alt="btn_account"><span
                                    class="num">2</span></a></div>
                    </li>
                    <li class="login logout"><a href="{{ route('logoutProccess') }}">LOGOUT</a></li>
                </ul>
            </div>
        @endauth
        @guest
            <div class="login_box">
                <ul>
                    <li class="signup"><a href="{{ route('registerPage') }}">REGISTRO</a></li>
                    <li class="login"><a href="{{ route('loginPage') }}">ACCESO</a></li>
                </ul>
            </div>
        @endguest
    </div>

    <div class="quick">
        <x-layouts.main.partials.quick />
    </div>
</header>
