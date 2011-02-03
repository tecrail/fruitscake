<?php

class UrlBuilderController extends AppController {

    public $name = 'UrlBuilder';
    public $uses = array();
    public $layout = 'ajax';
    protected $_availableMenus = array();
    private $__defaultModelSettings = array(
        'actions' => array('index', 'view')
    );

    public function __construct() {
        parent::__construct();
        $this->_availableModels = array(
            'page' => __('Page', true),
            'news' => __('News', true),
            'photo_gallery' => __('Photo gallery', true)
        );
    }

    public function admin_get_models() {
        $this->set('availableModels', $this->_availableModels);
        $this->layout = 'ajax';
    }

    public function admin_get_actions($model) {
        
    }

}
