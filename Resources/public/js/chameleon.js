if (typeof CHAMELEON === "undefined" || !CHAMELEON) {
    var CHAMELEON = {};
}
CHAMELEON.Custom = CHAMELEON.Custom || {};

CHAMELEON.Custom.GetLoadingImageConfig = function () {
    return {baseZ:2000, bindEvents:false, constrainTabKey:false, timeout:50000, css:{border:'none', backgroundColor:'transparent'}, overlayCSS:{backgroundColor:'#fff', opacity:0.5}, message:'<div class="loadingbg"><img src="/assets/images/loader.gif" /></div>' };
};

function GetAjaxCall(url, functionName) {
    $.ajax({
        url:url,
        processData:false,
        dataType:'json',
        success:functionName,
        type:'POST'
    });
    return false;
}

// @deprecated
function ShowListItems(data, responseMessage) {
    var container = document.createElement("div");
    container.innerHTML = data.sItemPage;
    container = $(container);

    var productsListParent = $('#key' + data.iListKey);

    wrapper = productsListParent.parent();
    wrapper.append(container);
    productsListParent.remove();
    productsListParent.unblock();
    CHAMELEON.Custom.InitQuickShopLink(wrapper);
}

CHAMELEON.Custom.BootstrapCarouselPreSlide = function(direction, callback){
    if (this.sliding) return;

    var $active = this.$element.find('.item.active'),
        $target = $active[direction](),
        $targetElement = $($target[0]);

    if($targetElement.attr('data-url') !== 'false') {
        // get data and insert it into target item
        $.ajax({
            url: $targetElement.attr('data-url'),
            dataType: 'json',
            context: this,
            success: function(data) {
                $targetElement.html(data.sItemPage)
                    .attr('data-url', 'false');
                // enable left control
                $targetElement.parent().find('.carousel-control.left').show('fast');
                CHAMELEON.Custom.InitQuickShopLink($targetElement);
                return callback.call(this, direction);
            }
        });
    } else {
        return callback.call(this, direction);
    }
};

CHAMELEON.Custom.BootstrapCarouselExtension = function() {
    var carouselPrototype = $('body').carousel.prototype.constructor.Constructor.prototype;
    carouselPrototype.slideNext = carouselPrototype.next;
    carouselPrototype.next = function() {
        CHAMELEON.Custom.BootstrapCarouselPreSlide.call(this, 'next', this.slideNext);
    };
    carouselPrototype.slidePrev = carouselPrototype.prev;
    carouselPrototype.prev = function() {
        CHAMELEON.Custom.BootstrapCarouselPreSlide.call(this, 'prev', this.slidePrev);
    }
};

CHAMELEON.Custom.BootstrapCarousel = function (containerID) {
    var sliderElement = $('#slider'+containerID);

    sliderElement.parent().find("a[data-slide='prev'], a[data-slide='next']").attr('href', '#slider'+containerID);
    sliderElement.carousel( {
        interval: false
    }).on('slid.bs.carousel', function (e) {
            var $carousel = $(this),
                $carouselParent = $carousel.parent(),
                $carouselInner = $carousel.children('.carousel-inner').first(),
                activeItemIndex = $carouselInner.find('.active').index(),
                itemCount = $carouselInner.children().length,
                $prevButton = $carouselParent.find('.carousel-control.left'),
                $nextButton = $carouselParent.find('.carousel-control.right');

            if(activeItemIndex === 0){ // on first element
                $prevButton.hide();
            } else {
                var prevButtonTitle = $prevButton.data('title')
                    .replace('[{pageCount}]', itemCount)
                    .replace('[{page}]', activeItemIndex);
                $prevButton.attr('title', prevButtonTitle);
                $prevButton.show();
            }

            if((activeItemIndex + 1) === itemCount){ // on last element
                $nextButton.hide();
            } else {
                var nextButtonTitle = $nextButton.data('title')
                    .replace('[{pageCount}]', itemCount)
                    .replace('[{page}]', activeItemIndex + 2);
                $nextButton.attr('title', nextButtonTitle);
                $nextButton.show();
            }

            $carouselInner.css('overflow', 'visible');
        }).on('slide.bs.carousel', function(e){
            $(this).find('.carousel-inner')
                .css('overflow', 'hidden');
        });
};

CHAMELEON.Custom.RunJsOnContent = function (oContent) {
    $('.cmsIncDec:not([disabled])', oContent).CHAMELEON_Custom_InputIncDecField();
    $("form[method='post']:not(.chameleon-allow-double-click)").CHAMELEON_Custom_preventDoubleClick();

    // search for bootstrap popovers - make sure the js for this is included (http://twitter.github.com/bootstrap/javascript.html#popovers)
    // if you do not use this plugin, then remove the call here
    oPopoverList = $('.cmspopover');
    if (oPopoverList.length > 0) {
        $('.cmspopover', oContent).popover({
            html: true
        });
    }

    CHAMELEON.Custom.InitQuickShopLink(oContent);

    $('.inline_overlay', oContent).CHAMELEON_Custom_InlineOverlay();
    var quickSearchFormInput = $('#quicksearchform .userInputBoxInput');
    if(quickSearchFormInput.length > 0) {
        quickSearchFormInput.attr('autocomplete','off');
        quickSearchFormInput.typeahead({
            source: function (query, process) {
                return $.get('/searchsuggest', { query: query }, function (data) {
                    return process(data.options);
                });
            },
            updater:function (item) {
                quickSearchFormInput.val(item);
                $('#quicksearchform').submit();
                return item;
            }
        });

    }

    CHAMELEON.Custom.responsiveRepositioning();
    CHAMELEON.Custom.InitZoomMagnifier();
};

