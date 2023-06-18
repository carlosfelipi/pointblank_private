if (localStorage.getItem("color"))
    $("#color").attr("href", "/admin/css/" + localStorage.getItem("color") + ".css");
if (localStorage.getItem("dark"))
    $("body").attr("class", "dark-only");
$("").appendTo($('body'));



(function () { })();
//live customizer js
$(document).ready(function () {

     $(".customizer-color li").on('click', function() {
        $(".customizer-color li").removeClass('active');
        $(this).addClass("active");
        var color = $(this).attr("data-attr");
        var primary = $(this).attr("data-primary");
        var secondary = $(this).attr("data-secondary");
        localStorage.setItem("color", color);
        localStorage.setItem("primary", primary);
        localStorage.setItem("secondary", secondary);
        localStorage.removeItem("dark");
        $("#color" ).attr("href", "/admin/css/"+color+".css" );
        $(".dark-only").removeClass('dark-only');
        location.reload(true);
    });

    $(".customizer-color.dark li").on('click', function() {
        $(".customizer-color.dark li").removeClass('active');
        $(this).addClass("active");
        $("body").attr("class", "dark-only");
        localStorage.setItem("dark", "dark-only");
    });
    
    if(localStorage.getItem("primary") != null) {
        document.documentElement.style.setProperty('--theme-deafult', localStorage.getItem("primary"));
    }
    if(localStorage.getItem("secondary") != null) {
        document.documentElement.style.setProperty('--theme-secondary', localStorage.getItem("secondary"));
    }
    $(".customizer-links #c-pills-home-tab, .customizer-links #c-pills-layouts-tab").click(function () {
        $(".customizer-contain").addClass("open");
        $(".customizer-links").addClass("open");
    });

    $(".close-customizer-btn").on('click', function () {
        $(".floated-customizer-panel").removeClass("active");
    });

    $(".customizer-contain .icon-close").on('click', function () {
        $(".customizer-contain").removeClass("open");
        $(".customizer-links").removeClass("open");
    });

    $(".color-apply-btn").click(function(){
        location.reload(true);
    });

    var primary = document.getElementById("ColorPicker1").value;
    document.getElementById("ColorPicker1").onchange = function () {
      primary = this.value;
      localStorage.setItem("primary", primary);
      document.documentElement.style.setProperty('--theme-primary', primary);
    };

    var secondary = document.getElementById("ColorPicker2").value;
    document.getElementById("ColorPicker2").onchange = function () {
      secondary = this.value;
      localStorage.setItem("secondary", secondary);
      document.documentElement.style.setProperty('--theme-secondary', secondary);
    };


    $(".customizer-color.dark li").on('click', function () {
        $(".customizer-color.dark li").removeClass('active');
        $(this).addClass("active");
        $("body").attr("class", "dark-only");
        localStorage.setItem("dark", "dark-only");
    });


    $(".customizer-mix li").on('click', function () {
        $(".customizer-mix li").removeClass('active');
        $(this).addClass("active");
        var mixLayout = $(this).attr("data-attr");
        $("body").attr("class", mixLayout);
    });


    $('.sidebar-setting li').on('click', function () {
        $(".sidebar-setting li").removeClass('active');
        $(this).addClass("active");
        var sidebar = $(this).attr("data-attr");
        $(".sidebar-wrapper").attr("sidebar-layout", sidebar);
    });

    $('.sidebar-main-bg-setting li').on('click', function () {
        $(".sidebar-main-bg-setting li").removeClass('active')
        $(this).addClass("active")
        var bg = $(this).attr("data-attr");
        $(".sidebar-wrapper").attr("class", "sidebar-wrapper " + bg);
    });

    $('.sidebar-type li').on('click', function () {

        $("body").append('');
        console.log("test");
        var type = $(this).attr("data-attr");

        var boxed = "";
        if ($(".page-wrapper").hasClass("box-layout")) {
            boxed = "box-layout";
        }
        switch (type) {
            case 'compact-sidebar': {
                $(".page-wrapper").attr("class", "page-wrapper compact-wrapper " + boxed);
                $(this).addClass("active");
                localStorage.setItem('page-wrapper', 'compact-wrapper');
                break;
            }
            case 'normal-sidebar': {
                $(".page-wrapper").attr("class", "page-wrapper horizontal-wrapper " + boxed);
                $(".logo-wrapper").find('img').attr('src', '/admin/images/logo/logo.png');
                localStorage.setItem('page-wrapper', 'horizontal-wrapper');
                break;
            }
            case 'default-body': {
                $(".page-wrapper").attr("class", "page-wrapper  only-body" + boxed);
                localStorage.setItem('page-wrapper', 'only-body');
                break;
            }
            case 'dark-sidebar': {
                $(".page-wrapper").attr("class", "page-wrapper compact-wrapper dark-sidebar" + boxed);
                localStorage.setItem('page-wrapper', 'compact-wrapper dark-sidebar');
                break;
            }
            case 'compact-wrap': {
                $(".page-wrapper").attr("class", "page-wrapper compact-sidebar" + boxed);
                localStorage.setItem('page-wrapper', 'compact-sidebar');
                break;
            }
            case 'color-sidebar': {
                $(".page-wrapper").attr("class", "page-wrapper compact-wrapper color-sidebar" + boxed);
                localStorage.setItem('page-wrapper', 'compact-wrapper color-sidebar');
                break;
            }
            case 'compact-small': {
                $(".page-wrapper").attr("class", "page-wrapper compact-sidebar compact-small" + boxed);
                localStorage.setItem('page-wrapper', 'compact-sidebar compact-small');
                break;
            }
            case 'box-layout': {
                $(".page-wrapper").attr("class", "page-wrapper compact-wrapper box-layout " + boxed);
                localStorage.setItem('page-wrapper', 'compact-wrapper box-layout');
                break;
            }
            case 'enterprice-type': {
                $(".page-wrapper").attr("class", "page-wrapper horizontal-wrapper enterprice-type" + boxed);
                localStorage.setItem('page-wrapper', 'horizontal-wrapper enterprice-type');
                break;
            }
            case 'modern-layout': {
                $(".page-wrapper").attr("class", "page-wrapper compact-wrapper modern-type" + boxed);
                localStorage.setItem('page-wrapper', 'compact-wrapper modern-type');
                break;
            }
            case 'material-layout': {
                $(".page-wrapper").attr("class", "page-wrapper horizontal-wrapper material-type" + boxed);
                localStorage.setItem('page-wrapper', 'horizontal-wrapper material-type');
                
                break;
            }
            case 'material-icon': {
                $(".page-wrapper").attr("class", "page-wrapper compact-sidebar compact-small material-icon" + boxed);
                localStorage.setItem('page-wrapper', 'compact-sidebar compact-small material-icon');
                
                break;
            }
            case 'advance-type': {
                $(".page-wrapper").attr("class", "page-wrapper horizontal-wrapper enterprice-type advance-layout" + boxed);
                localStorage.setItem('page-wrapper', 'horizontal-wrapper enterprice-type advance-layout');
                
                break;
            }
            default: {
                $(".page-wrapper").attr("class", "page-wrapper compact-wrapper " + boxed);
                localStorage.setItem('page-wrapper', 'compact-wrapper');
                break;
            }
        }
        // $(this).addClass("active");
        location.reload(true);
    });

    $('.main-layout li').on('click', function () {
        $(".main-layout li").removeClass('active');
        $(this).addClass("active");
        var layout = $(this).attr("data-attr");
        $("body").attr("class", layout);
        $("html").attr("dir", layout);
    });

    $('.main-layout .box-layout').on('click', function () {
        $(".main-layout .box-layout").removeClass('active');
        $(this).addClass("active");
        var layout = $(this).attr("data-attr");
        $("body").attr("class", "box-layout");
        $("html").attr("dir", layout);
    });

});