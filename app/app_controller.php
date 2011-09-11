<?php

class AppController extends Controller {

    public $helpers = array('Html', 'Form', 'Session', 'Time', 'Number', 'Text', 'Utils.Gravatar', 'Backend', 'Frontend');
    public $components = array('Auth', 'Session', 'Email', 'Cookie', 'Search.Prg', 'DebugKit.Toolbar');
    public $uses = array('Menu', 'Variable');
    protected $_pageTitle = null;
    protected $_variable = null;
    public $presetVars = null;
    

    public function beforeFilter() {
        $this->_setupCookies();
        $this->_setupAuthComponent();
        $this->_setupLayout();
        $this->set('presetVars', $this->presetVars);
        $this->set('model', $this->modelClass);
        $this->set('variable',
            ($this->_variable = $this->Variable->find('list', array('fields' => array('key', 'value'))))
        );
        
        $this->helpers['Layout'] = array('variables' => $this->_variable);
    }

    public function beforeRender() {
			if(!empty($this->_pageTitle)) {
				$this->set('title_for_layout', $this->_variable('baseTitle') . " - " . $this->_pageTitle);
			} else {
				$this->set('title_for_layout', $this->_variable('baseTitle'));
			}
    }

    public function admin_find() {
        if ($this->presetVars) {
            $this->Prg->commonProcess();
            $this->paginate['conditions'] = $this->{$this->modelClass}->parseCriteria($this->passedArgs);
            $this->set(Inflector::variable(Inflector::pluralize($this->modelClass)) , $this->paginate());
            $this->render('admin_index');
        } else {
            $this->cakeError('error404');
        }
    }
    
    protected function _setupAuthComponent() {
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => true);
        $this->Auth->loginRedirect = array('controller' => 'menus', 'action' => 'index', 'admin' => true);
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', 'admin' => true);
        $this->Auth->fields = array('username' => 'email', 'password' => 'passwd');
    }

    protected function _setupCookies() {
        $this->Cookie->name = 'confectionerAppCookies';
        $this->Cookie->key = 'confectionerApplicationSecretKey';
    }

    protected function _setupLayout() {
        if ( isset($this->params['prefix']) && $this->params['prefix'] == 'admin' && $this->params['admin'] ) {
            $this->layout = 'backend/default';
            $this->_pageTitle = __('backend', true);
        } else {
            $this->_getMenus();
            $this->layout = 'default';
        }
    }

    protected function _getMenus() {
        $this->Menu->recursive = -1;
        $menus = $this->Menu->find('all', array(
            'conditions' => "Menu.menu_id = '' OR Menu.menu_id IS NULL",
            'order'      => "Menu.lft"
        ));
        
        foreach ($menus as $menu) {
            $this->set(
                    Inflector::variable($menu['Menu']['name']) . "FCMenu",
                    array(
                        'Menu' => $menu['Menu'],
                        'Children' => $this->Menu->find('all', array(
                            'conditions' => array('Menu.menu_id' => $menu['Menu']['id']),
                            'order' => "Menu.lft"
                        ))
                    )
            );
        }
    }
    
    protected function _variable($key = false) {
        if($key) {
            
            return (isset($this->_variable[$key]) && !empty($this->_variable[$key])) ? $this->_variable[$key] : Configure::read("App.{$key}");
            
        } else {
            
            return false;
            
        }
    }

    /** old **/
//    public function setLocale($lang = null) {
//        $this->P28n->change($lang);
//        $this->currentLanguage = $lang;
//        foreach ($this->uses as $modelName) {
//            $this->{$modelName}->setLocale($this->currentLanguage);
//        }
//    }
//    protected function _setupLocale() {
//        $this->currentLanguage = $this->P28n->getLanguage();
//        foreach ($this->uses as $modelName) {
//            $this->{$modelName}->setLocale($this->currentLanguage);
//        }
//    }
//    protected function _getLanguages() {
//        $languages = $this->languages();
//        $url = $this->params['url']['url'] == '/' ? '' : $this->params['url']['url'];
//        $languageOptions = array();
//        foreach ($languages as $code => $language) {
//            $languageOptions["/{$code}/{$url}"] = $language;
//        }
//        $this->set('languages', $languages);
//        $this->set('languageOptions', $languageOptions);
//    }
}