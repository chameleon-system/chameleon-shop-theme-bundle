/*
    USAGE:
    $('selector').CHAMELEON_Custom_ImageZoomMagnifier({option1: value, option2: value});
    $('selector') must have an attribute named like the options sZoomImageAttributeName containing an url to the zoom image
    use .zoomPane to style the rectangle on your original image
 */

;(function ( $, window, document, undefined ) {

    var SCREEN_SM_MIN = 768;

    var pluginName = "CHAMELEON_Custom_ImageZoomMagnifier",
        defaults = {
            iZoomFrameWidth: 400,
            iZoomFrameHeight: 300,
            sZoomFramePosition: 'right', //right|left
            iZoomFrameMargin: 10,
            sEasingMethod: 'easeOutExpo',
            bAnimateOpenClose: false,
            sLoadingIcon: '/bundles/chameleonsystemchameleonshoptheme/snippets/common/media/gallery/loadingAnimation.gif',
            sZoomImageAttributeName: 'data-zoom-image',
            iZoomLevel: 3,
            bResponsive: false, //set to true, if you want to display the image full-width relative to sResponsiveContainerSelector
            sResponsiveContainerSelector: '#pagebody',
            bDisableOnMobileDevices: true, //needs http://detectmobilebrowser.com jQuery extension
            iZoomImageIndex: 100
        };

    function Plugin( element, options ) {
        this.element = element;

        this.options = $.extend( {}, defaults, options );

        this._defaults = defaults;
        this._name = pluginName;

        if(!this.options.bDisableOnMobileDevices || !$(window).width() < SCREEN_SM_MIN) {
            this.init();
        }
    }

    Plugin.prototype = {

        init: function() {
            var elem = $(this.element);
            elem.css('position','relative');
            
            var zoomFrame = elem.find('.zoomFrame');
            if(zoomFrame.length < 1) {
                zoomFrame = $('<div class="zoomFrame"></div>');
                var iWidthImageContainer = elem.outerWidth();
                var iPositionLeft = (iWidthImageContainer) + this.options.iZoomFrameMargin;
                if(this.options.sZoomFramePosition == 'left') {
                    iPositionLeft = (this.options.iZoomFrameWidth * -1) - this.options.iZoomFrameMargin;
                }
                zoomFrame.css({overflow: 'hidden', width: this.options.iZoomFrameWidth, height: this.options.iZoomFrameHeight, left: iPositionLeft, top: 0, position: 'absolute', display: 'none', zIndex: this.options.iZoomImageIndex});
                zoomFrame.appendTo(elem);
            }
            
            var zoomPane = elem.find('.zoomPane');
            if(zoomPane.length < 1) {
                zoomPane = $('<div class="zoomPane"></div>');
                zoomPane.css({position: 'absolute', top: 0, left: 0});
                zoomPane.appendTo(elem);
            }
            
            
            var loadingImage = $('<img src="'+this.options.sLoadingIcon+'" class="loading" alt="" border="0" />');
            zoomFrame.append(loadingImage);
            
            this.assignEvents(elem, zoomFrame, zoomPane, loadingImage, this.options);

        },
        
        assignEvents: function(elem, zoomFrame, zoomPane, loadingImage, options) {
            $(elem).on('mouseenter',{elem: elem, options: options, zoomFrame: zoomFrame, zoomPane: zoomPane, loadingImage: loadingImage},this.start);
            $(elem).on('mouseleave',{options: options, zoomFrame: zoomFrame, zoomPane: zoomPane},this.stop);
            $(elem).on('mousemove',{elem: elem, options: options, zoomFrame: zoomFrame, zoomPane: zoomPane},this.move);
            zoomFrame.on('mouseenter',{options: options, zoomFrame: zoomFrame, zoomPane: zoomPane},this.stop);
        },
        
        start: function(e) {
            var options = e.data.options;
            var zoomFrame = e.data.zoomFrame;
            var elem = e.data.elem;
            var zoomPane = e.data.zoomPane;
            var loadingImage = e.data.loadingImage;

            e.stopPropagation();
            
            zoomFrame.stop(true, true);
            
            if(options.bResponsive) {
                
                var iNewWidth = $(options.sResponsiveContainerSelector).outerWidth() - (elem.offset().left - $(options.sResponsiveContainerSelector).offset().left + elem.outerWidth());
                var iConstraint = iNewWidth / options.iZoomFrameWidth;
                var iNewHeight = options.iZoomFrameHeight * iConstraint;
                options.iZoomFrameWidth = iNewWidth;
                options.iZoomFrameHeight = iNewHeight;
                
                var iWidthImageContainer = elem.outerWidth();
                var iPositionLeft = (iWidthImageContainer) + options.iZoomFrameMargin;
                if(options.sZoomFramePosition == 'left') {
                    iPositionLeft = (options.iZoomFrameWidth * -1) - options.iZoomFrameMargin;
                }
                zoomFrame.css({width: options.iZoomFrameWidth, height: options.iZoomFrameHeight, left: iPositionLeft, top: 0});
            }

            if(options.bAnimateOpenClose) {
                zoomFrame.fadeIn('slow',function() {
                    loadingImage.show(function(){
                        loadingImage.centerObject(zoomFrame);
                    });
                });
            } else {
                zoomFrame.show(function() {
                    loadingImage.show(function(){
                        loadingImage.centerObject(zoomFrame);
                    });
                });
            }
            
            var iSourceWidth = elem.outerWidth();
            var iSourceHeight = elem.outerHeight();
            
            var iZoomHeight = elem.outerHeight() * options.iZoomLevel;
            var iZoomWidth = elem.outerWidth() * options.iZoomLevel;
            
            var iWidthMultiplier = iZoomWidth/iSourceWidth;
            var iHeightMultiplier = iZoomHeight/iSourceHeight;

            zoomPane.css('width',options.iZoomFrameWidth/iWidthMultiplier+"px");
            zoomPane.css('height',options.iZoomFrameHeight/iHeightMultiplier+"px");
            
            zoomPane.show();

            zoomFrame.find('.zoomImage').remove();

            var image = $('<img class="zoomImage" />').css({width:iZoomWidth,height:iZoomHeight, 'max-width': 'none', position: 'absolute'}).attr('src', elem.attr(options.sZoomImageAttributeName));
            image.appendTo(zoomFrame);
            
            image.one('load', function() {
                loadingImage.hide();
                elem.trigger('mousemove');
            })
            .each(function() {
              if(this.complete) $(this).trigger('load');
            });
        },
        
        stop: function(e) {

            e.stopPropagation();
            var options = e.data.options;
            var zoomFrame = e.data.zoomFrame;
            var zoomPane = e.data.zoomPane;
            
            zoomPane.hide();
            
            if(options.bAnimateOpenClose) {
                zoomFrame.fadeOut('slow');
            } else {
                zoomFrame.hide();
            }
        },
        
        move: function(e) {
            var options = e.data.options;
            var zoomFrame = e.data.zoomFrame;
            var elem = e.data.elem;
            var zoomPane = e.data.zoomPane;

            var iPaneWidth = zoomPane.outerWidth();
            var iPaneHeight = zoomPane.outerHeight();
            
            var iSourceWidth = elem.outerWidth();
            var iSourceHeight = elem.outerHeight();
            
            var iZoomHeight = elem.outerHeight() * options.iZoomLevel;
            var iZoomWidth = elem.outerWidth() * options.iZoomLevel;
            
            var iWidthMultiplier = iZoomWidth/iSourceWidth;
            var iHeightMultiplier = iZoomHeight/iSourceHeight;
            

            var iSourceOffsetLeft = e.clientX - elem.offset().left  - (iPaneWidth/2);
            var iSourceOffsetTop = e.clientY - elem.offset().top - (iPaneHeight/2) + $(window).scrollTop();
            
            if((iSourceOffsetLeft)<0) iSourceOffsetLeft = 0;
            if((iSourceOffsetTop)<0) iSourceOffsetTop = 0;
            
            var iMaxLeftOffset = elem.outerWidth()-iPaneWidth;
            var iMaxTopOffset = elem.outerHeight()-iPaneHeight;
            
            if((iSourceOffsetLeft)>iMaxLeftOffset) iSourceOffsetLeft = iMaxLeftOffset;
            if((iSourceOffsetTop)>iMaxTopOffset) iSourceOffsetTop = iMaxTopOffset;
            
            zoomPane.css('left',iSourceOffsetLeft);
            
            zoomPane.css('top',iSourceOffsetTop);
            
            var zoomImage = zoomFrame.find('.zoomImage');
            

                var iZoomLeftPosition = iSourceOffsetLeft*iWidthMultiplier*-1;
                zoomImage.css('left',iZoomLeftPosition);
                
                var iZoomTopPosition = iSourceOffsetTop*iHeightMultiplier*-1;
                zoomImage.css('top',iZoomTopPosition);

        }
    };

    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin( this, options ));
            }
        });
    };

})( jQuery, window, document );

$.fn.centerObject = function ( target ) {
    var oElem = $(this);
    oElem.css("position","absolute");
    oElem.css("top", ((target.outerHeight() - oElem.outerHeight()) / 2));
    oElem.css("left", ((target.outerWidth() - oElem.outerWidth()) / 2));
};