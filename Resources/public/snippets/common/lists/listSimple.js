$(document).ready(function () {
    $(".snippetListSimple .minimizer").on('click', function () {
        $(this).toggleClass("active");
        $(this).siblings(".listContainer").children('.listContainerInner').children('ul').slideToggle();
    });

});
