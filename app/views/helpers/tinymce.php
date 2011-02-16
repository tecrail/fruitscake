<?php
class TinyMceHelper extends AppHelper {
    
    public $helpers = array('Javascript', 'Form');
    protected $_script = false;
    protected $_defaultSettings = array(
        'mode' => 'exact',
        'theme' => 'advanced',
        'plugins' => 'safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template',
        'theme_advanced_buttons1' => 'bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect',
//        'theme_advanced_buttons2' => 'cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor',
        'theme_advanced_buttons2' => 'cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,forecolor,backcolor',
        'theme_advanced_buttons3' => 'tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen',
        'theme_advanced_toolbar_location' => 'top',
        'theme_advanced_toolbar_align' => 'left',
        'theme_advanced_statusbar_location' => 'bottom',
        'theme_advanced_resizing' => true,
        'language' => 'it',
        'convert_urls' => false,
        'file_browser_callback' => 'fileBrowserCallBack',
        'width' => '650px'
    );

    /**
     * Adds the tiny_mce.js file and constructs the options
     *
     * @param string $fieldName Name of a field, like this "Modelname.fieldname", "Modelname/fieldname" is deprecated
     * @param array $tinyoptions Array of TinyMCE attributes for this textarea
     * @return string JavaScript code to initialise the TinyMCE area
     */
    function _build($fieldName, $tinyoptions = array()) {
        if (!$this->_script) {
            // We don't want to add this every time, it's only needed once
            $this->_script = true;
            $this->Javascript->link('/js/tiny_mce/tiny_mce.js', false);
            $this->Javascript->link('/js/admin.js', false);
        }
        $tinyoptions = am($this->_defaultSettings, $tinyoptions);
        
        $tinyoptions['elements'] = $this->Form->domId();

        return $this->Javascript->codeBlock('tinyMCE.init(' . $this->Javascript->object($tinyoptions) . ');');
    }

    /**
     * Creates a TinyMCE textarea.
     *
     * @param string $fieldName Name of a field, like this "Modelname.fieldname", "Modelname/fieldname" is deprecated
     * @param array $options Array of HTML attributes.
     * @param array $tinyoptions Array of TinyMCE attributes for this textarea
     * @return string An HTML textarea element with TinyMCE
     */
    function textarea($fieldName, $options = array(), $tinyoptions = array()) {
        return $this->Form->textarea($fieldName, $options) . $this->_build($fieldName, $tinyoptions);
    }

    /**
     * Creates a TinyMCE textarea.
     *
     * @param string $fieldName Name of a field, like this "Modelname.fieldname", "Modelname/fieldname" is deprecated
     * @param array $options Array of HTML attributes.
     * @param array $tinyoptions Array of TinyMCE attributes for this textarea
     * @return string An HTML textarea element with TinyMCE
     */
    function input($fieldName, $options = array(), $tinyoptions = array()) {
        $options['type'] = 'textarea';
        return $this->Form->input($fieldName, $options) . $this->_build($fieldName, $tinyoptions);
    }
}
