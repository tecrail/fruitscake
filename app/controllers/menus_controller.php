<?php

class MenusController extends AppController {

    public $name = 'Menus';
    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function admin_index() {
        $this->Menu->recursive = 0;
//        $this->set('menus', $this->paginate());

        $this->helpers[] = 'Utils.Tree';
        $this->set('menus', $this->Menu->find('all', array('order' => 'Menu.lft')));
    }

    public function admin_tree() {
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
        $menus = $this->Menu->find('list');
        $this->set(compact('menus'));
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

}
