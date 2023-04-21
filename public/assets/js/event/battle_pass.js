$(window).load(function () {
    nopi();
});

$(window).resize(function () {
    nopi();
});

function nopi() {
    var sameHeight = 0;
    $(".item_wrap .item_list li .con .item_box").ready(function () {
        $(".item_wrap .item_list li .con .item_box").css("height", "");
        $(".item_wrap .item_list li .con .item_box").each(function () {
            var itemHeight = $(this).height();
            if (itemHeight >= sameHeight) {
                sameHeight = itemHeight;
            }
        });
        $(".item_wrap .item_list li .con .item_box").css(
            "height",
            sameHeight - 30
        );
    });
}
nopi();

$(document).ready(function () {
    $(".btn_top").click(function () {
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            400
        );
        return false;
    });
});

new WOW().init();

$(function () {
    new Swiper(".swiper-container", {
        slidesPerView: 5,
        slidesPerGroup: 5,

        scrollbar: {
            el: ".swiper-scrollbar",
            draggable: true,
        },

        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            900: {
                slidesPerView: 2,
                slidesPerGroup: 1,
            },

            1100: {
                slidesPerView: 3,
                slidesPerGroup: 1,
            },
            1280: {
                slidesPerView: 3,
                slidesPerGroup: 1,
            },

            1400: {
                slidesPerView: 4,
                slidesPerGroup: 4,
            },
        },
    });
});
