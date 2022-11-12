/*	You can do this */
if (window.jQuery) {
    jQuery(function ($) {
        function wpi_checkout_helper() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const is_wpi_learn = urlParams.get('wpi_print_learn');
            
            if ($('#payment_method_wc_wpi').length) {
                if (is_wpi_learn == 'true') {
                   window.history.replaceState(null, null, window.location.pathname);
                    $("body").addClass('wpi_payment_method_preview');
                    $('html, body').delay(100).animate({
                        scrollTop: $("#payment_method_wc_wpi").offset().top - ( $(window).innerHeight() / 2)
                    }, 300);
                    $('.payment_method_wc_wpi input').trigger('click');
                    setTimeout(function () {
                        $('.payment_method_wc_wpi label').addClass('tesst');
                    }, 1000)
                }
            }
        }

        $(document.body).on('updated_checkout', wpi_checkout_helper());

        $(document).ready(function () {
            // add attribute to myaccount >orders page  button : print pre invoice
            $('.wpi-print').attr('target', '_blank');
        })


    })
} else {
    console.log('jquery not loaded');
}


console.log("%c Developed by DeveloperMen.IR All Right Reserved. ", "font-weight: bold; font-size: 14px;color:#000;background-color:#f7b914;padding:5px 8px;border-radius:5px");
