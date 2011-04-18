<?php

class HomepageController extends AppController {

    public $name = 'Homepage';
    public $helpers = array('Html', 'Form');
    public $uses = array();


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('*');
    }

    public function index() {
        
    }

}
