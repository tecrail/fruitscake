<?php

class MenusController extends AppController {

    public $name = 'Menus';
    public $helpers = array('Html', 'Form');
    protected $_availableMenus = array();

    public function  __construct() {
        parent::__construct();
//        $this->_availableMenus = array(
//            'Page' => array(
//                array(
//                    'url' => array('controler' => 'pages', 'action' => 'view'),
//                    'label' => __('Show page', true),
//                    'slaggable' => true
//                )
//            ),
//            'News' => array(
//                array(
//                    'url' => array('controler' => 'news', 'action' => 'index'),
//                    'label' => __('List news', true)
//                ),
//                array(
//                    'url' => array('controler' => 'news', 'action' => 'view'),
//                    'label' => __('Show news', true),
//                    'slaggable' => true
//                ),
//                array(
//                    'url' => array('controler' => 'news', 'action' => 'feed'),
//                    'label' => __('Feed', true)
//                )
//            ),
//            'PhotoGallery' => array(
//                array(
//                    'url' => array('controler' => 'photo_galleries', 'action' => 'index'),
//                    'label' => __('Show photo gallery', true),
//                    'slaggable' => true
//                ),
//                array(
//                    'url' => array('controler' => 'photo_galleries', 'action' => 'view'),
//                    'label' => __('Show photo', true),
//                    'slaggable' => true
//                )
//            )
//        );
    }


    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function admin_index() {
        $this->Menu->recursive = 0;

        $this->helpers[] = 'Utils.Tree';
        $this->set('menus', $this->Menu->find('all', array('order' => 'Menu.lft')));
    }

    public function admin_view($slug = null) {
        try {
            $menu = $this->Menu->view($slug);
        } catch (OutOfBoundsException $e) {
            $this->Session->setFlash($e->getMessage());
            $this->redirect(array('action' => 'index'));
        }
        $this->set(compact('menu'));
    }

    public function admin_add($menu_id = null) {
        try {
            $result = $this->Menu->add($this->data);
            if ($result === true) {
                $this->Session->setFlash(__('The menu has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
        } catch (OutOfBoundsException $e) {
            $this->Session->setFlash($e->getMessage());
        } catch (Exception $e) {
            $this->Session->setFlash($e->getMessage());
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data) && !empty($menu_id)) {
            $this->data['Menu']['menu_id'] = $menu_id;
        }
        $menus = $this->Menu->find('list', array('conditions' => "menu_id = '' OR menu_id IS NULL"));
        $this->set(compact('menus'));
//        $this->set('availableMenus', $this->_availableMenus);
    }


    public function admin_edit($id = null) {
        try {
            $result = $this->Menu->edit($id, $this->data);
            if ($result === true) {
                $this->Session->setFlash(__('Menu saved', true));
                $this->redirect(array('action' => 'view', $this->Menu->data['Menu']['slug']));
            } else {
                $this->data = $result;
            }
        } catch (OutOfBoundsException $e) {
            $this->Session->setFlash($e->getMessage());
            $this->redirect('/');
        }
        $menus = $this->Menu->find('list', array('conditions' => "menu_id = '' OR menu_id IS NULL"));
        $this->set(compact('menus'));
//        $this->set('availableMenus', $this->_availableMenus);
    }

        public function admin_add_parent($menu_id = null) {
        try {
            $result = $this->Menu->add($this->data);
            if ($result === true) {
                $this->Session->setFlash(__('The menu has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
        } catch (OutOfBoundsException $e) {
            $this->Session->setFlash($e->getMessage());
        } catch (Exception $e) {
            $this->Session->setFlash($e->getMessage());
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data) && !empty($menu_id)) {
            $this->data['Menu']['menu_id'] = $menu_id;
        }
        $menus = $this->Menu->find('list');
        $this->set(compact('menus'));
    }


    public function admin_edit_parent($id = null) {
        try {
            $result = $this->Menu->edit($id, $this->data);
            if ($result === true) {
                $this->Session->setFlash(__('Menu saved', true));
                $this->redirect(array('action' => 'view', $this->Menu->data['Menu']['id']));
            } else {
                $this->data = $result;
            }
        } catch (OutOfBoundsException $e) {
            $this->Session->setFlash($e->getMessage());
            $this->redirect('/');
        }
        $menus = $this->Menu->find('list');
        $this->set(compact('menus'));
    }


    public function admin_delete($id = null) {
        try {
            $result = $this->Menu->delete($id, $this->data);
            if ($result === true) {
                $this->Session->setFlash(__('Menu deleted', true));
                $this->redirect(array('action' => 'index'));
            }
        } catch (Exception $e) {
            $this->Session->setFlash($e->getMessage());
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->Menu->data['menu'])) {
            $this->set('menu', $this->Menu->data['menu']);
        }
    }

    public function admin_move_up($id = null) {
        $menu = $this->Menu->moveup($id);
        $this->redirect(array('action' => 'index'));
    }

    public function admin_move_down($id = null) {
        $menu = $this->Menu->movedown($id);
        $this->redirect(array('action' => 'index'));
    }

}