CHAMELEON.Custom.InputIncDecField = function () {

};

CHAMELEON.Custom.InitQuickShopLink = function(object){
    $('a.quickshop', object).each(function () {
        $(this).off('click');
        $(this).on('click', function () {
            CHAMELEON.Custom.InitQuickShop(this);
            return false;
        });
        $(this).parent('.initHidden').removeClass("initHidden");
    });
};

CHAMELEON.Custom.InitQuickShop = function (oObject) {
    var height = $(window).height() -150 ;
    if (height > 800) {
        var height = 800;
    }

    if ($('#layover-quickshop').length > 0) {
        $('#layover-quickshop').remove();
    }
    var oModal = $(
        '<div id="layover-quickshop" class="modal" tabindex="-1" role="dialog">' +
            '<div class="modal-dialog">' +
                '<div class="modal-content">' +
                    '<div class="modal-header">' +
                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true"><span aria-hidden="true">&times;</span></button>' +
                    '</div>' +
                    '<div class="modal-body">' +
                        '<iframe width="100%" height="' + height + '" src="' + oObject.href + '"></iframe>' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</div>');
    oModal.addClass('hideOnJS');
    $('body').append(oModal);

    $('#layover-quickshop').modal('show');
    return false;
};
/**
 *
 * @param checkbox has to be an jquery object
 * @return {*}
 */
CHAMELEON.Custom.getCheckboxState = function (checkbox) {
    return checkbox.prop('checked');
};

CHAMELEON.Custom.InitZoomMagnifier = function() {
    if($('.snippetGalleryGalleryVertical .thumbnail.zoomMagnifier').length > 0) {
        $('.snippetGalleryGalleryVertical .thumbnail.zoomMagnifier').CHAMELEON_Custom_ImageZoomMagnifier({bResponsive: true});
        $('body.popup .activeImage .thumbnail').CHAMELEON_Custom_ImageZoomDrag({bDisableOnDesktop: false, bDisableOnMobileDevices: true});
        $('.cmsgallery').CHAMELEON_Custom_ImageMobileSlider({bOnlyEnableOnMobileDevices: true, sOnAfterSliderCallback:CHAMELEON.Custom.InitZoomMagnifierOnSlide});
    }
};

CHAMELEON.Custom.InitZoomMagnifierOnSlide = function(oSliderContainer) {
    oSliderContainer.CHAMELEON_Custom_ImageZoomDrag({bDisableOnDesktop: true, sBigImageAttributeName: 'data-cmslargeimage'});
};

CHAMELEON.Custom.responsiveRepositioning = function () {
    //switch the content blocks - we only had ordered them "the wrong way" because of hugh performance boost and now we want to switch the positions
    //because of responsive design improvements (filters and sub-navigation above the article list)
    $('#navigationPageRightSide').parent().prepend($('#navigationPageLeftSide'));
    //close the filter box on small devices
    if (window.innerWidth < 768) {
        $('.snippetShopFilter .filterBox .filterHeader.filterOpen').trigger('click');
    }
};

(function ($) {

    jQuery.fn.CHAMELEON_Custom_preventDoubleClick = function() {
        $(this).on('submit',function(e){
            var $form = $(this);
            if ($form.data('submitted') === true) {
                e.preventDefault();
                console.log('CHAMELEON_Custom_preventDoubleClick: prevented multi submit');
            } else {
                $form.data('submitted', true);
            }
        });
        return this;
    };

    $.fn.CHAMELEON_Custom_InputIncDecField = function (options) {
        $(this).each(function () {
            var oInputField = $(this);
            if(!oInputField.parent().hasClass('inputIncDecField')) {
                oInputField.wrap('<span class="inputIncDecField"></span>');
                var oOwner = oInputField.parent();

                oInputField.after('<span class="controls"><i class="icon-inc"></i><i class="icon-dec"></i></span>');

                var oInc = $('.icon-inc', oOwner);
                var oDec = $('.icon-dec', oOwner);

                oInc.bind('click', function () {
                    oInputField.val(parseInt(oInputField.val()) + 1);
                    oInputField.trigger("change");
                });

                oDec.bind('click', function () {
                    if (parseInt(oInputField.val()) > 0) {
                        oInputField.val(parseInt(oInputField.val()) - 1);
                        oInputField.trigger("change");
                    }
                });
            }
        });
    };

    $.fn.CHAMELEON_Custom_InlineOverlay = function (options) {
        $(this).each(function () {
            var height = $(this).attr('data-height');
            var width = $(this).attr('data-width');
            $('#' + this.id).modal('show');
        });
    };

})(jQuery);

$(document).ready(function () {
    CHAMELEON.Custom.RunJsOnContent($('body'));

    CHAMELEON.Custom.BootstrapCarouselExtension();

    if(document.cookie.match(/PHPSESSID=[^;]+/)) {
        $('a[data-href]').each(function(){
            $(this).attr('href', $(this).attr('data-href'));
        });
    }
});