$(document).ready(function(){
    $('#mobileCategoryNav select').on('change', function() {
        window.location = this.value;
    });

    $(".searchMagnifier").on('click', function() {
        $('html, body').animate({
            scrollTop: $("#quicksearchform").offset().top -100
        }, 1000);
        $("#quicksearchform input[name=q]").focus();
    });
});