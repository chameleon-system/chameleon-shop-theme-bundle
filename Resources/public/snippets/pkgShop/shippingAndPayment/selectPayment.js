(function ($) {

    $.fn.CHAMELEON_Custom_paymentSelection = function (options) {

        var oPaymentList = $(this);
        var primaryButtonId = oPaymentList.data('primarybuttonid');

        var oPaymentButton = $('#' + primaryButtonId);

        $('input.paymentid', $(this)).on('click', function () {
            $('input.paymentid', oPaymentList).not(this).prop('checked', false).closest('li').removeClass('active');
            $(this).closest('li').addClass('active');

            var oButtonForm = $(this).parents('form');
            oPaymentButton.off('click');
            oPaymentButton.on('click', function () {
                oButtonForm.trigger('submit');
            });


        });

        // enable active payment method
        $('input.paymentid', $('li.active', oPaymentList)).trigger('click');


    };
})(jQuery);

$(document).ready(function () {
    var oPaymentSelection = $('.snippetOrderWizardShippingAndPaymentSelectPayment');
    if (oPaymentSelection.length > 0) {
        oPaymentSelection.CHAMELEON_Custom_paymentSelection();
    }

});
