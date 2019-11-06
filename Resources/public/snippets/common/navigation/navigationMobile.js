$(document).ready(function(){
    $('#mobileCategoryNav select').on('change', function() {
        window.location = this.value;
    });

    $(".searchMagnifier").on('click', function() {
        $('html, body').animate({
            scrollTop: $("#minisearch").offset().top -100
        }, 500);
        $("#quicksearchform input[name=q]").focus();
    });

    $("#buttonMobileNavigationMain").click(function() {
        $('html, body').animate({
            scrollTop: $("#mainnav").offset().top -150
        }, 500);
    });

});