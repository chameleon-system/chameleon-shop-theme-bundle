if (typeof CHAMELEON === "undefined" || !CHAMELEON) {
    var CHAMELEON = {};
}

CHAMELEON.Custom = CHAMELEON.Custom || {};

CHAMELEON.Custom.galleryVertical = {};

(function ($) {

    $.fn.CHAMELEON_Custom_itemsWithZoom = function(options) {
        oGallery = $(this);
        activeImage = $('.activeImage img',oGallery);
        activeImageLink = activeImage.parent('.thumbnail');

        $('.snippetGalleryItems li .thumbnail', oGallery).on('click', function(){
            oImage = $('img', $(this));
            var largeImage = oImage.data('cmslargeimage');
            var largeImageTitle = oImage.data('cmslargeimagetitle');
            var largeImageLink = oImage.data('cmslargeimagelink');
            activeImage.attr('src',largeImage).attr('alt',largeImageTitle);
            activeImageLink.attr('href',largeImageLink).attr('data-zoom-image',largeImage);
        });
    };
})(jQuery);


$(document).ready(function () {
    $('.cmsgallery').CHAMELEON_Custom_itemsWithZoom();

});