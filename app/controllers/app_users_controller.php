<?php

App::import('Controller', 'Users.Users');

class AppUsersController extends UsersController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->User = ClassRegistry::init('AppUser');
    }

    public function render($action = null, $layout = null, $file = null) {
        if (!file_exists(VIEWS . 'app_users' . DS . $action . '.ctp')) {
            if(empty($action)) {
                $action = 'index';
            }
            $file = App::pluginPath('users') . 'views' . DS . 'users' . DS . $action . '.ctp';
        }
       
        return parent::render($action, $layout, $file);
    }

}
