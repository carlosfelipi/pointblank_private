(function ($) {
    "use strict";
    var clipboard = new ClipboardJS(".btn-clipboard");
    clipboard.on("success", function (e) {
        $.toast({
            icon: "info",
            loaderBg: "#d9edf7",
            text: "Cupom foi copiado.",
            hideAfter: "5000",
            showHideTransition: "plain",
            position: "bottom-right",
        });
        // alert("Cupom foi copiado.");
        e.clearSelection();
    });
    clipboard.on("error", function (e) {});

    var clipboard = new ClipboardJS(".btn-clipboard-cut");
    clipboard.on("success", function (e) {
        alert("cut");
        e.clearSelection();
    });
    clipboard.on("error", function (e) {});
})(jQuery);
