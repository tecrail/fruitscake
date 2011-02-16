<?php

class BackendHelper extends AppHelper {

    public $helpers = array('Html', 'Form', 'Javascript');
    private $__htmlEditorLibsLoaded = false;

    public function actionLink($title, $url = null, $options = array(), $confirmMessage = false) {
        return $this->Html->link($title, $url, $options, $confirmMessage);
    }

    public function isActive($condition = false, $dateForm = null, $dateTo = null) {
        $now = strtotime(date("Y-m-d"));
        if ($dateForm || $dateTo) {
            $condition = ($condition && ($now >= strtotime($dateForm)) && ($now <= strtotime($dateTo)));
        }
        $image = $this->Html->image('backend/' . ($condition ? 'on.gif' : 'off.gif'));
        return $this->output($image);
    }

    public function imageInput($fieldName = null, $options = array()) {
        $defaultOptions = array('type' => 'file', 'preview' => false, 'delete' => false);
        $options = array_merge($defaultOptions, $options);

        $options['type'] = 'file';
        $options['label'] = false;
        $deletable = $options['delete'] ? true : false;
        $preview = $options['preview'] ? $options['preview'] : false;
        $previewLabel = false;
        if ($preview && isset($preview['preview']) && !empty($preview['preview'])) {
            $previewLabel = $preview['preview'];
        }

        $output = '';
        $output.= "<fieldset class='imageInput'>";
        $output.= "<legend>" . (isset($options['legend']) ? $options['legend'] : __(Inflector::humanize($fieldName), true)) . "</legend>";


        $output.= $this->Form->input($fieldName, $options);

        if ($preview) {
            $output.= "<div class=\"preview_image\">" . ($previewLabel ? $previewLabel : __('Current image', true) . ':') . "<br/>" . $this->Html->image($preview['url'], array('class' => 'image-preview')) . "</div>";
        }

        if ($deletable) {
            $output.= $this->Form->input("delete_{$fieldName}", array('label' => __('Delete', true), 'type' => 'checkbox'));
        }

        $output.= '</fieldset>';

        return $this->output($output);
    }

    public function fileInput($fieldName = null, $options = array()) {
        $defaultOptions = array('type' => 'file', 'preview' => false, 'delete' => false);
        $options = array_merge($defaultOptions, $options);

        $options['type'] = 'file';
        $options['label'] = false;
        $deletable = $options['delete'] ? true : false;
        $preview = $options['preview'] ? $options['preview'] : false;
        $previewLabel = false;
        if ($preview && isset($preview['preview']) && !empty($preview['preview'])) {
            $previewLabel = $preview['preview'];
        }

        $output = '';
        $output.= "<fieldset class='imageInput fileInput'>";
        $output.= "<legend>" . (isset($options['legend']) ? $options['legend'] : __(Inflector::humanize($fieldName), true)) . "</legend>";


        $output.= $this->Form->input($fieldName, $options);

        if ($preview) {
            $output.= "<div class=\"preview_file\">" . ($previewLabel ? $previewLabel : __('Current attachment', true) . ':') . "<br/>" . $this->Html->link($preview['url'], $preview['url'], array('class' => 'file-preview')) . "</div>";
        }

        if ($deletable) {
            $output.= $this->Form->input("delete_{$fieldName}", array('label' => __('Delete', true), 'type' => 'checkbox'));
        }

        $output.= '</fieldset>';

        return $this->output($output);
    }

    public function htmlEditor($fieldName, $options = array()) {
        $this->_loadHtmlEditorLibs();

        $output = "<div class='htmlEditor'>";
        
        $output.= $this->Html->link('HTML', "#{$fieldName}HtmlFancyContainer", array('id' => $fieldName.'HtmlEditor', 'class' => 'fancyHtmlEditorLink'));
        $output.= $this->Form->input($fieldName, $options);

        $output.= "
            <div id='{$fieldName}HtmlFancyContainer' class='htmlFancyContainer'>
                Ciao Mondo!
            </div>"
        ;
        $output.= "</div>";

        return $this->output($output);
    }

    protected function _loadHtmlEditorLibs() {
        if(!$this->__htmlEditorLibsLoaded) {

            $this->Html->script('backend/html_editor', array('inline' => false));
            $this->__htmlEditorLibsLoaded = true;
            
        }
    }

}
