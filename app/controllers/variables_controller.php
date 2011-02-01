<?php
class VariablesController extends AppController {

	public $name = 'Variables';

	public function admin_index() {
		$this->Variable->recursive = 0;
		$this->set('variables', $this->paginate());
	}

	public function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid variable', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('variable', $this->Variable->read(null, $id));
	}

	public function admin_add() {
		if (!empty($this->data)) {
			$this->Variable->create();
			if ($this->Variable->save($this->data)) {
				$this->Session->setFlash(__('The variable has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The variable could not be saved. Please, try again.', true));
			}
		}
	}

	public function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid variable', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Variable->save($this->data)) {
				$this->Session->setFlash(__('The variable has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The variable could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Variable->read(null, $id);
		}
	}

	public function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for variable', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Variable->delete($id)) {
			$this->Session->setFlash(__('Variable deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Variable was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
