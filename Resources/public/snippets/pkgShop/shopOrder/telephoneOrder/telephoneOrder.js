$(document).ready(function(){
    var telephoneModalId = '#telephoneModal';
    if(telephoneModalId == window.location.hash){
        $(telephoneModalId).modal();
    }
});