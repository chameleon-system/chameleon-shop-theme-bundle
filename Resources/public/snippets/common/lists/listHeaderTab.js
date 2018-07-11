function CMSSnippetListHeaderTabMinimizeList(oClickedObject, sListContainerId){
    $(oClickedObject).toggleClass("active");
    $("#"+sListContainerId).slideToggle();

}