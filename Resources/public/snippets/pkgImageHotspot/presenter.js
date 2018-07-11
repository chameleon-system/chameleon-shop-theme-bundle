if (typeof CHAMELEON === "undefined" || !CHAMELEON) {
    var CHAMELEON = {};
}
CHAMELEON.Custom = CHAMELEON.Custom || {};

CHAMELEON.Custom.HotspotSlider = CHAMELEON.Custom.HotspotSlider || {};

CHAMELEON.Custom.HotspotSlider.AjaxCallback = function(data) {
    var oSliderElement = $('#slide'+data.sItemId);
    oSliderElement.html(data.sItemPage);
    var oImage = $('.backgroundImage',oSliderElement);
};

CHAMELEON.Custom.HotspotSlider.SlideToNavElement = function(oElement, oContainer, options) {
    if(!oContainer.hasClass('waiting')) {
        var sItemId = oElement.attr('data-item-id');
        var oSliderElement = $('#slide'+sItemId);
        if(oSliderElement.length < 1) {
            oSliderElement = $('<div id="slide'+sItemId+'" class="sliderElement"></div>');
            oContainer.find('.sliderElements').append(oSliderElement);
            $.ajax({
                url:oElement.attr('rel'),
                processData:false,
                dataType:'json',
                success:CHAMELEON.Custom.HotspotSlider.AjaxCallback,
                type:'POST',
                async: false
            });
        }
        var sDirection = 'next';
        var oActiveNav = oElement.parents('ul').find('.active');
        if(oActiveNav.index() > oElement.parent('li').index()) sDirection = 'prev';
        CHAMELEON.Custom.HotspotSlider.SlideToElementId(sItemId, sDirection, options);
        oActiveNav.removeClass('active');
        oElement.parent('li').addClass('active');
    }
};

CHAMELEON.Custom.HotspotSlider.SlideToElementId = function(sElementId,sDirection, options) {
    var oTargetSlide = $('#slide'+sElementId);
    var oContainer = oTargetSlide.parents('.sliderContainer');
    if(!oContainer.hasClass('waiting')) {
        $(oContainer).css('overflow','hidden');
        var oActiveSlide = oTargetSlide.siblings('.activeSlide');
        if(oActiveSlide.length > 0) {
            oContainer.addClass('waiting');
            var oElements = oTargetSlide.parents('.sliderElements');
            oTargetSlide.css('width',oElements.outerWidth()).css('height',oElements.outerHeight());
            if(typeof(sDirection) == 'undefined') sDirection = 'next';
            
            var iNewLeft = oActiveSlide.position().left;
            if(sDirection == 'prev') iNewLeft = iNewLeft - oContainer.outerWidth();
            if(sDirection == 'next') iNewLeft = iNewLeft + oContainer.outerWidth();
            oTargetSlide.css('display','block').css('left',iNewLeft);
            var iNewElementsLeft = oElements.position().left;
            if(sDirection == 'prev') iNewElementsLeft = iNewElementsLeft + oContainer.outerWidth();
            if(sDirection == 'next') iNewElementsLeft = iNewElementsLeft - oContainer.outerWidth();

            CHAMELEON.Custom.HotspotSlider.ToPercent(oContainer);

            var sOriginalEasingMethod = jQuery.easing.def;
            jQuery.easing.def = options.sEaseOutFunctionName;
            oElements.animate({'left':iNewElementsLeft},{duration:options.iSlideDurationInMS, queue:true, complete:function(){
                jQuery.easing.def = sOriginalEasingMethod; // restore original animation effect
                oActiveSlide.removeClass('activeSlide').css('display','none');
                oTargetSlide.addClass('activeSlide');
                oContainer.removeClass('waiting');
                $(oContainer).css('overflow','visible');
                CHAMELEON.Custom.HotspotSlider.HideNextAndPrev(oContainer,options);
            }});
        }
    }
};

CHAMELEON.Custom.HotspotSlider.HideNextAndPrev = function(oContainer,options) {
    if(!options.circular) {
        if($('.nav li:last',oContainer).hasClass('active')) {
            $('.next',oContainer).hide();
        } else {
            $('.next',oContainer).show();
        }
        if($('.nav li:first',oContainer).hasClass('active')) {
            $('.prev',oContainer).hide();
        } else {
            $('.prev',oContainer).show();
        }
    }
};

