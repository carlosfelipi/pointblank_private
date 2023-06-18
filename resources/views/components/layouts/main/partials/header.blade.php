<header class="header-section">
    <div class="container">
        <div class="header-holder d-flex flex-wrap justify-content-between align-items-center">
            <div class="brand-logo d-none d-lg-inline-block">
                <div class="logo">
                    <a href="{{ route('indexPage') }}">
                        <img class="logo-header " src="{{ asset('assets/images/logo.svg') }}" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="header-menu-part">
                <div class="header-top">
                    <div class="header-top-area">
                        <ul class="left">
                            <li>
                                <i class="fa fa-bullhorn" aria-hidden="true"></i>
                                <span>RankUp
                                    <strong class="text-success ">
                                        {{ $global->rankup->percent_xp ?? '0'}}%
                                    </strong>
                                </span>
                            </li>
                            <li>
                                <i class="fa fa-gamepad" aria-hidden="true"></i>
                                Onlines:
                                <strong class="@if ($global->onlines === 0) text-danger @else text-success @endif">
                                    {{ number_format($global->onlines) }}
                                </strong>
                            </li>
                        </ul>
                        <ul class="social-icons d-flex align-items-center">
                            <li>
                                <a href="{{ env('YOUTUBE_URL') }}" target="_blank" class="fb">
                                    <i class="fa-brands fa-youtube" style="color: #ffffff;"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ env('DISCORD_URL') }}" target="_blank" class="fb">
                                    <i class="fa-brands fa-discord" style="color: #ffffff;"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ env('FACEBOOK_URL') }}" target="_blank" class="fb">
                                    <i class="fa-brands fa-facebook" style="color: #ffffff;"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="header-bottom">
                    <div class="header-wrapper justify-content-lg-end">
                        <div class="mobile-logo d-lg-none">
                            <a href="{{ route('indexPage') }}">
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="logo">
                            </a>
                        </div>
                        <div class="menu-area">
                            <ul class="menu">
                                <li>
                                    <a href="{{ route('indexPage') }}"><small>Início</small></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <small>Ranking</small>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="{{ route('individualPage') }}">
                                                <small>Individual</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('clanPage') }}">
                                                <small>Clã</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('downloadPage') }}">
                                        <small>Download</small>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('blogPage') }}">
                                        <small>Notícias</small>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('statusPage') }}">
                                        <small>Status</small>
                                    </a>
                                </li>
                                @auth
                                    <li>
                                        <a href="{{ route('marketPage') }}">
                                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                            <small>Loja</small>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0);">
                                            <small>
                                                <img width="22"
                                                    src="{{ asset('assets/images/patents/' . Auth::user()->rank . '.png') }}" />
                                                {{ Auth::user()->player_name ?: Auth::user()->login }}
                                            </small>
                                        </a>
                                        <ul class="submenu">
                                            @if (Auth::user()->access_admin == true)
                                                <li>
                                                    <a href="{{ route('indexAdminPage') }}" target="_blank">
                                                        <small>Dashboard</small>
                                                    </a>
                                                </li>
                                            @endif
                                            <li>
                                                <a
                                                    href="{{ route('profilePlayerPage', ['id' => auth()->user()->player_id, 'name' => str_replace(' ', '_', strtolower(auth()->user()->login))]) }}">
                                                    <small>Meu Ranking</small>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('couponPage') }}">
                                                    <small>Cupom</small>
                                                </a>
                                            </li>
                                            <li>

                                            <li>
                                                <a href="{{ route('logout') }}">
                                                    <small>Sair</small>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endauth

                                @guest
                                    <a href="{{ route('loginPage') }}" class="login">
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <strong>ENTRAR</strong>
                                        </span>
                                    </a>
                                    <a href="{{ route('registerPage') }}" class="signup">
                                        <span>
                                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                                            <strong> CADASTRAR-SE</strong>
                                        </span>
                                    </a>
                                @endguest
                            </ul>
                            <div class="header-bar d-lg-none">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="ellepsis-bar d-lg-none">
                                @auth
                                    <a href="javascript:void(0);">
                                        <small>
                                            <img width="25"
                                                src="{{ asset('assets/images/patents/' . Auth::user()->rank . '.png') }}" />
                                        </small>
                                    </a>
                                @endauth
                                @guest
                                    <a href="{{ route('loginPage') }}">
                                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    </a>
                                    &nbsp;
                                    <a href="{{ route('registerPage') }}">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                                    </a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
