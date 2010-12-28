<?php

class AppController extends Controller {

    public $helpers = array('Html', 'Form', 'Session', 'Time', 'Number', 'Text', 'Utils.Gravatar');
    public $components = array('Auth', 'Session', 'Email', 'Cookie', 'Search.Prg', 'DebugKit.Toolbar');
    protected $_pageTitle = null;

    public function beforeFilter() {
        $this->_setupCookies();
        $this->_setupAuthComponent();
        $this->_setupLayout();
    }

    public function beforeRender() {
        $this->set('title_for_layout', Configure::read('App.baseTitle') . " " . $this->_pageTitle);
    }

    protected function _setupAuthComponent() {
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => true);
        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'dashboard', 'admin' => true);
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', 'admin' => true);
//        $this->Auth->loginError = 'Attenzione. Username o password errati';
//        $this->Auth->authError = 'Accesso negato. Effettua il login per accedere alla pagina';
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