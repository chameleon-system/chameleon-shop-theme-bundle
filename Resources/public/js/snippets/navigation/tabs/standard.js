(function ($) {

    $.fn.CHAMELEON_Custom_navigation_tabs = function(options) {

        $.map($(this), function(element, index){

            var oTabContent = $('.tab-content .tab-pane',element);

            $('.nav-tabs a',element).on('click', function() {

                if(!$(this).parent().hasClass("active")){

                    $(this).parent().addClass('active').siblings().removeClass('active');
                    var ajaxURL = $(this).data('content');

                    if (ajaxURL) {
                        // show loader
                        oTabContent.block(CHAMELEON.Custom.GetLoadingImageConfig());
                        $.ajax({
                            url: ajaxURL,
                            processData: false,
                            dataType:  'json',
                            success: function(data,responseMessage) {
                                oTabContent.html(data.html);
                                oTabContent.unblock();
                                // call refresh
                                CHAMELEON.Custom.InitQuickShopLink(oTabContent);
                                CHAMELEON.Custom.RunJsOnContent(oTabContent);
                            },
                            type: 'POST'
                        });

                        return false;
                    }
                }
                return false;
            });
        });
    };
})(jQuery);


$(document).ready(function () {
    var oTabs = $('.snippetNavigationTabsStandard');
        if (oTabs.length > 0) {
            oTabs.CHAMELEON_Custom_navigation_tabs();
        }
});