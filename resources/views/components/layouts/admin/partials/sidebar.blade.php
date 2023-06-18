<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="{{ route('indexAdminPage') }}" title="">
                <img class="img-fluid for-light" src="/admin/images/logo/logo.png" />
                <img style="width: 80%;margin-top: -70px;" class="img-fluid for-dark" src="/assets/images/logo2.png" />
            </a>
            <div class="back-btn">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="toggle-sidebar" checked="checked">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid status_toggle middle sidebar-toggle">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="{{ route('indexAdminPage') }}" title="">
                <img class="img-fluid" src="/admin/images/logo/logo-icon.png" />
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow disabled" id="left-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
            </div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <li class="back-btn">
                                            <a href="{{ route('indexAdminPage') }}">
                                                <img class="img-fluid" src="/admin/images/logo/logo-icon.png" />
                                            </a>
                                            <div class="mobile-back text-end"><span>Back</span>
                                                <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                                            </div>
                                        </li>
                                        {{-- <li class="sidebar-main-title">
                                            <div>
                                                <h6 class="lan-1">Geral</h6>
                                                <p class="lan-2">Inicio</p>
                                            </div>
                                        </li> --}}
                                        <li class="sidebar-list">
                                            <a class='sidebar-link sidebar-title link-nav {{ Request::route()->getName() === '
                                                indexAdminPage' ? 'active' : '' }}' href="{{ route('indexAdminPage') }}">
                                                <i data-feather="home"></i>
                                                <span>Inicio</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-main-title">
                                            <div>
                                                <h6 class="lan-8">Gerenciamento Web</h6>
                                                <p class="lan-9">{{ env('APP_URL') }}</p>
                                            </div>
                                        </li>

                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title {{ Request::url() == route('itemcodeAdminPage') ? 'active' : '' }}" href="javascript:void(0);">
                                                <i data-feather="star"></i>
                                                <span>Cupons </span>
                                                <div class="according-menu">
                                                    <i class="fa fa-angle-{{ Request::url() == route('itemcodeAdminPage') || Request::url() == route('pincodeAdminPage') ? 'down' : 'right' }}"></i>
                                                </div>
                                            </a>
                                            <ul class="sidebar-submenu" style="display: {{ Request::url() == route('itemcodeAdminPage') || Request::url() == route('pincodeAdminPage') ? 'block;' : 'none;' }};">
                                                <li>
                                                    <a class="lan-4 {{ Request::url() == route('itemcodeAdminPage') ? 'active' : '' }}" href="{{ route('itemcodeAdminPage') }}">Itemcode
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="lan-4 {{ Request::url() == route('pincodeAdminPage') ? 'active' : '' }}" href="{{ route('pincodeAdminPage') }}">Pincode
                                                    </a>
                                                </li>

                                            </ul>
                                        </li>

                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title {{ Request::url() == route('newsManagerAdminPage') || Request::url() == route('newsAddAdminPage') ? 'active' : '' }}" href="javascript:void(0);">
                                                <i data-feather="layers"></i>
                                                <span class="lan-6">Notícias</span>
                                                <div class="according-menu">
                                                    <i class="fa fa-angle-{{ Request::url() == route('newsManagerAdminPage') || Request::url() == route('newsAddAdminPage') ? 'down' : 'right' }}""></i>
                                                </div>
                                            </a>
                                            <ul class=" sidebar-submenu" style="display: {{ Request::url() == route('newsManagerAdminPage') || Request::url() == route('newsAddAdminPage') ? 'block;' : 'none;' }};">
                                        <li>
                                            <a class="lan-4 {{ Request::url() == route('newsManagerAdminPage') ? 'active' : '' }}" href="{{ route('newsManagerAdminPage') }}">Notícias</a>
                                        </li>

                                        <li>
                                            <a class="lan-4 {{ Request::url() == route('newsAddAdminPage') ? 'active' : '' }}" href="{{ route('newsAddAdminPage') }}">Adicionar</a>
                                        </li>
                </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{ Request::url() == route('webShopAdminPage') || Request::url() == route('webShopItensAdminPage') ? 'active' : '' }}" href="javascript:void(0);">
                        <i data-feather="shopping-bag"></i>
                        <span>Webshop</span>
                        <div class="according-menu">
                            <i class="fa fa-angle-{{ Request::url() == route('webShopAdminPage') || Request::url() == route('webShopItensAdminPage') ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu" style="display: {{ Request::url() == route('webShopAdminPage') || Request::url() == route('webShopItensAdminPage') ? 'block;' : 'none;' }};">
                        <li>
                            <a class="lan-4 {{ Request::url() == route('webShopItensAdminPage') ? 'active' : '' }}" href="{{ route('webShopItensAdminPage') }}">Itens
                            </a>
                        </li>
                        <li>
                            <a class="lan-4 {{ Request::url() == route('webShopAdminPage') ? 'active' : '' }}" href="{{ route('webShopAdminPage') }}">Adicionar
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6 class="lan-8">Gerenciamento Servidor</h6>
                        <p class="lan-9">{{ $global->gameservers->ip ?? '127.0.0.1' }}:{{ $global->gameservers->port ?? '8000' }}</p>
                    </div>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{ Request::url() == route('xmasAddAdminPage') || Request::url() == route('rankupAddAdminPage') || Request::url() == route('visitAddAdminPage') || Request::url() == route('questAddAdminPage') || Request::url() == route('playTimeAddAdminPage') || Request::url() == route('loginAddAdminPage') || Request::url() == route('mapBonusAddAdminPage') ? 'active' : '' }}" href="javascript:void(0);">
                        <i data-feather="award"></i>
                        <span class="lan-6">Eventos</span>
                        <div class="according-menu">
                            <i class="fa fa-angle-{{ Request::url() == route('xmasAddAdminPage') || Request::url() == route('rankupAddAdminPage') || Request::url() == route('visitAddAdminPage') || Request::url() == route('questAddAdminPage') || Request::url() == route('playTimeAddAdminPage') || Request::url() == route('loginAddAdminPage') || Request::url() == route('mapBonusAddAdminPage') ? 'down' : 'right' }}""></i>
                                            </div>
                                        </a>
                                    <ul class=" sidebar-submenu"style="display: {{ Request::url() == route('xmasAddAdminPage') || Request::url() == route('rankupAddAdminPage') || Request::url() == route('visitAddAdminPage') || Request::url() == route('questAddAdminPage') || Request::url() == route('playTimeAddAdminPage') || Request::url() == route('loginAddAdminPage') || Request::url() == route('mapBonusAddAdminPage') ? 'block;' : 'none;' }};">
                <li>
                    <a class="lan-4 {{ Request::url() == route('rankupAddAdminPage') ? 'active' : '' }}" href="{{ route('rankupAddAdminPage') }}">
                        RankUp
                    </a>
                </li>
                <li>
                    <a class="lan-4 {{ Request::url() == route('mapBonusAddAdminPage') ? 'active' : '' }}" href="{{ route('mapBonusAddAdminPage') }}">
                        MapBonus
                    </a>
                </li>
                <li>
                    <a class="lan-4 {{ Request::url() == route('visitAddAdminPage') ? 'active' : '' }}" href="{{ route('visitAddAdminPage') }}">
                        Visit
                    </a>
                </li>
                <li>
                    <a class="lan-4 {{ Request::url() == route('loginAddAdminPage') ? 'active' : '' }}" href="{{ route('loginAddAdminPage') }}">
                        Login
                    </a>
                </li>
                <li>
                    <a class="lan-4 {{ Request::url() == route('playTimeAddAdminPage') ? 'active' : '' }}" href="{{ route('playTimeAddAdminPage') }}">
                        Playtime
                    </a>
                </li>
                <li>
                    <a class="lan-4 {{ Request::url() == route('questAddAdminPage') ? 'active' : '' }}" href="{{ route('questAddAdminPage') }}">
                        Quest
                    </a>
                </li>
                <li>
                    <a class="lan-4 {{ Request::url() == route('xmasAddAdminPage') ? 'active' : '' }}" href="{{ route('xmasAddAdminPage') }}">
                        Xmas
                    </a>
                </li>
                </ul>
                </li>


                </ul>
            </div>
            <div class="right-arrow" id="right-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </div>
        </nav>
    </div>
</div>