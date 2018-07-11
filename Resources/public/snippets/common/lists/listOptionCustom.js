$(document).ready(function(){
    $(".listHeaderItem select").on('change', function(){ $(this.parents(".listOptionForm").submit()) })
});
