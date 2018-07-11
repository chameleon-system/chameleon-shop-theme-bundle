$(document).ready(function () {
    $(".snippetListStandardArticleReview .writeReviewButton span").on('click', function () {
        $(this).parents(".snippetListStandardArticleReview").children(".hideOnJS").slideToggle();
        return false;
    });

    $(".reviewListToggleButton").on('click', function () {
        $(this).siblings(".hideOnJS").slideToggle();
        return false;
    });
});