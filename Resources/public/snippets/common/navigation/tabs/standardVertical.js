(function ($) {

    $.fn.CHAMELEON_CustomVertical_navigation_tabs = function (options) {

        $.map($(this), function(element, index){

            var oTabContent = $('.tab-content .tab-pane', element);

            $('.nav-tabs a', element).on('click', function () {

                var link = this;

                if (!$(this).parent().hasClass("active")) {

                    var ajaxURL = $(this).data('content');

                    if (ajaxURL) {

                        // show loader
                        oTabContent.children('.tabContent').block(CHAMELEON.Custom.GetLoadingImageConfig());

                        $.ajax({
                            url:ajaxURL,
                            processData:false,
                            dataType:'json',
                            success:function (data, responseMessage) {

                                oTabContent.children('.tabContent').html(data.html);
                                oTabContent.children('.tabContent').unblock();
                                $(link).parent().addClass('active').siblings().removeClass('active');
                                $(link).parent().addClass('active').siblings().addClass('inactive');
                                var sMargin = ((oTabContent.height() / 2) - oTabContent.parent().siblings(".nav").height() / 2) * -1;
                                var newWidth = oTabContent.width() + parseInt(oTabContent.css("margin-left"), 10) + 55;

                                oTabContent.parent().css("margin-top", sMargin + "px");
                                oTabContent.parent().height(oTabContent.height());
                                oTabContent.parent().animate({width:newWidth + 'px'}, { queue:false, duration:800 }, 'linear');
                                oTabContent.addClass('active');
                                CHAMELEON.Custom.InitQuickShopLink(oTabContent);
                                // call refresh
                                CHAMELEON.Custom.RunJsOnContent(oTabContent);
                            },
                            type:'POST'
                        });

                        return false;
                    }
                } else {

                    CloseList(oTabContent, link);

                }
                return false;
            });
        });
    };
})(jQuery);


$(document).ready(function () {
    var oTabs = $('.snippetNavigationTabsStandardVertical');
    if (oTabs.length > 0) {
        oTabs.CHAMELEON_CustomVertical_navigation_tabs();
    }
    $('.closer').on('click', function () {
        oTabContent = $(this).parent();
        link = $(this).parent().parent().siblings(".nav-tabs").children(".active").children("a");
        CloseList(oTabContent, link);
    });
});

function CloseList(oTabContent, link) {
    oTabContent.parent().animate({width:"1px"}, 800, 'linear', function () {
        $(link).parent().removeClass('active');
        $(link).parent().siblings().removeClass('inactive');
        oTabContent.removeClass('active');
    });
}