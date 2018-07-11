if (typeof CHAMELEON === "undefined" || !CHAMELEON) {
    var CHAMELEON = {};
}
CHAMELEON.Custom = CHAMELEON.Custom || {};

CHAMELEON.Custom.ToggleSizeTable = function(target_id) {
    var oSizeTable = $('#'+target_id);
    oSizeTable.appendTo('body');
    if(oSizeTable.is(':visible')) {
        oSizeTable.fadeOut();
    } else {
        if(oSizeTable.outerWidth() > $(window).outerWidth()) {
            oSizeTable.css('width',$(window).outerWidth());
        }
        oSizeTable.css("position","absolute");
        oSizeTable.css("top", ($(window).scrollTop() + ($(window).outerHeight() - oSizeTable.outerHeight()) / 2));
        oSizeTable.css("left", (($(window).outerWidth() - oSizeTable.outerWidth()) / 2));
        oSizeTable.fadeIn(function(){
            $('html').not('.sizetable').one('click',function(){
                oSizeTable.fadeOut();
            });
        });
    }
};