<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $config->name }} | Pase de Batalla</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/library/swiper.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/library/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/event/battle_pass.css') }}" />
    <script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
</head>

<body>
    <div class="container">
        <header>
            <a href="javaScript:setToday();" class="btn_today">Ingresar<i></i></a>
            <a href="https://www.pointblank.id/" class="bi"><img src="../images/event/bi_pbbl_wh.png"
                    alt="Point Blank Beyond Limits"></a>
        </header>

        <div class="all_wrap">
            
            {{ $slot }}

            {{-- table ponts --}}
            <div class="section04">
                <img src="/assets/img/event/battle_pass/cha02.png" class="cha cha02 wow fadeInLeft">
                <img src="/assets/img/event/battle_pass/cha03.png" class="cha cha03 wow fadeInRight">
                <div class="inner">
                    <div class="tit_wrap wow fadeInUp">
                        <div class="tit">
                            <span>¿Cómo subir de <br class="mobile">nivel en el pase de batalla?</span><br>
                            <span>PARA AUMENTAR <span class="y_gra">LOS NIVELES DEL PASE DE
                                    BATALLA</span>,</span><br>
                            <span>solo se cuenta a partir de la <br class="mobile"><span class="y_gra">EXP de la
                                    temporada</span> que obtienes.</span>
                        </div>
                        <ul class="howto">
                            <li><span>1.</span> La EXP de la temporada se puede obtener de cada juego que termine. Es el
                                10% de la cantidad de EXP de cada partido finalizado. </li>
                            <li><span>2.</span> Solo puede obtener un total máximo de 1,000 EXP de temporada por día a
                                partir de la EXP recibida del partido.</li>
                            <li><span>3.</span> Puede obtener elementos de EXP de temporada completando la misión web
                                diaria. </li>
                            <li><span>4.</span> También puede aumentar el nivel del Pase de batalla al instante según la
                                cantidad de EXP necesaria por nivel usando PB Cash.</li>
                        </ul>
                    </div>


                    <div class="exp_area wow fadeInUp">
                        <div class="exp_table exp_table_tit">
                            <div class="tit">
                                <div class="level">Nivel</div>
                                <div class="cumulative">ACUMULATIVO</div>
                                <div class="exp">EXP REQUERIDO PARA<br> PRÓXIMOS NIVELES</div>
                            </div>
                            <div class="tit">
                                <div class="level">Nivel</div>
                                <div class="cumulative">ACUMULATIVO</div>
                                <div class="exp">EXP REQUERIDO PARA<br> PRÓXIMOS NIVELES</div>
                            </div>
                            <div class="tit">
                                <div class="level">Nivel</div>
                                <div class="cumulative">ACUMULATIVO</div>
                                <div class="exp">EXP REQUERIDO PARA<br> PRÓXIMOS NIVELES</div>
                            </div>
                        </div>
                        <div class="exp_table">
                            <ul class="table_list">
                                <li>
                                    <div class="level">1</div>
                                    <div class="cumulative">0</div>
                                    <div class="exp">0</div>
                                </li>
                                <li>
                                    <div class="level">2</div>
                                    <div class="cumulative">50</div>
                                    <div class="exp">50</div>
                                </li>
                                <li>
                                    <div class="level">3</div>
                                    <div class="cumulative">101</div>
                                    <div class="exp">51</div>
                                </li>
                                <li>
                                    <div class="level">4</div>
                                    <div class="cumulative">153</div>
                                    <div class="exp">52</div>
                                </li>
                                <li>
                                    <div class="level">5</div>
                                    <div class="cumulative">207</div>
                                    <div class="exp">54</div>
                                </li>
                                <li>
                                    <div class="level">6</div>
                                    <div class="cumulative">263</div>
                                    <div class="exp">56</div>
                                </li>
                                <li>
                                    <div class="level">7</div>
                                    <div class="cumulative">322</div>
                                    <div class="exp">59</div>
                                </li>
                                <li>
                                    <div class="level">8</div>
                                    <div class="cumulative">384</div>
                                    <div class="exp">62</div>
                                </li>
                                <li>
                                    <div class="level">9</div>
                                    <div class="cumulative">449</div>
                                    <div class="exp">65</div>
                                </li>
                                <li>
                                    <div class="level">10</div>
                                    <div class="cumulative">518</div>
                                    <div class="exp">69</div>
                                </li>
                                <li>
                                    <div class="level">11</div>
                                    <div class="cumulative">592</div>
                                    <div class="exp">74</div>
                                </li>
                                <li>
                                    <div class="level">12</div>
                                    <div class="cumulative">671</div>
                                    <div class="exp">79</div>
                                </li>
                                <li>
                                    <div class="level">13</div>
                                    <div class="cumulative">756</div>
                                    <div class="exp">85</div>
                                </li>
                                <li>
                                    <div class="level">14</div>
                                    <div class="cumulative">847</div>
                                    <div class="exp">91</div>
                                </li>
                                <li>
                                    <div class="level">15</div>
                                    <div class="cumulative">945</div>
                                    <div class="exp">98</div>
                                </li>
                                <li>
                                    <div class="level">16</div>
                                    <div class="cumulative">1051</div>
                                    <div class="exp">106</div>
                                </li>
                                <li>
                                    <div class="level">17</div>
                                    <div class="cumulative">1166</div>
                                    <div class="exp">115</div>
                                </li>
                                <li>
                                    <div class="level">18</div>
                                    <div class="cumulative">1290</div>
                                    <div class="exp">124</div>
                                </li>
                                <li>
                                    <div class="level">19</div>
                                    <div class="cumulative">1424</div>
                                    <div class="exp">134</div>
                                </li>
                                <li>
                                    <div class="level">20</div>
                                    <div class="cumulative">1568</div>
                                    <div class="exp">144</div>
                                </li>
                                <li>
                                    <div class="level">21</div>
                                    <div class="cumulative">1723</div>
                                    <div class="exp">155</div>
                                </li>
                                <li>
                                    <div class="level">22</div>
                                    <div class="cumulative">1889</div>
                                    <div class="exp">166</div>
                                </li>
                                <li>
                                    <div class="level">23</div>
                                    <div class="cumulative">2059</div>
                                    <div class="exp">170</div>
                                </li>
                                <li>
                                    <div class="level">24</div>
                                    <div class="cumulative">2233</div>
                                    <div class="exp">174</div>
                                </li>
                                <li>
                                    <div class="level">25</div>
                                    <div class="cumulative">2411</div>
                                    <div class="exp">178</div>
                                </li>
                                <li>
                                    <div class="level">26</div>
                                    <div class="cumulative">2593</div>
                                    <div class="exp">182</div>
                                </li>
                                <li>
                                    <div class="level">27</div>
                                    <div class="cumulative">2779</div>
                                    <div class="exp">186</div>
                                </li>
                                <li>
                                    <div class="level">28</div>
                                    <div class="cumulative">2969</div>
                                    <div class="exp">190</div>
                                </li>
                                <li>
                                    <div class="level">29</div>
                                    <div class="cumulative">3163</div>
                                    <div class="exp">194</div>
                                </li>
                                <li>
                                    <div class="level">30</div>
                                    <div class="cumulative">3361</div>
                                    <div class="exp">198</div>
                                </li>
                            </ul>
                        </div>

                        <div class="exp_table">
                            <ul class="table_list">
                                <li>
                                    <div class="level">31</div>
                                    <div class="cumulative">3574</div>
                                    <div class="exp">213</div>
                                </li>
                                <li>
                                    <div class="level">32</div>
                                    <div class="cumulative">3812</div>
                                    <div class="exp">238</div>
                                </li>
                                <li>
                                    <div class="level">33</div>
                                    <div class="cumulative">4080</div>
                                    <div class="exp">268</div>
                                </li>
                                <li>
                                    <div class="level">34</div>
                                    <div class="cumulative">4378</div>
                                    <div class="exp">298</div>
                                </li>
                                <li>
                                    <div class="level">35</div>
                                    <div class="cumulative">4696</div>
                                    <div class="exp">318</div>
                                </li>
                                <li>
                                    <div class="level">36</div>
                                    <div class="cumulative">5029</div>
                                    <div class="exp">333</div>
                                </li>
                                <li>
                                    <div class="level">37</div>
                                    <div class="cumulative">5372</div>
                                    <div class="exp">343</div>
                                </li>
                                <li>
                                    <div class="level">38</div>
                                    <div class="cumulative">5725</div>
                                    <div class="exp">353</div>
                                </li>
                                <li>
                                    <div class="level">39</div>
                                    <div class="cumulative">6086</div>
                                    <div class="exp">361</div>
                                </li>
                                <li>
                                    <div class="level">40</div>
                                    <div class="cumulative">6450</div>
                                    <div class="exp">364</div>
                                </li>
                                <li>
                                    <div class="level">41</div>
                                    <div class="cumulative">6816</div>
                                    <div class="exp">366</div>
                                </li>
                                <li>
                                    <div class="level">42</div>
                                    <div class="cumulative">7197</div>
                                    <div class="exp">381</div>
                                </li>
                                <li>
                                    <div class="level">43</div>
                                    <div class="cumulative">7598</div>
                                    <div class="exp">401</div>
                                </li>
                                <li>
                                    <div class="level">44</div>
                                    <div class="cumulative">8009</div>
                                    <div class="exp">411</div>
                                </li>
                                <li>
                                    <div class="level">45</div>
                                    <div class="cumulative">8440</div>
                                    <div class="exp">431</div>
                                </li>
                                <li>
                                    <div class="level">46</div>
                                    <div class="cumulative">8891</div>
                                    <div class="exp">451</div>
                                </li>
                                <li>
                                    <div class="level">47</div>
                                    <div class="cumulative">9362</div>
                                    <div class="exp">471</div>
                                </li>
                                <li>
                                    <div class="level">48</div>
                                    <div class="cumulative">9853</div>
                                    <div class="exp">491</div>
                                </li>
                                <li>
                                    <div class="level">49</div>
                                    <div class="cumulative">10345</div>
                                    <div class="exp">492</div>
                                </li>
                                <li>
                                    <div class="level">50</div>
                                    <div class="cumulative">10838</div>
                                    <div class="exp">493</div>
                                </li>
                                <li>
                                    <div class="level">51</div>
                                    <div class="cumulative">11341</div>
                                    <div class="exp">503</div>
                                </li>
                                <li>
                                    <div class="level">52</div>
                                    <div class="cumulative">11884</div>
                                    <div class="exp">543</div>
                                </li>
                                <li>
                                    <div class="level">53</div>
                                    <div class="cumulative">12487</div>
                                    <div class="exp">603</div>
                                </li>
                                <li>
                                    <div class="level">54</div>
                                    <div class="cumulative">13170</div>
                                    <div class="exp">683</div>
                                </li>
                                <li>
                                    <div class="level">55</div>
                                    <div class="cumulative">13973</div>
                                    <div class="exp">803</div>
                                </li>
                                <li>
                                    <div class="level">56</div>
                                    <div class="cumulative">14926</div>
                                    <div class="exp">953</div>
                                </li>
                                <li>
                                    <div class="level">57</div>
                                    <div class="cumulative">16079</div>
                                    <div class="exp">1153</div>
                                </li>
                                <li>
                                    <div class="level">58</div>
                                    <div class="cumulative">17582</div>
                                    <div class="exp">1503</div>
                                </li>
                                <li>
                                    <div class="level">59</div>
                                    <div class="cumulative">19535</div>
                                    <div class="exp">1953</div>
                                </li>
                                <li>
                                    <div class="level">60</div>
                                    <div class="cumulative">22038</div>
                                    <div class="exp">2503</div>
                                </li>
                            </ul>
                        </div>

                        <div class="exp_table">
                            <ul class="table_list">
                                <li>
                                    <div class="level">61</div>
                                    <div class="cumulative">22759</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">62</div>
                                    <div class="cumulative">23480</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">63</div>
                                    <div class="cumulative">24201</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">64</div>
                                    <div class="cumulative">24922</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">65</div>
                                    <div class="cumulative">25643</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">66</div>
                                    <div class="cumulative">26364</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">67</div>
                                    <div class="cumulative">27085</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">68</div>
                                    <div class="cumulative">27806</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">69</div>
                                    <div class="cumulative">28527</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">70</div>
                                    <div class="cumulative">29248</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">71</div>
                                    <div class="cumulative">29969</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">72</div>
                                    <div class="cumulative">30690</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">73</div>
                                    <div class="cumulative">31411</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">74</div>
                                    <div class="cumulative">32132</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">75</div>
                                    <div class="cumulative">32853</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">76</div>
                                    <div class="cumulative">33574</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">77</div>
                                    <div class="cumulative">34295</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">78</div>
                                    <div class="cumulative">35016</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">79</div>
                                    <div class="cumulative">35737</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">80</div>
                                    <div class="cumulative">36458</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">81</div>
                                    <div class="cumulative">37179</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">82</div>
                                    <div class="cumulative">37900</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">83</div>
                                    <div class="cumulative">38621</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">84</div>
                                    <div class="cumulative">39342</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">85</div>
                                    <div class="cumulative">40063</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">86</div>
                                    <div class="cumulative">40784</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">87</div>
                                    <div class="cumulative">41505</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">88</div>
                                    <div class="cumulative">42226</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">89</div>
                                    <div class="cumulative">42947</div>
                                    <div class="exp">721</div>
                                </li>
                                <li>
                                    <div class="level">90</div>
                                    <div class="cumulative">43668</div>
                                    <div class="exp">721</div>
                                </li>

                            </ul>
                        </div>
                    </div> <!-- //exp_area -->
                </div>
            </div>
            {{-- social --}}
            <div class="section06">
                <div class="light_wrap">
                    <img src="/assets/img/event/battle_pass/bg06_star.jpg">
                </div>
                <div class="inner">
                    <div class="tit_wrap  wow fadeInUp">
                        <div class="tit"><span>CUENTAS OFICIALES<br class="mobile"> DE MEDIOS SOCIALES</span>
                        </div>
                        <div class="txt">También siga los eventos de nuestra Fanpage<br class="mobile"> Official
                            Point Blank Global.<br> Gana varios premios geniales y atractivos.<br class="mobile"> Solo
                            en Global!</div>
                    </div>
                    <div class="btns_sns wow fadeInUp" style="animation-duration: 1s;">
                        <div class="sns_li sns_insta">
                            <div class="sns_tit"><img src="/assets/img/event/battle_pass/txt_instagram.png"></div>
                            <a href="https://www.instagram.com/zepetto_pbindonesia" class="btn_insta"
                                target="_blank"></a>
                            <div class="sns">@global_pblatino</div>
                        </div>

                        <div class="sns_li sns_facebook">
                            <div class="sns_tit"><img src="/assets/img/event/battle_pass/txt_facebook.png"></div>
                            <a href="https://www.facebook.com/PBIndonesiaZepetto" class="btn_facebook"
                                target="_blank"></a>
                            <div class="sns">PB Global 2</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#none" class="btn_top">TOP</a>
    </div>

    <x-layouts.event.battle.partials.footer />
    <script type="text/javascript" src="{{ asset('assets/js/library/swiper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/library/wow.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/event/battle_pass.js') }}"></script>
</body>





</html>
