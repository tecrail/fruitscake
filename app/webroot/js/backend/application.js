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

    $("ul.gallery-list > li.published a.image-link").css({
        opacity: 0.7
    });
    $("ul.gallery-list > li.published").hover(function(){
        $(this).find("a.image-link").fadeTo(300, 1);
    }, function() {
        $(this).find("a.image-link").fadeTo(300, 0.7);
    });
    
    $("ul.gallery-list > li.unpublished a.image-link").css({
        opacity: 0.4
    });
    $("ul.gallery-list > li.unpublished").hover(function(){
        $(this).find("a.image-link").fadeTo(300, 1);
    }, function() {
        $(this).find("a.image-link").fadeTo(300, 0.4);
    });

    $(".index-image-link a").css({
        opacity: 0.8
    });
    $("tr.index-image-tr").hover(function(){
//        alert('hover');
        $(this).find(".index-image-link > a").fadeTo(300, 1);
    }, function() {
//        alert('unhover');
        $(this).find(".index-image-link > a").fadeTo(300, 0.8);
    });

    $("select, input:checkbox, input:radio, input:file, input, textarea").uniform();
    
});

App = {}
