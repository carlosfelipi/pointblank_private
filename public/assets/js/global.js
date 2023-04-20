(function ($) {
    $(function () {
        h_pos();
        vodpop();
        popup();

        $(window).load(function () {
            nopi();
            h_pos();
            resizeWindow();
        });

        $(window).resize(function () {
            deviceCheck();
            $("body").css("position", "static");
            nopi();
            h_pos();
            resizeWindow();
        });

        function h_pos() {
            var h_pos = $(".main_notice .mn_list .mn_box .mn_pic").height();
            var h_nopi = $(".main_notice .mn_list h2").innerHeight();
            var vod_h = $(".vd_pop").height();
            var pop_h = $(".popup").height();
            $(".main_notice .mn_list h2").css("top", h_pos - h_nopi);
            $(".vd_pop").css("margin-top", -(vod_h / 2));
            $(".popup").css("margin-top", -(pop_h / 2));
        }

        $(".login_box").clone().prependTo($(".quick"));
        $(".quick_list").clone().prependTo($(".main_quick"));

        $(".quick_sns .top").click(function () {
            $("html, body").animate({ scrollTop: 0 }, 400);
            return false;
        });

        var responSize = 1007; // 1024
        var device = "";

        var deviceCheck = function () {
            var winWidth = $(window).width();
            if (winWidth >= responSize) {
                if (device == "pc") {
                } else {
                    device = "pc";
                    eventreset(device);

                    pcmenu(device);
                    //PC---------------------
                }
            } else {
                if (device == "mb") {
                } else {
                    device = "mb";
                    eventreset(device);
                    mbmenu(device);

                    //mb-------------------
                }
            }
        };
        deviceCheck();

        /* */
        function eventreset(device) {
            $(".gnb, .login_box").removeClass("active");
            $(".gnb, .login_box").css("opacity", "0");
            $(
                ".m_close, .gnb > h1, .login_box > h1, .gnb .quick_sns, .gnb .nation_select"
            ).remove();
            $(".m_menu, .mp .gnb > ul > li.in_ul > a, .m_user, .tool00").unbind(
                "click"
            );
            $(".gnb > ul > li.in_ul  > a").removeClass("on");
            $(".mp .gnb .depth2").attr("style", "");
            $(".ov-bg, .vd_pop, .popup, .tip00").hide();
        }

        /*pc-menu*/
        function pcmenu(device) {
            $("#header, .act_wrap").removeClass("mp").addClass("pc");
            $(".pc .my_account_wrap").hover(function () {
                $(".pc .my_account_list").stop().slideToggle();
            });
            nsel();
            toolmenu();
        }

        function mbmenu(device) {
            $("#header, .act_wrap").removeClass("pc").addClass("mp");

            $(".m_menu").click(function () {
                $(".gnb, .login_box").css("opacity", "1");
                $(".ov-bg").show();
                $(".login_box").removeClass("active");
                $(
                    ".m_close, .gnb > h1, .gnb .quick_sns, .gnb .nation_select"
                ).remove();
                $(".mp .gnb").prepend(
                    '<a class="m_close" href="#none"><img src="/assets/img/btn_close_m.png" alt="mene_close"></a>'
                );
                $(".header_wrap > h1").clone().prependTo($(".mp .gnb"));
                $(".quick_sns").clone().appendTo($(".mp .gnb"));
                $(".nation_select").clone().appendTo($(".mp .gnb"));
                $(".gnb").addClass("active");
                //$(".mp .gnb.active > ul > li > a").attr('href','#none');
                nsel();

                $(".m_close").click(function () {
                    $(".gnb").removeClass("active");
                    $(".ov-bg").hide();
                });
            });

            $(".m_user").click(function () {
                $(".gnb, .login_box").css("opacity", "1");
                $(".ov-bg").show();
                $(".gnb").removeClass("active");
                $(".m_close, .login_box > h1").remove();
                $(".mp .login_box").prepend(
                    '<a class="m_close" href="#none"><img src="/assets/img/btn_close_m.png" alt="mene_close"></a>'
                );
                $(".header_wrap > h1").clone().prependTo($(".mp .login_box"));
                $(".login_box").addClass("active");

                $(".m_close").click(function () {
                    $(".login_box").removeClass("active");
                    $(".ov-bg").hide();
                });
            });

            $(".mp .gnb > ul > li.in_ul > a").click(function () {
                event.preventDefault();
                $(".mp .gnb .depth2").slideUp();
                $(".mp .gnb > ul > li.in_ul  > a").removeClass("on");
                if (!$(this).next().is(":visible")) {
                    $(this).next().slideDown();
                    $(this).addClass("on");
                }
            });

            mtoolmenu();
        }

        function vodpop() {
            $(".new_close").click(function () {
                $(".new_video iframe").attr("src", "");
                $(".ov-bg, .vd_pop").fadeOut(200);
            });

            $(".vod_link").click(function () {
                var vvt = $(this).children("h3").text();
                var _vurl = $(this).attr("data-url");
                var txt =
                    "<iframe width='100%' height='100%' src='" +
                    _vurl +
                    "' frameborder='0' allowfullscreen></iframe>";
                $(".new_video").html(txt);
                $(".new_video_tit").text(vvt);
                $(".ov-bg, .vd_pop").fadeIn(200);
            });
        }

        function popup() {
            $(".pop_close, .ov-bg, .popup_pay .my_btn00 ").click(function () {
                $(".ov-bg, .popup").fadeOut(200);
            });

            $(".pop_on").click(function () {
                $(".ov-bg, .popup").fadeIn(200);
            });
        }

        function nopi() {
            var sameHeight = 0;
            $(".box").ready(function () {
                $(".box").css("height", "");
                $(".box").each(function () {
                    var itemHeight = $(this).height();
                    if (itemHeight >= sameHeight) {
                        sameHeight = itemHeight;
                    }
                });
                $(".box").css("height", sameHeight);
            });
        }
        nopi();

        function nsel() {
            $(".nation_select > a").click(function () {
                $(".nation_select .nation_list").stop().slideToggle();
            });
        }

        function toolmenu() {
            $(".pc .tip01").show();
            $(".pc .tool00").hover(
                function () {
                    var tlnum = $(this);

                    var tipwidth = $(".pc .tip00")
                        .eq(tlnum.index() - 1)
                        .width();
                    var tipheight = $(".pc .tip00")
                        .eq(tlnum.index() - 1)
                        .height();

                    var pos = parseFloat($(this).position().top);
                    var pol = parseFloat($(this).position().left);

                    $(".pc .tip00")
                        .eq(tlnum.index() - 1)
                        .css("top", pos - tipheight - 24);
                    $(".pc .tip00")
                        .eq(tlnum.index() - 1)
                        .css("left", pol - tipwidth / 2 + 30);

                    $(".pc .tool00").removeClass("act");
                    tlnum.addClass("act");
                    $(".pc .tip00").hide();
                    $(".pc .tip00")
                        .eq(tlnum.index() - 1)
                        .stop()
                        .fadeIn(200);
                },
                function () {
                    $(".pc .tool00").removeClass("act");
                    $(".pc .tip00").hide();
                }
            );
        }

        function mtoolmenu() {
            $(".mp .tip_wrap").prepend(
                '<a class="act_close" href="#none"><img src="/assets/img/close_act.png" alt="act_close"></a>'
            );

            $(".mp .tool00").click(function () {
                var mtlnum = $(this);
                $(".mp .tool00").removeClass("act");
                mtlnum.addClass("act");
                $(".mp .tip00").hide();
                $(".mp .tip00")
                    .eq(mtlnum.index() - 1)
                    .stop()
                    .fadeIn(200);
                $(".ov-bg").show();
            });

            $(".ov-bg, .act_close").click(function () {
                $(".mp .tip00, .ov-bg").fadeOut(200);
            });
        }

        function resizeWindow() {
            var h = $(window).height();
            var w = $(window).width();

            if (w <= 770) {
                $(".account_wrap").css("min-height", h + "px");
            } else {
                $(".account_wrap").css("min-height", "700px");
            }
        }
    });
})(jQuery);

