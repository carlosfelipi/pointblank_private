$(function () {
    var slider = $(".new_banner").bxSlider({
        controls: true,
        touchEnabled: true,
        auto: true,
        pager: true,
        speed:"100",
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
