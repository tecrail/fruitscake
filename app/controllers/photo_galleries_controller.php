<?php
class PhotoGalleriesController extends AppController {

	var $name = 'PhotoGalleries';

	function index() {
		$this->PhotoGallery->recursive = 0;
		$this->set('photoGalleries', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid photo gallery', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('photoGallery', $this->PhotoGallery->read(null, $id));
	}

	function add() {
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

	function edit($id = null) {
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

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for photo gallery', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PhotoGallery->delete($id)) {
			$this->Session->setFlash(__('Photo gallery deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Photo gallery was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>