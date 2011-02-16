(function($){

    $.fcHtmlEditor = {
        default_settings: {}
    };

    $.fn.fcHtmlEditor = function(config){

        config = $.extend({}, $.fcHtmlEditor.default_settings, config);

        
    
        return $(this).each(function(){
            $(this).fancybox({
                modal: true
            });
        });
    }

})(jQuery);

$(document).ready(function() {
    $(".fancyHtmlEditorLink").fcHtmlEditor();
});
