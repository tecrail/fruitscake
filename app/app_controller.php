<?php
class AppController extends Controller {

//    public $components =  array('Session', 'Cookie', 'DebugKit.Toolbar', 'Auth', 'P28n');
//    public $helpers    =  array('Html', 'Form', 'Number', 'Session', 'Time', 'MyApp', 'CakeAttachment.Upload');
//    public $uses       =  array('Configuration');
//    protected $siteConfiguration = array();
//    protected $currentLanguage = false;
    protected $pageTitle = "tecrail.com";
//
//    public function languages() {
//        return array(
//                'it' => 'italiano',
////                'en' => 'english'
//        );
//    }

    public function beforeFilter() {
//        $this->_setupCookies();
//        $this->_setupAuthComponent();
//        $this->_setupLocale();
//        $this->_getLanguages();

//        if(isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            $this->layout = 'backend';
//            $this->pageTitle = BASE_TITLE.' - Area di amministrazione';
//forza la visualizzazione dell'amministrazione in italiano
//            if($this->currentLanguage != DEFAULT_LANGUAGE) {
//                $this->Session->setFlash("Attenzione: la lingua di navigazione del sito è stata impostata ad italiano");
//                $this->setLocale(DEFAULT_LANGUAGE);
//            }
//        } else {
//            $this->layout = 'default';
//            $this->_getConfiguration();
//            $this->_getNewsList();

//            if(!isset($this->params['page'])) {
//                $this->set('page', false);
//                $this->set('path', false);
//                $this->set('pathParts', false);
//            }

//            if(empty($this->siteConfiguration['Configuration']['site_title'])) {
//                $this->pageTitle = BASE_TITLE;
//            } else {
//                $this->pageTitle = $this->siteConfiguration['Configuration']['site_title'];
//            }
//        }

    }

    public function beforeRender() {
        if (empty ($this->pageTitle)) $this->pageTitle = BASE_TITLE;
        $this->set('title_for_layout', $this->pageTitle);
    }

    public function setLocale($lang = null) {
        $this->P28n->change($lang);
        $this->currentLanguage = $lang;
        foreach ($this->uses as $modelName) {
            $this->{$modelName}->setLocale($this->currentLanguage);
        }
    }

    protected function _setupLocale() {
        $this->currentLanguage = $this->P28n->getLanguage();
        foreach ($this->uses as $modelName) {
            $this->{$modelName}->setLocale($this->currentLanguage);
        }
    }


//    protected function _getConfiguration() {
//        $configuration = $this->Configuration->findActive();
//        $configuration['Configuration']['language'] = $this->currentLanguage;
//        $this->siteConfiguration = $configuration;
//        $this->set("env", $configuration);
//    }

    protected function _getLanguages() {
        $languages = $this->languages();
        $url = $this->params['url']['url'] == '/' ? '' : $this->params['url']['url'];
        $languageOptions = array();
        foreach ($languages as $code => $language) {
            $languageOptions["/{$code}/{$url}"] = $language;
        }
        $this->set('languages', $languages);
        $this->set('languageOptions', $languageOptions);
    }

//    protected function _getNewsList() {
//        $this->set('newsLists', $this->News->find('all', array('conditions' => News::publishConditions(), 'order' => array('News.date' => 'DESC'))));
//    }

//    protected function _setupAuthComponent() {
//        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' =>  true);
//        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'index', 'admin' => true);
//        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', 'admin' => true);
//        $this->Auth->loginError = 'Attenzione. Username o password errati';
//        $this->Auth->authError = 'Accesso negato. Effettua il login per accedere alla pagina';
//    }

    protected function _setupCookies() {
        $this->Cookie->name = 'tecrailAppCookies';
        $this->Cookie->key = 'tecrailApplication';
    }

}
?>
