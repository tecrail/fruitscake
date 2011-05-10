<?php

class HomepageController extends AppController {

    public $name = 'Homepage';
    public $helpers = array('Html', 'Form');
    public $uses = array('Page', 'News');


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('*');
    }

    public function index() {
        $this->set('page', $this->Page->getHomepage());
        #$this->set('news', $this->News->published(array('limit' => 3)));
    }

}
