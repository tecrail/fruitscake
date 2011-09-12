(function($){

    $.fcHtmlEditor = {
        default_settings: {}
    };

    $.fn.fcHtmlEditor = function(config){

        config = $.extend({}, $.fcHtmlEditor.default_settings, config);

        
    
        return $(this).each(function(){

            var editor = null;
            var input = $(this).find('div.input > textarea:first');
            var tmpInput = null;
            var editorContentPreserver = null;

            //init fancybox
            $(this).find('a.fancyHtmlEditorLink').each(function() {

                var href = $(this).attr('href');
                editorContentPreserver = $(href).html();

                $(this).fancybox({
                    //modal: true,
                    inline: true,
                    centerOnScroll: true,
                    onComplete: function() {

                        tmpInput = $('#fancybox-content').find('textarea.tinymceEditor:first');
                        
                        tmpInput.val( input.val() );


                        //init tinymce
                        tmpInput.tinymce({
                            script_url: "/js/backend/tiny_mce/tiny_mce.js",
                            theme : "advanced",
										        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

										        // Theme options
										        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
										        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
										        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
										        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
										        theme_advanced_toolbar_location : "top",
										        theme_advanced_toolbar_align : "left",
										        theme_advanced_statusbar_location : "bottom",
										        theme_advanced_resizing : true,

										        // Skin options
										        skin : "o2k7",
										        skin_variant : "silver",

										        // Example content CSS (should be your site CSS)
										        content_css : "css/example.css",

										        // Drop lists for link/image/media/template dialogs
										        template_external_list_url : "js/template_list.js",
										        external_link_list_url : "js/link_list.js",
										        external_image_list_url : "js/image_list.js",
										        media_external_list_url : "js/media_list.js",
										        

                        });
                        
                    },

                    onCleanup: function() {
                        input.val(tmpInput.html());
                    },

                    onClosed: function() {
                        $(href).html(editorContentPreserver);
                    }
                    
                });


            });

 
            return editor;
        });
    }

})(jQuery);

$(document).ready(function() {
    $(".htmlEditor").fcHtmlEditor();
});
//<script type="text/javascript" src="/js/tinymce/tiny_mce/jquery.tinymce.js"></script>
//<script type="text/javascript">
//	$(function() {
//		$('textarea.tinymce').tinymce({
//			// Location of TinyMCE script
//			script_url : '/js/tinymce/jscripts/tiny_mce/tiny_mce_jquery.js',
//
//			// General options
//			theme : "advanced",
//			plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
//
//			// Theme options
//			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
//			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
//			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
//			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
//			theme_advanced_toolbar_location : "top",
//			theme_advanced_toolbar_align : "left",
//			theme_advanced_statusbar_location : "bottom",
//			theme_advanced_resizing : true,
//
//			// Example content CSS (should be your site CSS)
//			content_css : "css/example.css",
//
//			// Drop lists for link/image/media/template dialogs
//			template_external_list_url : "lists/template_list.js",
//			external_link_list_url : "lists/link_list.js",
//			external_image_list_url : "lists/image_list.js",
//			media_external_list_url : "lists/media_list.js",
//
//			// Replace values for the template plugin
//			template_replace_values : {
//				username : "Some User",
//				staffid : "991234"
//			}
//		});
//	});
//</script>
//