CHAMELEON.Custom.HotspotSlider.SlideToNextElement = function(oContainer,options) {
    var oNext = $('.nav .active',oContainer).next();
    if(oNext.length > 0) {
        CHAMELEON.Custom.HotspotSlider.SlideToNavElement(oNext.find('.pagelink'),oContainer,options);
    } else {
        if(options.circular == true) {
            CHAMELEON.Custom.HotspotSlider.SlideToNavElement($('.nav .pagelink:first',oContainer),oContainer,options);
        }
    }
};

CHAMELEON.Custom.HotspotSlider.SlideToPreviousElement = function(oContainer,options) {
    var oPrev = $('.nav .active',oContainer).prev();
    if(oPrev.length > 0) {
        CHAMELEON.Custom.HotspotSlider.SlideToNavElement(oPrev.find('.pagelink'),oContainer,options);
    } else {
        if(options.circular == true) {
            CHAMELEON.Custom.HotspotSlider.SlideToNavElement($('.nav .pagelink:last',oContainer),oContainer,options);
        }
    }
};

// fix for ie: after some time ie slides faster then set time
// clear before set timer id vefore start new timer
var activeHotSpotSliderTimeOutId;

CHAMELEON.Custom.HotspotSlider.StartAutoSlide = function(oContainer, options, bIsFirstCall) {
    var timeOutId = setTimeout(function() {
        clearTimeout(activeHotSpotSliderTimeOutId);
        CHAMELEON.Custom.HotspotSlider.StartAutoSlide(oContainer,options,false)
    },options.autoslidetime);
    activeHotSpotSliderTimeOutId = timeOutId;
    oContainer.attr('data-timeout',timeOutId);
    if(!bIsFirstCall) {
        if(options.autoslidesidenext) {
            CHAMELEON.Custom.HotspotSlider.SlideToNextElement(oContainer, options);
        } else {
            CHAMELEON.Custom.HotspotSlider.SlideToPreviousElement(oContainer, options);
        }
    }
};

CHAMELEON.Custom.HotspotSlider.StopAutoSlide = function(oContainer) {
    clearTimeout(oContainer.attr('data-timeout'));
};

CHAMELEON.Custom.HotspotSlider.ToPercent = function(oContainer) {
    oImage = $('.activeSlide .backgroundImage',oContainer);

    var iPresenterWidth = oImage.attr('width');
    var iPresenterHeight = oImage.attr('height');

    var fPixelPercentConversionWidth = 100/iPresenterWidth;
    var fPixelPercentConversionHeight = 100/iPresenterHeight;

    $('.toPercent',oContainer).each(function() {
        var oPosition = $(this).position();
        var fNewLeft = oPosition.left*fPixelPercentConversionWidth;
        var fNewTop = oPosition.top*fPixelPercentConversionHeight;
        $(this).removeClass('toPercent');
        $(this).css('left',fNewLeft + '%').css('top',fNewTop + '%');
        if ($(this).hasClass('toPercentSize')) {
            var fNewWidth = $(this).innerWidth()*fPixelPercentConversionWidth;
            var fNewHeight = $(this).innerHeight()*fPixelPercentConversionHeight;
            $(this).css('width',fNewWidth + '%').css('height',fNewHeight + '%');
            $(this).removeClass('toPercentSize');
        }
    });
};


