<?php

class PagesController extends AppController {

    public $name = 'Pages';

    public function  beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow("display");
    }

    function display() {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            $this->redirect('/');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('page', 'subpage', 'title_for_layout'));
        $this->render(implode('/', $path));
    }

    public function admin_index() {
        $this->Page->recursive = 0;
        $this->set('pages', $this->paginate());
    }

    public function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid page', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('page', $this->Page->read(null, $id));
    }

    public function admin_add() {
        if (!empty($this->data)) {
            $this->Page->create();
            if ($this->Page->save($this->data)) {
                $this->Session->setFlash(__('The page has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The page could not be saved. Please, try again.', true));
            }
        }
    }

    public function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid page', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Page->save($this->data)) {
                $this->Session->setFlash(__('The page has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The page could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Page->read(null, $id);
        }
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for page', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Page->delete($id)) {
            $this->Session->setFlash(__('Page deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Page was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}
