Shadowbox.init({
    overlayOpacity: 0.8
});

$(document).ready(function() {


    $("ul#mainFCMenu a").hover(function() {
        $(this).stop(false, true).animate({
            color: "#ffffff"
        }, 400);
    }, function() {
        $(this).stop(false, true).animate({
            color: "#AAAABB"
        }, 300);
    });


});
