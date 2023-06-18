"use strict";
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    var errorSound = document.getElementById("errorSound");
                    errorSound.play();
                    $.toast({
                        text: "Por favor, preencha todos os campos corretamente.",
                        icon: "error",
                        hideAfter: "5000",
                        loaderBg: "#d9edf7",
                        showHideTransition: "plain",
                        position: "bottom-right",
                        afterShown: function() {
                            $(".toastDel").remove();
                        }
                    });
                    form.classList.add('was-validated');
                } else {
                    var successSound = document.getElementById("successSound");
                  // successSound.play();
                    form.classList.add('was-validated');
                }
            }, false);
            var inputs = form.querySelectorAll('input, select, textarea');
            Array.prototype.forEach.call(inputs, function(input) {
                input.addEventListener('input', function() {
                    if (input.checkValidity()) {
                        input.classList.remove('is-invalid');
                    } else {
                        input.classList.add('is-invalid');
                    }
                });
            });
        });
    }, false);
})();
