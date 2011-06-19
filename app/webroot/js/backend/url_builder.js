// url builder js

var UrlBuilder = null;
var Spinner = null;

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

        Spinner = {

            showCentered: function(callback) {
                $(config.spinner_selector).css({
                    left: '40%',
                    top: 25,
                    display: 'none'
                }).stop(false, true)
                .fadeIn(300, function(){
                    $(this).css({
                        display: 'block'
                    });
                    if(callback) {
                        callback();
                    }
                });
            },

            showRighted: function(callback) {
                $(config.spinner_selector).css({
                    left: '75%',
                    top: 25,
                    display: 'none'
                }).stop(false, true)
                .fadeIn(400, function(){
                    
                    $(this).css({
                        display: 'block'
                    });

                    if(callback) {
                        callback();
                    }

                });
            },

            hide: function(callback) {

                $(config.spinner_selector)
                .stop(false, true)
                .fadeOut(400, function(){

                    $(this).css({
                        display: 'none'
                    });
                    
                    if(callback) {
                        callback();
                    }
                    
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

            Spinner.showCentered();

            //initial load
            $.ajax({
                url: config.get_models_url,
                dataType: 'json',
                type: "GET",
                success: function(obj, textStatus, jqXHR) {
                    jsonModelList = obj
                    for (var key in obj) {
                        $(config.model_ul_selector).append(
                            "<li><a href='#" + key + "'>" + obj[key].label + "</a></li>"
                            );
                    }
                    $("#urlBuilderModelsBox").parent('div').fadeIn(600, function() {
                        $(this).css({
                            display: 'block'
                        });
                    });
                },

                complete: function() {
                    Spinner.hide();
                }
            });


            $(config.close_button_selector).click(function() {
                public_methods.hide();
                return false;
            });
            
            $(config.input_selector).focus(function() {
                public_methods.show();
            });


            $(config.model_ancors_selector).live('click', function() {
                
                $("#thirdUrlBuilderBox").fadeOut(400, function() {
                    $(this).css({
                        display: 'none'
                    });
                });
                
                $("#urlBuilderModelActionsBox ul.urlBuilderList").fadeOut(400, function() {
                    $(this).css({
                        display: 'none'
                    });
                });
                
                var modelName = $(this).attr('href').replace('#', '');
                
                $.ajax({
                    url: config.get_actions_base_url + modelName,
                    dataType: 'script',
                    cache: false,

                    beforeSend: function(jqXHR, settings) {
                        Spinner.showCentered();
                    },

                    success: function(data, textStatus, jqXHR) {
                        $("#secondUrlBuilderBox").fadeOut(400, function() {
                            $("#urlBuilderModelActionsBox").html(data);
                        });
                    },

                    complete: function() {
                        Spinner.hide(function(){
                            $("#secondUrlBuilderBox").fadeIn(400, function() {
                                $(this).css({
                                    display: 'block'
                                });
                            });
                        });
                    }
                    
                });

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
