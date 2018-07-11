;(function ( $, window, document, undefined ) {

    var SCREEN_SM_MIN = 768;

    var pluginName = "CHAMELEON_Custom_ImageMobileSlider",
        defaults = {
            sThumbnailContainerSelector: '.thumnailItemsWrapper', //select the thumbnail container containing all thumbnails (will be hidden/replaced with navigation)
            sThumbnailSelector: 'img', //select the actual thumbnail images within the thumbnail container
            sAttributeNameLargeImage: 'data-cmslargeimage', //name of the attribute of the actual thumbnail images containing an url to the bigger image (also used to hash)
            sBigImageContainerSelector: '.zoomMagnifier', //select the big image container
            sBigImageSelector: 'img', //select the big image
            sSliderContainerClassName: 'sliderContainer', //class of the slider container which is created by the plugin
            sSliderElementContainerClassName: 'sliderElementContainer', //class of the elemnt container, which is wrapped around each slider element by the plugin
            sNavigationClassName: 'thumbnailBulletNav',
            sEasingMethod: 'easeOutExpo',
            sLoadingIcon: '/bundles/chameleonsystemchameleonshoptheme/snippets/common/media/gallery/loadingAnimation.gif',
            bOnlyEnableOnMobileDevices: true, //needs http://detectmobilebrowser.com jQuery extension
            sOnAfterSliderCallback: false // a javascript callback after sliding animation is done (gets slider-element jQuery-object as param)
        };

    function Plugin( element, options ) {
        this.element = element;

        this.options = $.extend( {}, defaults, options );

        this._defaults = defaults;
        this._name = pluginName;

        if(!this.options.bOnlyEnableOnMobileDevices || $(window).width() < SCREEN_SM_MIN) {
            this.init();
        }
    }

    Plugin.prototype = {

        init: function() {
            var container = $(this.element);
            var elem = $(this.options.sBigImageContainerSelector,$(this.element));


            //we need to rebuild the elements structure

            var sliderContainer = $('<div class="'+this.options.sSliderContainerClassName+'"></div>');
            sliderContainer.css({position: 'relative', width: elem.width(), height: elem.height(), overflowX: 'hidden'});
            var elementContainer = $('<div class="'+this.options.sSliderElementContainerClassName+'"></div>');
            elementContainer.html(elem.html()).addClass('active').css({zIndex:1, position:'absolute',left: 0, top:0, width: elem.width()});
            var oImage = elementContainer.find(this.options.sBigImageSelector);

            var options = this.options;
            var oParent = this;
            oImage.one('load', function() {
                var sStringToHash = oImage.attr('src');
                elementContainer.attr(options.sAttributeNameLargeImage,sStringToHash);
                var sHash = oParent.generateHash(sStringToHash);
                oImage.attr('data-hash',sHash);

                sliderContainer.append(elementContainer);
                sliderContainer.css('height', elem.height());

                elem.html('');
                elem.append(sliderContainer);

                oParent.hashThumbnails(elem, options);
                oParent.assignEvents(elem, container, options);

                if (options.sOnAfterSliderCallback && typeof(options.sOnAfterSliderCallback) === "function") {
                    options.sOnAfterSliderCallback(elementContainer);
                }


            })
                .each(function() {
                    if(this.complete) $(this).trigger('load');
                });
            oParent.buildNavigation(elem, container, options);
            $(options.sThumbnailContainerSelector).hide();

        },

        assignEvents: function(elem, container, options) {
            var oPlugin = this;
            var elemSave = elem;
            var containerSave = container;

            elem.swipe( {
                swipeLeft:function(event, direction, distance, duration, fingerCount) {
                    oPlugin.slide({elem: elemSave, container: containerSave, options: oPlugin.options, slideToHash: oPlugin.slideToHash, direction: direction});
                },
                swipeRight:function(event, direction, distance, duration, fingerCount) {
                    oPlugin.slide({elem: elemSave, container: containerSave, options: oPlugin.options, slideToHash: oPlugin.slideToHash, direction: direction});
                },
                //Default is 75px, set to 0 so any distance right/left triggers swipe
                threshold:0
            });
        },

        hashThumbnails: function(elem, options) {
            var oPlugin = this;
            $(options.sThumbnailContainerSelector).find(options.sThumbnailSelector).each(function(){
                var sStringToHash = $(this).attr(options.sAttributeNameLargeImage);
                var sHash = oPlugin.generateHash(sStringToHash);
                $(this).attr('data-hash',sHash);
            });
        },

        buildNavigation: function(elem, container, options) {
            var oPlugin = this;
            //var sBigImageHash = elem.find(options.sBigImageSelector).attr('data-hash');
            var sBigImageHash = $(options.sThumbnailContainerSelector).find(options.sThumbnailSelector).first().attr('data-hash');

            var sNavigation = '<ul class="'+options.sNavigationClassName+'">';
            $(options.sThumbnailContainerSelector).find(options.sThumbnailSelector).each(function(){
                var sActiveClass = '';
                if($(this).attr('data-hash') == sBigImageHash) {
                    sActiveClass = ' class="active"';
                }
                sNavigation += '<li data-hash="'+$(this).attr('data-hash')+'"'+sActiveClass+'></li>';
            });
            sNavigation += '</ul>';
            var oNavigation = $(sNavigation);
            $('li',oNavigation).on('click', function(){
                oPlugin.slideToHash($(this).attr('data-hash'), elem, container, options);
            });
            $(options.sThumbnailContainerSelector).before(oNavigation);

        },

        generateHash: function(string){
            var hash = 0, i, stringchar;
            if (string.length == 0) return hash;
            for (i = 0; i < string.length; i++) {
                stringchar = string.charCodeAt(i);
                hash = ((hash<<5)-hash)+stringchar;
                hash = hash & hash;
            }
            return hash;
        },

        slide: function(e) {
            var container = e.container;
            var elem = e.elem;
            var direction = e.direction;
            var options = e.options;
            var oActiveNavElem = $('.'+options.sNavigationClassName+' .active', container);
            if(direction == 'left') {
                var oTarget = oActiveNavElem.next();
                if(oTarget.length == 0) {
                    oTarget = $('.'+options.sNavigationClassName+' li',container).first();
                }
            } else {
                var oTarget = oActiveNavElem.prev();
                if(oTarget.length == 0) {
                    oTarget = $('.'+options.sNavigationClassName+' li',container).last();
                }
            }
            e.slideToHash(oTarget.attr('data-hash'),elem,container,options);
        },

        slideToHash: function(hash, elem, container, options) {
            var oActiveNavElem = $('.'+options.sNavigationClassName+' .active', container);
            var oTargetNav = $('.'+options.sNavigationClassName+' li[data-hash="'+hash+'"]');

            if(oActiveNavElem.attr('data-hash') != oTargetNav.attr('data-hash')) {

                var sDirection = 'next';
                if(oActiveNavElem.index() > oTargetNav.index()) sDirection = 'prev';

                var oActiveSlide = $('.'+options.sSliderElementContainerClassName+'.active', elem);
                var zIndex = oActiveSlide.css('z-index');
                oActiveSlide.css({zIndex: zIndex-1});

                $('.'+options.sSliderElementContainerClassName, elem).removeClass('active');
                var oSliderElement = elem.find(options.sBigImageSelector+'[data-hash="'+hash+'"]').parent('.'+options.sSliderElementContainerClassName);
                if(oSliderElement.length < 1) {
                    var sImageURL = $(options.sThumbnailContainerSelector+' '+options.sThumbnailSelector+'[data-hash="'+hash+'"]').attr(options.sAttributeNameLargeImage);
                    oSliderElement = $('<div class="'+this.options.sSliderElementContainerClassName+'" '+options.sAttributeNameLargeImage+'="'+sImageURL+'"></div>');

                    var loadingImage = $('<img src="'+options.sLoadingIcon+'" alt="" border="0" class="loading" />');
                    loadingImage.appendTo(oSliderElement);

                    var oImage = $('<img src="'+sImageURL+'" data-hash="'+hash+'" />');
                    oImage.one('load', function() {
                        loadingImage.remove();
                    })
                        .each(function() {
                            if(this.complete) $(this).trigger('load');
                        });
                    oImage.appendTo(oSliderElement);
                    elem.find('.'+options.sSliderContainerClassName).prepend(oSliderElement);
                }
                var iNewLeft = elem.width()*-1;
                if(sDirection == 'next') {
                    iNewLeft = iNewLeft * -1;
                }
                oSliderElement.css({position: 'absolute', zIndex: zIndex, width: elem.width(), left: iNewLeft, top: 0});
                oSliderElement.addClass('active').show();
                var sOriginalEasingMethod = jQuery.easing.def;
                jQuery.easing.def = options.sEasingMethod;
                oSliderElement.animate({left: 0}, function(){
                    jQuery.easing.def = sOriginalEasingMethod; // restore original animation effect
                    $('.'+options.sNavigationClassName+' li').removeClass('active');
                    oTargetNav.addClass('active');
                    $('.'+options.sSliderElementContainerClassName, elem).not('.active').hide();
                    if (options.sOnAfterSliderCallback && typeof(options.sOnAfterSliderCallback) === "function") {
                        options.sOnAfterSliderCallback(oSliderElement);
                    }
                });
            }
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