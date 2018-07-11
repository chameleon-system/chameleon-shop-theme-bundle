;(function ( $, window, document, undefined ) {

    var SCREEN_SM_MIN = 768;

    var pluginName = "CHAMELEON_Custom_ImageZoomDrag",
        defaults = {
            sLoadingIcon: '/bundles/chameleonsystemchameleonshoptheme/snippets/common/media/gallery/loadingAnimation.gif',
            bAnimateOpenClose: false,
            sBigImageAttributeName: 'data-zoom-image',
            bDisableOnMobileDevices: true, //needs http://detectmobilebrowser.com jQuery extension
            bDisableOnDesktop: false //needs http://detectmobilebrowser.com jQuery extension
        };

    function Plugin( element, options ) {
        this.element = element;

        this.options = $.extend( {}, defaults, options );

        this._defaults = defaults;
        this._name = pluginName;

        if((!this.options.bDisableOnMobileDevices && $(window).width() < SCREEN_SM_MIN) || (!this.options.bDisableOnDesktop && !$(window).width() < SCREEN_SM_MIN)) {
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
                zoomFrame.css({position: 'absolute', top: 0, left: 0, display: 'none', zIndex: 2, width: elem.outerWidth(), height: elem.outerHeight(), overflow: 'hidden'});
                zoomFrame.appendTo(elem);
            }

            var loadingImage = $('<img src="'+this.options.sLoadingIcon+'" class="loading" alt="" border="0" />').css({zIndex:1});
            zoomFrame.append(loadingImage);

            this.assignEvents(elem, zoomFrame, loadingImage, this.options);

        },

        assignEvents: function(elem, zoomFrame, loadingImage, options) {
            $(elem).on('click',{elem: elem, options: options, zoomFrame: zoomFrame, loadingImage: loadingImage}, this.start);
            $('html').on('click',{elem: elem, options: options, zoomFrame: zoomFrame, loadingImage: loadingImage, cancelEvents: false},this.stop);
            zoomFrame.on('click',{elem: elem, options: options, zoomFrame: zoomFrame, loadingImage: loadingImage},this.stop);
            zoomFrame.on('mousemove',{elem: elem, options: options, zoomFrame: zoomFrame, loadingImage: loadingImage},this.move);
            zoomFrame.on('movestart',function(e){e.stopPropagation();});
            zoomFrame.on('move',{elem: elem, options: options, zoomFrame: zoomFrame, loadingImage: loadingImage, start:this.start},this.movemobile);
        },

        start: function(e) {

            e.stopPropagation();
            e.preventDefault();
            var options = e.data.options;
            var zoomFrame = e.data.zoomFrame;
            var elem = e.data.elem;
            var loadingImage = e.data.loadingImage;

            zoomFrame.find('.zoomImage').remove();

            var image = $('<img class="zoomImage" />').css({maxWidth:'none',maxHeight:'none', zIndex:3, position:'relative'}).attr('src', elem.attr(options.sBigImageAttributeName));

            image.appendTo(zoomFrame);


            if(options.bAnimateOpenClose) {
                zoomFrame.fadeIn('slow',function() {
                    if(!image.complete) {
                        loadingImage.show(function(){
                            image.one('load', function() {
                                image.attr('data-maxwidth',image.width());
                                image.attr('data-maxheight',image.height());
                                image.css({left: (image.width()-zoomFrame.width())/2*-1, top: (image.height()-zoomFrame.height())/2*-1});
                                loadingImage.hide();
                            })
                                .each(function() {
                                    if(this.complete) $(this).trigger('load');
                                });
                            loadingImage.centerObject(zoomFrame);

                        });
                    }
                });
            } else {
                zoomFrame.show(function() {
                    if(!image.complete) {
                        loadingImage.show(function(){
                            image.one('load', function() {
                                image.attr('data-maxwidth',image.width());
                                image.attr('data-maxheight',image.height());
                                image.css({left: (image.width()-zoomFrame.width())/2*-1, top: (image.height()-zoomFrame.height())/2*-1});
                                loadingImage.hide();
                            })
                                .each(function() {
                                    if(this.complete) $(this).trigger('load');
                                });

                            loadingImage.centerObject(zoomFrame);
                        });
                    }
                });

            }

        },

        stop: function(e) {
            var options = e.data.options;
            var zoomFrame = e.data.zoomFrame;
            var elem = e.data.elem;
            var loadingImage = e.data.loadingImage;

            if(options.bAnimateOpenClose) {
                zoomFrame.fadeOut('slow');
            } else {
                zoomFrame.hide();
            }
            if(e.data.cancelEvents != false) {
                e.stopPropagation();
                e.preventDefault();
            }
        },

        move: function(e) {
            var options = e.data.options;
            var zoomFrame = e.data.zoomFrame;
            var elem = e.data.elem;
            var loadingImage = e.data.loadingImage;

            var zoomImage = zoomFrame.find('.zoomImage');
            var iZoomWidth = zoomImage.width();
            var iZoomHeight = zoomImage.height();

            var iMaxLeft = (iZoomWidth-zoomFrame.width()) * -1;
            var iMaxTop = (iZoomHeight-zoomFrame.height()) * -1;

            var iSourceOffsetLeft = e.clientX - zoomFrame.offset().left;
            var iSourceOffsetTop = e.clientY - zoomFrame.offset().top + $(window).scrollTop();


            var iMultiplierWidth = iZoomWidth/zoomFrame.width();
            var iMultiplierHeight = iZoomHeight/zoomFrame.height();


            var iNewLeft = iSourceOffsetLeft*iMultiplierWidth;
            iNewLeft = (iNewLeft - iSourceOffsetTop) *-1;
            if(iNewLeft < iMaxLeft) {
                iNewLeft = iMaxLeft;
            }
            if(iNewLeft > 0) {
                iNewLeft = 0;
            }

            var iNewTop = iSourceOffsetTop*iMultiplierHeight;
            iNewTop = (iNewTop - iSourceOffsetTop) *-1;
            if(iNewTop < iMaxTop) {
                iNewTop = iMaxTop;
            }
            if(iNewTop > 0) {
                iNewTop = 0;
            }

            zoomImage.css('left',iNewLeft);
            zoomImage.css('top',iNewTop);
        },

        zoommobile: function(e,a) {
            var options = e.data.options;
            var zoomFrame = e.data.zoomFrame;
            var elem = e.data.elem;
            var loadingImage = e.data.loadingImage;

            var zoomImage = zoomFrame.find('.zoomImage');
            if(a.scale > 1) {
                iMaxWidth = zoomImage.attr('data-maxwidth');
                iMaxHeight = zoomImage.attr('data-maxheight');

                iNewWidth = zoomImage.width()*1.02;
                iNewHeight = zoomImage.height()*1.02;
                if(iNewWidth < iMaxWidth && iNewHeight < iMaxHeight) {
                    zoomImage.css({width: iNewWidth, height: iNewHeight});
                }
            }
            if(a.scale < 1) {
                iMinWidth = zoomFrame.width();
                iMinHeight = zoomFrame.height();
                iNewWidth = zoomImage.width()*0.98;
                iNewHeight = zoomImage.height()*0.98;
                if(iNewWidth>iMinWidth && iNewHeight>iMinHeight) {
                    zoomImage.css({width: iNewWidth, height: iNewHeight});
                }
            }

            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
        },

        movemobile: function(e) {
            var options = e.data.options;
            var zoomFrame = e.data.zoomFrame;
            var elem = e.data.elem;
            var loadingImage = e.data.loadingImage;

            var zoomImage = zoomFrame.find('.zoomImage');

            var iMultiplierWidth = (zoomImage.width()/zoomFrame.width());
            var iMultiplierHeight = (zoomImage.height()/zoomFrame.height());

            iMultiplierWidth = 0.1 + (iMultiplierWidth/100);
            iMultiplierHeight = 0.1 + (iMultiplierHeight/100);

            var iMaxLeft = (zoomImage.width()-zoomFrame.width())*(-1);
            var iMaxTop = (zoomImage.height()-zoomFrame.height())*(-1);

            var iNewLeft = e.distX * iMultiplierWidth;
            iNewLeft = zoomImage.position().left + iNewLeft;
            if(iNewLeft < iMaxLeft) {
                iNewLeft = iMaxLeft;
            }
            if(iNewLeft>0) {
                iNewLeft = 0;
            }

            var iNewTop = e.distY * iMultiplierHeight;
            iNewTop = zoomImage.position().top + iNewTop;
            if(iNewTop < iMaxTop) {
                iNewTop = iMaxTop;
            }
            if(iNewTop>0) {
                iNewTop = 0;
            }

            zoomImage.css({left: iNewLeft});
            zoomImage.css({top: iNewTop});

            e.preventDefault();
            e.stopPropagation();
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

function objToString (obj) {
    var str = '';
    for (var p in obj) {
        if (obj.hasOwnProperty(p)) {
            str += p + '::' + obj[p] + '\n';
        }
    }
    return str;
}