// url builder js

var UrlBuilder = null;

$(document).ready(function() {

    UrlBuilder = $.fn.UrlBuilder({});

});

(function($){

    $.UrlBuilder = {
        default_settings: {
            input_selector: "#url_builder_input_field",
            configurator_selector: "#urlBuilderContainer",
            close_button_selector: ".close_url_builder",
            spinner_selector: "#urlBuilderSpinner",
            model_ul_selector: "#avaliableModels",
            model_ancors_selector: "#avaliableModels a",
            get_models_url: "/admin/url_builder/get_models",
            get_actions_base_url: "/admin/url_builder/get_actions/"
        }
    };

    $.fn.UrlBuilder = function(config){

        config = $.extend({}, $.UrlBuilder.default_settings, config);

        var spinner = {

            showCentered: function() {
                $(config.spinner_selector).css({
                    left: 250,
                    top: 25,
                    display: 'none'
                }).fadeIn(300, function(){
                    $(this).css({
                        display: 'block'
                    });
                });
            },

            showRighted: function() {
                $(config.spinner_selector).css({
                    left: 400,
                    top: 25,
                    display: 'none'
                }).fadeIn(300, function(){
                    $(this).css({
                        display: 'block'
                    });
                });
            },

            hide: function() {
                $(config.spinner_selector).fadeOut(600, function(){
                    $(this).css({
                        display: 'none'
                    });
                });
            }

        }

        function main() {
            var jsonModelList = null
            
            $(config.configurator_selector).css({
                display: 'none'
            });
            $(config.spinner_selector).css({
                display: 'none'
            });

            spinner.showCentered();
            $.ajax({
                url: config.get_models_url,
                dataType: 'json',
                type: "GET",
                success: function(obj) {
                    jsonModelList = obj
                    for (key in obj) {
                        $(config.model_ul_selector).append(
                            "<li><a href='#" + key + "'>" + obj[key] + "</a></li>"
                        );
                    }
                    $("#urlBuilderModelsBox").parent('div').fadeIn(600, function() {
                        $(this).css({display: 'block'});
                    })
                    spinner.hide();
                }
            });


            $(config.close_button_selector).click(function() {
                public_methods.hide();
                return false;
            });
            
            $(config.input_selector).focus(function() {
                public_methods.show();
            });


            $(config.model_ancors_selector).click(function () {
                spinner.showCentered();
                
                var modelName = $(this).attr('href').replace('#', '');

                //                $.ajax({
                //                    url: config.get_actions_base_url + modelName
                //                });

                return false;
            });

            


            return public_methods;
        }
        

        //public
        var public_methods = {

            show: function() {
                $(config.configurator_selector).slideDown(300, function() {
                    $(this).css({
                        display: 'block'
                    });
                });
            },

            hide: function() {
                $(config.configurator_selector).slideUp(500, function() {
                    $(this).css({
                        display: 'none'
                    });
                });
            }
            
        }

        return main();

    };

})(jQuery);
