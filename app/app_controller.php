<?php

class AppController extends Controller {

    public $helpers = array('Html', 'Form', 'Session', 'Time', 'Number', 'Text', 'Utils.Gravatar');
    public $components = array('Auth', 'Session', 'Email', 'Cookie', 'Search.Prg', 'DebugKit.Toolbar');
    protected $_pageTitle = null;
    public $presetVars = null;

    public function beforeFilter() {
        $this->_setupCookies();
        $this->_setupAuthComponent();
        $this->_setupLayout();
        $this->set('presetVars', $this->presetVars);
        $this->set('model', $this->modelClass);
    }

    public function beforeRender() {
        $this->set('title_for_layout', Configure::read('App.baseTitle') . " " . $this->_pageTitle);
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
        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'dashboard', 'admin' => true);
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', 'admin' => true);
        $this->Auth->fields = array('username' => 'email', 'password' => 'passwd');
    }

    protected function _setupCookies() {
        $this->Cookie->name = 'confectionerAppCookies';
        $this->Cookie->key = 'confectionerApplicationSecretKey';
    }

    protected function _setupLayout() {
        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            $this->layout = 'backend/default';
            $this->_pageTitle = __('backend', true);
        } else {
            $this->layout = 'default';
        }
    }

    /** old * */
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