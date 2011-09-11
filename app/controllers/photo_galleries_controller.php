<?php

class PhotoGalleriesController extends AppController {

    public $name = 'PhotoGalleries';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('index', 'view'));
    }

    public function index() {
        $this->paginate['PhotoGallery'] = array(
            'contain' => array('Photo' => array(
                'limit' => 1,
                'conditions' => array('Photo.published' => true)
            )),
            'order' => array('PhotoGallery.created' => 'DESC'),
            'limit' => 5
        );
				$this->_pageTitle = "Foto gallery";

        $this->PhotoGallery->recursive = 0;
        $this->set('photoGalleries', $this->paginate());
    }

    public function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid photo gallery', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->PhotoGallery->recursive = -1;
        $photoGallery = $this->PhotoGallery->read(null, $id);

				$this->_pageTitle = "Foto gallery - " . $photoGallery['PhotoGallery']['title'];
        $this->set('photoGallery', $photoGallery);

        $this->paginate['Photo'] = array(
            'conditions' => array("Photo.photo_gallery_id" => $photoGallery['PhotoGallery']['id']),
            'order' => array('Photo.created' => 'DESC'),
            'limit' => 16
        );
        $this->PhotoGallery->Photo->recursive = -1;
        $this->set('photos', $this->paginate('Photo'));
    }

    public function admin_index() {
        $this->paginate['PhotoGallery'] = array(
            'contain' => array('Photo' => array(
                'limit' => 1,
                'conditions' => array('Photo.published' => true)
            )),
            'order' => array('PhotoGallery.modified' => 'DESC')
        );

        $this->PhotoGallery->recursive = 0;
        $this->set('photoGalleries', $this->paginate());
    }

    public function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid photo gallery', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('photoGallery', $this->PhotoGallery->read(null, $id));
    }

    public function admin_add() {
        if (!empty($this->data)) {
            $this->PhotoGallery->create();
            if ($this->PhotoGallery->save($this->data)) {
                $this->Session->setFlash(__('The photo gallery has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The photo gallery could not be saved. Please, try again.', true));
            }
        }
    }

    public function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid photo gallery', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->PhotoGallery->save($this->data)) {
                $this->Session->setFlash(__('The photo gallery has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The photo gallery could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->PhotoGallery->read(null, $id);
        }
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for photo gallery', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->PhotoGallery->delete($id)) {
            $this->Session->setFlash(__('Photo gallery deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Photo gallery was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}