$(function () {
    var slider = $(".new_banner").bxSlider({
        controls: true,
        touchEnabled: true,
        controls: true,
        easing: "ease-in-out",
        auto: true,
        pager: true,
        responsive: true,
        infinite: true,
        speed: 1000,
        mode: "fade",
        onSliderLoad: function (currentIndex) {
            $(".bx-controls-direction").prependTo($(".new_pager"));
        },
        onSlideBefore: function ($slideElement, oldIndex, newIndex) {},
        onSlideAfter: function () {
            slider.stopAuto();
            slider.startAuto();
        },
    });
});

(function ($) {
    $(function () {
        nopi();
        $(window).load(function () {
            nopi();
        });
        $(window).resize(function () {
            nopi();
        });
        function nopi() {
            var sameHeight = 0;
            $(".box").ready(function () {
                $(".box").css("height", "");
                $(".box").each(function () {
                    var itemHeight = $(this).height();
                    if (itemHeight >= sameHeight) {
                        sameHeight = itemHeight;
                    }
                });
                $(".box").css("height", sameHeight);
            });
        }
        nopi();
    });
})(jQuery);

$(function () {
    $(".new_vod").slick({
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });
});

$(function () {
    ranktab();
});

function ranktab() {
    $(".rank_box h2").click(function () {
        var ques = $(this).parents("li");
        $(".rank_list > li").removeClass("act");
        ques.addClass("act");
        $(".main_rank ul.rank_table li").hide();
        $(".main_rank ul.rank_table li").eq(ques.index()).stop().fadeIn(200);
    });
}