(function ($) {
    $.fn.CHAMELEON_Custom_Slider = function(options) {
        var defaults = {
            iSlideDurationInMS:1000,
            sEaseOutFunctionName:'easeOutExpo',
            autoslideon:false, // Enables auto-sliding
            autoslidetime:10000, // time interval for sliding
            autoslidesidenext:true, // slide the images to next or previous
            circular: true,
            parentContainerSelector: false, //parent selector which defines width of slider. false = parent();
            pauseAutoSlideOnMouseOver: true
        };
        options = $.extend(defaults, options);

        var oContainer = $(this);

        var oParent = null;
        if(options.parentContainerSelector == false) {
            oParent = $(this).parent();
        } else {
            oParent = $(this).parents(options.parentContainerSelector);
        }
        var iWidth = oParent.width();

        $('.sliderElements',$(this)).css('width',iWidth);
        $($(this)).css('width',iWidth);

        oImage = $('.activeSlide .backgroundImage',oContainer);


        var iHeight = oImage.attr("height");
        $('.sliderElements',oContainer).css('height',iHeight);

        $('.nav .pagelink',oContainer).on('click', function(event){
            event.preventDefault();
            CHAMELEON.Custom.HotspotSlider.SlideToNavElement($(this),oContainer, options);
            CHAMELEON.Custom.HotspotSlider.StopAutoSlide(oContainer);
            oContainer.off('mouseleave');
        });

        $('.next',oContainer).on('click', function(event){
            event.preventDefault();
            CHAMELEON.Custom.HotspotSlider.SlideToNextElement(oContainer,options);
            CHAMELEON.Custom.HotspotSlider.StopAutoSlide(oContainer);
            oContainer.off('mouseleave');
        });

        $('.prev',oContainer).on('click', function(event){
            event.preventDefault();
            CHAMELEON.Custom.HotspotSlider.SlideToPreviousElement(oContainer,options);
            CHAMELEON.Custom.HotspotSlider.StopAutoSlide(oContainer);
            oContainer.off('mouseleave');
        });

        CHAMELEON.Custom.HotspotSlider.ToPercent(oContainer);

        oImage.one('load', function() {
            var iHeight = oImage.attr("height");
            $('.sliderElements',oContainer).css('height',iHeight);
            if(options.autoslideon) {

                CHAMELEON.Custom.HotspotSlider.StopAutoSlide(oContainer);
                CHAMELEON.Custom.HotspotSlider.StartAutoSlide(oContainer,options,true);
                if(options.pauseAutoSlideOnMouseOver){
                    oContainer.on('mouseenter', function(){
                        CHAMELEON.Custom.HotspotSlider.StopAutoSlide(oContainer);
                    }).on('mouseleave', function(){
                        CHAMELEON.Custom.HotspotSlider.StartAutoSlide(oContainer,options,true);
                    });
                }
            }

        }).each(function() {
            if(this.complete) $(this).trigger('load');
        });

        // absolute position of presenter container
        var sliderContainerOffset = null;

        $('.sliderContainer').on("mouseover", ".markerMap, .markerLink", function(e) {
            if(sliderContainerOffset == null) {
                sliderContainerOffset = $(this).parent().parent().parent().parent('.sliderContainer').offset();
            }
            // get relative mouse cursor position
            var relX = e.pageX - sliderContainerOffset.left;
            var relY = e.pageY - sliderContainerOffset.top;
            var layoverID = this.id.replace('Map','Layover');
            layoverID = layoverID.replace('Link','Layover');

            $('#'+layoverID+' .objectDisplayBlock').css({display: 'block'});
            $('#'+layoverID).css({
                top: (relY + 10) + "px",
                left: (relX + 10) + "px",
                display: 'block'
            });
        });

        $('.sliderContainer').on("mousemove", ".markerMap, .markerLink", function(e) {
            // get relative mouse cursor postion
            var relX = e.pageX - sliderContainerOffset.left;
            var relY = e.pageY - sliderContainerOffset.top;
            var layoverID = this.id.replace('Map','Layover');
            layoverID = layoverID.replace('Link','Layover');

            $('#'+layoverID).css({
                top: (relY + 10) + "px",
                left: (relX + 10) + "px"
            });
        });

        $('.sliderContainer').on("mouseout", ".markerMap, .markerLink", function(e) {
            var layoverID = this.id.replace('Map','Layover');
            layoverID = layoverID.replace('Link','Layover');

            $('#'+layoverID).css({
                display: 'none'
            });
        });

        $('.layover img[data-url]').on('mouseenter mouseleave', function() {
            var sCurrentURL = $(this).attr("src");
            $(this).attr("src", $(this).attr('data-url'));
            $(this).attr('data-url',sCurrentURL);
        });
    };
})(jQuery);