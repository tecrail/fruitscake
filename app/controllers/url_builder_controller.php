<?php

class UrlBuilderController extends AppController {

    public $name = 'UrlBuilder';
    public $uses = array();
    public $layout = 'ajax';
    private $__defaultModelSettings = array();
    protected $_availableMenus = array();

    public function __construct() {
        parent::__construct();
        $this->_availableModels = array(
            'page' => array(
                'label' => __('Page', true)
            ),
            'news' => array(
                'label' => __('News', true)
            ),
            'photo_gallery' => array(
                'label' => __('Photo gallery', true)
            )
        );

        $this->__defaultModelSettings = array(
            'actions' => array(
                'index' => array(
                    'label' => __('Model index', true),
                    'thirdStep' => false,
                    'url' => null
                ),
                'view' => array(
                    'label' => __('Model view', true),
                    'url' => null,
                    'thirdStep' => array(
                        'url' => null
                    )
                )
            )
        );
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'ajax';
    }

    public function admin_get_models() {
        $this->set('availableModels', $this->_availableModels);
    }

    public function admin_get_actions($model) {
        $this->set('model', $model);

        if ($this->_availableModels[$model] && isset($this->_availableModels[$model]['actions'])) {
            $actions = $this->_availableModels[$model]['actions'];
        } else {
            $actions = $this->__defaultModelSettings['actions'];
        }

        $result = array();

        foreach ($actions as $key => $action) {

            if(!isset($action['url']) || empty($action['url'])
                    && (!isset($action['thirdStep']) || !$action['thirdStep'])) {

                $action['url'] =  Router::url(array(
                    'controller' => Inflector::pluralize($model),
                    'action' => $key,
                    'admin' => false
                ));
            }
            
            if (isset($action['thirdStep']) && !empty($action['thirdStep']) 
                    && (!isset($action['thirdStep']['url']) || !($action['thirdStep']['url'])) ) {

                $action['thirdStep']['url'] =  Router::url(array(
                    'controller' => Inflector::pluralize($model),
                    'action' => 'get_items',
                    'admin' => true
                ));
                $action['url'] = null;
                
            }

            $result[$key] = $action;
            
        }

        $this->set('actions', $result);
        
    }

}
