/*** TINYMCE ***/
//var returnURL = "";
//var browserWindow;
//var browserFieldName;
//
//function fileBrowserCallBack( field_name, url, type, win ){
//    if (type == "file" || type == "media") {
//        browserUrl = "/admin/tiny_pictures/browse";
//    } else {
//        browserUrl = "/admin/tiny_pictures/browse";
//    }
//    window.open(browserUrl, '', 'width=800,height=600,scrollbars=yes');
//    browserWindow = win;
//    browserFieldName = field_name;
//}
//
//function browserReturn(url) {
//    browserWindow.document.forms[0].elements[browserFieldName].value = url;
//}
//
// initialise plugins
$(document).ready(function(){

    $('ul.sf-menu').superfish();

    $(".search-link").click(function() {
        $(this).toggleClass("selected");
        if( $(this).hasClass('selected')) {
            $(".search-fieldset").slideDown('fast');
        } else {
            $(".search-fieldset").slideUp('fast');
        }
    });
    
});

App = {}