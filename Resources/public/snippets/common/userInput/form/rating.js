$(document).ready(function () {
    $(".form-group .snippetRatingStandard li").on('click', function(){
        sStarBaseCount = "star_";
        iCount = 0;
        $('.form-group .snippetRatingStandard li').removeClass("starfull");
        $('.form-group .snippetRatingStandard li').addClass("star");
        for(sStarCount = sStarBaseCount+iCount; !$(this).hasClass(sStarCount); sStarCount = sStarBaseCount+iCount,iCount++){
            $('.form-group .snippetRatingStandard li.'+sStarCount).addClass("starfull");
            $('.form-group .snippetRatingStandard li.'+sStarCount).removeClass("star");
        }
        $('.form-group .snippetRatingStandard li.'+sStarCount).addClass("starfull");
        $(this).parents(".snippetRatingStandard").siblings("input").attr("value",iCount-1);
    });
});
