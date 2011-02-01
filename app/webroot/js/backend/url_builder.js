// url builder js

var UrlBuilder = null;

$(document).ready(function() {

    UrlBuilder = $.fn.UrlBuilder({});

});

(function($){

    $.UrlBuilder = {
        default_settings: {
            input_selector: "#url_builder_input_field",
            configurator_selector: "#urlBuilderContainer"
        }
    };

    $.fn.UrlBuilder = function(config){

        config = $.extend({}, $.UrlBuilder.default_settings, config);

        function main() {
            $(config.configurator_selector).css({display: 'none'});
            
            $(config.input_selector).focus(function() {

                $(config.configurator_selector).fadeIn(1000, function() {
                    $(this).css({
                        display: 'block'
                    });
                });

            });


            return public_methods;
        }


        //private

        //public
        var public_methods = {
            
        }

        return main();

    };

})(jQuery);
