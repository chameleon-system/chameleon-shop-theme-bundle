if (typeof CHAMELEON === "undefined" || !CHAMELEON) {
    var CHAMELEON = {};
}
CHAMELEON.Custom = CHAMELEON.Custom || {};

CHAMELEON.Custom.AddToBasket = function (sBasketSpotName, sProductId, iAmount, customData) {
    var sTargetUrl = '';
    if (window!=window.top) {
        var sOldURL = window.top.location.href;
        var iIndex = sOldURL.indexOf('?');
        if(iIndex > 0) {
            sTargetUrl = sOldURL.substring(0, iIndex);
        } else {
            sTargetUrl = sOldURL;
        }

    }

    var productElement = $('input[name="basket[shop_article_id]"][value="' + sProductId + '"]');
    var authenticityTokenElements = $(productElement.parent()).find('input[name="cmsauthenticitytoken"]');

    sTargetUrl = sTargetUrl + '?' + encodeURIComponent('module_fnc[' + sBasketSpotName + ']') + '=ExecuteAjaxCall';
    sTargetUrl = sTargetUrl + '&_fnc=AddToBasketAjax';
    sTargetUrl = sTargetUrl + '&' + encodeURIComponent('basket[shop_article_id]') + '=' + encodeURIComponent(sProductId);
    sTargetUrl = sTargetUrl + '&' + encodeURIComponent('basket[amount]') + '=' + encodeURIComponent(iAmount);
    sTargetUrl = sTargetUrl + '&' + encodeURIComponent('basket[consumer]') + '=' + encodeURIComponent('mtshopbasketcoremsg');
    sTargetUrl = sTargetUrl + '&' + encodeURIComponent('itemid') + '=' + encodeURIComponent(sProductId);
    if(authenticityTokenElements.length > 0) {
        sTargetUrl = sTargetUrl + '&' + encodeURIComponent('cmsauthenticitytoken') + '=' + encodeURIComponent(authenticityTokenElements[0].value);
    }
    if (typeof customData !== 'undefined') {
        sTargetUrl = sTargetUrl + '&' + customData;
    }
    GetAjaxCall(sTargetUrl, parent.CHAMELEON.Custom.AddToBasketResponse);
};

CHAMELEON.Custom.AddToBasketResponse = function (data, responseMessage, jqXHR) {
    $('#layover-quickshop').modal('hide');
    $('#added_to_basket_layover').remove();
    $('body').append(data.sNotificationWindow);
    $('#minibasket').html(data.sMiniBasket);
    CHAMELEON.Custom.RunJsOnContent();

    $(CHAMELEON).trigger("chameleon_system_shop.product_added", [{
        totalProductAmount: data.totalProductAmount
    }]);
};
