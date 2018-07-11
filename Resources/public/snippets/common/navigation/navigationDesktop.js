$(document).ready(function(){
    $("html.no-touch #mainMenu [data-toggle='dropdown']").each(function () {
        if($(this).attr('href').length != 0) {
            $(this).attr("data-toggle", "dropdown-with-hover");
        }
    });
});