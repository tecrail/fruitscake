<?php

class UrlBuilderController extends AppController {

    public $name = 'UrlBuilder';
    public $uses = array();
    public $layout = 'ajax';
    private $__defaultModelSettings = array();
    protected $_availableMenus = array();
	protected $_defaultRouterOptions = array(
		'admin' => false
	);

    public function __construct() {
        parent::__construct();
        $this->_availableModels = array(
            'page' => array(
                'label' => __('Page', true)
            ),
            'photo_gallery' => array(
                'label' => __('Photo gallery', true)
            ),
            'news' => array(
                'label' => __('News', true)
            ),
            /*'newsletter' => array(
                'label' => __('Newsletters', true)
            ),*/
            'newsletter' => array(
                'label' => __('Newsletters', true),
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
	                ),
                    'subscription' => array(
                    	'model' => 'newsletter_user',
                        'label' => __('Subscription', true),
                        'thirdStep' => false,
                        'url' => array('controller' => 'newsletter_users', 'action' => 'index')
                    ),
                    'unsubscription' => array(
                    	'model' => 'newsletter_user',
                        'label' => __('Unsubscription', true),
                        'thirdStep' => false,
                        'url' => array('controller' => 'newsletter_users', 'action' => 'unsubscription')
                    )
                )
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
        	
			$actionModel = isset($action['model']) ? $action['model'] : $model;

            if (!isset($action['url']) || empty($action['url'])
                    && (!isset($action['thirdStep']) || !$action['thirdStep'])) {

                $action['url'] = Router::url(array(
                            'controller' => Inflector::pluralize($actionModel),
                            'action' => $key,
                            'admin' => false
                        ));
            } else {
            	$action['url'] = Router::url(array_merge($action['url'], $this->_defaultRouterOptions));
           	}

            if (isset($action['thirdStep']) && !empty($action['thirdStep'])
                    && (!isset($action['thirdStep']['url']) || !($action['thirdStep']['url']))) {

                $action['thirdStep']['url'] = Router::url(array(
                            'controller' => 'url_builder', //Inflector::pluralize($model),
                            'action' => 'get_items',
                            $actionModel,
                            'admin' => true
                        ));
                $action['url'] = null;
            }

            $result[$key] = $action;
        }

        $this->set('actions', $result);
    }

    public function admin_get_items($model = null) {

        if ($model) {
            $camelizeModel = Inflector::camelize($model);
            $this->loadModel($camelizeModel);

            $items = $this->{$camelizeModel}->find('list');

            $this->set('items', $items);
            $this->set('model', $model);
        }
    }

}
