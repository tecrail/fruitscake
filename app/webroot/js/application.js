$(document).ready(function() {


    $("ul#MainFCMenu a").hover(function() {
        $(this).stop(false, true).animate({
            color: "#ffffff"
        }, 400);
    }, function() {
        $(this).stop(false, true).animate({
            color: "#747474"
        }, 700);
    });


});
