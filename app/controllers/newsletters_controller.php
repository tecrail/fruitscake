<?php

class NewslettersController extends AppController {

    public $name = 'Newsletters';
    public $components = array('Email');
    public $uses = array('Newsletter', 'NewsletterUser');

    public function beforeFilter() {
        parent::beforeFilter();
        //debug
        /* $this->Email->smtpOptions = array(
          'port'=>'25',
          'timeout'=>'30',
          'host' => 'out.alice.it'
          );
          $this->Email->delivery = 'smtp'; */
        $this->Auth->allow(array('index', 'view'));
    }

    public function index() {
				$this->_pageTitle = "Newsletter";
        $this->Newsletter->recursive = 0;
        $this->paginate['Newsletter'] = array('limit' => 10);
        $this->set('newsletters', $this->paginate());
    }


    public function admin_index() {
        $this->Newsletter->recursive = 0;
        $this->set('newsletters', $this->paginate());
    }

    public function admin_add() {
        if (!empty($this->data)) {
            $this->Newsletter->create();

            $this->data['Newsletter']['user_id'] = $this->Session->read('Auth.User.id');

            if ($this->Newsletter->save($this->data)) {

                $this->data['Newsletter']['description_text'] = __("To properly view the newsletter please use the following link") . ": " . Router::url(array('controller' => 'newsletters', 'action' => 'view', $this->Newsletter->id), true);
                $this->Newsletter->save($this->data);

                $this->Session->setFlash(__('lbl_newsletter_saved', true));

                if ($this->data['Newsletter']['send_newsletter']) {
                    $this->redirect(array('action' => 'deliver', 'id' => $this->Newsletter->id));
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('lbl_invalid_fields', true));
            }
        } else {
            $this->data['Newsletter']['user_id'] = $this->Session->read('Auth.User.id');
        }


        $users = $this->Newsletter->User->find('list');
        $languages = $this->Newsletter->Language->find('list');

        $this->set(compact('users'));
        $this->set(compact('languages'));
    }

    public function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('lbl_newsletter_not_found', true));
            $this->redirect(array('action' => 'index'));
        }

        if (!empty($this->data)) {

            $this->data['Newsletter']['description_text'] = __("To properly view the newsletter please use the following link") . ": " . Router::url(array('controller' => 'newsletters', 'action' => 'view', $this->Newsletter->id), true);

            if ($this->Newsletter->save($this->data)) {

                $this->Session->setFlash(__('lbl_newsletter_saved', true));

                if ($this->data['Newsletter']['send_newsletter']) {
                    $this->redirect(array('action' => 'deliver', 'id' => $this->Newsletter->id));
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('lbl_invalid_fields', true));
            }
        }

        if (empty($this->data)) {
            $this->data = $this->Newsletter->read(null, $id);
            $this->data['Newsletter']['user_id'] = $this->Session->read('Auth.User.id');
        }

        $users = $this->Newsletter->User->find('list');
        $languages = $this->Newsletter->Language->find('list');

        $this->set(compact('users'));
        $this->set(compact('languages'));
    }

    public function admin_deliver($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('lbl_newsletter_not_found', true));
            $this->redirect(array('action' => 'index'));
        }

        $newsletter = $this->Newsletter->read(null, $id);

        if ($newsletter) {

            $this->NewsletterUser->recursive = -1;
            $newsletterUsers = $this->NewsletterUser->find('all', array('conditions' => array('NewsletterUser.language_id' => $newsletter['Newsletter']['language_id'], 'NewsletterUser.is_active' => true)));

            foreach ($newsletterUsers as $newsletterUser) {
                $this->_deliverEmail($newsletter, $newsletterUser['NewsletterUser']);
            }

            $this->Session->setFlash(__('lbl_newsletter_sent', true));

            $this->redirect(array('action' => 'index'));
        }
    }

    protected function _deliverEmail($newsletter = null, $user = null, $lang = null) {
        if ($newsletter && $user) {

            $this->Email->to = $user['email'];

            $this->Email->subject = $this->_variable('baseTitle') . " :: " . $newsletter['Newsletter']["title"];
            $this->Email->replyTo = $this->_variable('baseTitle') . ' <' . $this->_variable('newsletterEmail') . '>';
            $this->Email->from = $this->_variable('baseTitle') . ' <' . $this->_variable('newsletterEmail') . '>';

            if ((bool) $newsletter['Newsletter']["attachment"]) {
                $this->Email->attachments = array(APP . "webroot" . DS . "files" . DS . "attachments" . DS . $newsletter['Newsletter']["attachment"]);
            }

            $this->Email->layout = 'newsletter';
            $this->Email->template = 'newsletter';

            $this->Email->sendAs = 'both';

            $this->set("data", $newsletter);
            $this->set("user", $user);

            return $this->Email->send();
        } else {
            return false;
        }
    }

    public function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('lbl_newsletter_not_found', true));
            $this->redirect(array('action' => 'index'));
        }
        
        $this->layout = 'email/html/newsletter';
				$newsletter = $this->Newsletter->read(null, $id);

				$this->_pageTitle = "Newsletter";
        $this->set('newsletter', $newsletter);
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('lbl_newsletter_not_found', true));
            $this->redirect(array('action' => 'index'));
        }

        if ($this->Newsletter->del($id)) {
            $this->Session->setFlash(__('lbl_newsletter_deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        
        $this->Session->setFlash(__('lbl_newsletter_could_not_be_deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}
