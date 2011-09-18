<?php
class NewsController extends AppController {

	public $name = 'News';

        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow(array("index", "view"));
        }

	public function index() {
		$this->News->recursive = 0;
                $this->paginate['News'] = array(
                    'limit' => 10,
                    'conditions' => News::publishedConditions()
                );
		$this->_pageTitle = "News";
		$this->set('news', $this->paginate());
	}

	public function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid news', true));
			$this->redirect(array('action' => 'index'));
		}
		$news = $this->News->read(null, $id);
		$this->_pageTitle = "News - " . $news['News']['title'];
		$this->set('news', $news);
	}

	public function admin_index() {
		$this->News->recursive = 0;
		$this->set('news', $this->paginate());
	}

	public function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid news', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('news', $this->News->read(null, $id));
	}

	public function admin_add() {
		if (!empty($this->data)) {
			$this->News->create();
			if ($this->News->save($this->data)) {
				$this->Session->setFlash(__('The news has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.', true));
			}
		} else {
			$this->data['News']['published'] = true;
		}
		$languages = $this->News->Language->find('list');
		$this->set(compact('languages'));
	}

	public function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid news', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->News->save($this->data)) {
				$this->Session->setFlash(__('The news has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->News->read(null, $id);
		}
		$languages = $this->News->Language->find('list');
		$this->set(compact('languages'));
	}

	public function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for news', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->News->delete($id)) {
			$this->Session->setFlash(__('News deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('News was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
