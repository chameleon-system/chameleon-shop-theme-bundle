$(document).ready(function () {
    $(".snippetShopFilterItem .filterItemHeader").on('click', function(){
        $(this).siblings(".filterItemContentBox").toggleClass("filterOpen");
        $(this).toggleClass("filterOpen");
    });

    // copy this JS file to your custom theme and enable this snippet to close inactive filters by default
    /*$(".snippetShopFilterItem .filterItemHeader, .snippetShopFilterItem .filterItemContentBox").each(function() {
        if(!$(this).hasClass('filterActive')){
            $(this).removeClass('filterOpen');
        }
    });*/
});