$(document).ready(function () {
    $(".snippetShopFilter .filterHeader").on('click', function () {
        $(this).siblings(".filterContent").toggleClass("filterOpen");
        $(this).parents('.filterBox').toggleClass('open');
        $(this).toggleClass("filterOpen");
    });
});