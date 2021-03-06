<?php
class PhotosController extends AppController {

	public $name = 'Photos';

	public function admin_index() {
		$this->Photo->recursive = 0;
		$this->set('photos', $this->paginate());
	}

	public function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid photo', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('photo', $this->Photo->read(null, $id));
	}

	public function admin_add() {
		if (!empty($this->data)) {
			$this->Photo->create();
			if ($this->Photo->save($this->data)) {
				$this->Session->setFlash(__('The photo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.', true));
			}
		} else {
			$this->data['Photo']['published'] = true;
		}
		$photoGalleries = $this->Photo->PhotoGallery->find('list');
		if(empty($photoGalleries)) {
			$this->Session->setFlash(__('You have to create a photo gallery first', true));
			$this->redirect(array('controller' => 'photo_galleries', 'action'=>'add'));
		}
		$this->set(compact('photoGalleries'));
	}

	public function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid photo', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Photo->save($this->data)) {
				$this->Session->setFlash(__('The photo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Photo->read(null, $id);
		}
		$photoGalleries = $this->Photo->PhotoGallery->find('list');
		$this->set(compact('photoGalleries'));
	}

	public function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for photo', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Photo->delete($id)) {
			$this->Session->setFlash(__('Photo deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Photo was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
