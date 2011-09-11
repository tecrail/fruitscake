<?php

class NewsletterUsersController extends AppController {

    public $name = 'NewsletterUsers';
    public $components = array('Email');

    public function beforeFilter() {
        parent::beforeFilter();

        /* $this->Email->smtpOptions = array(
          'port'=>'25',
          'timeout'=>'30',
          'host' => 'out.alice.it'
          );
          $this->Email->delivery = 'smtp'; */

        $this->Auth->allow(array('index', 'unsubscription', 'confirm_unsubscription'));
    }

    public function index() {
        if (!empty($this->data)) {
            $this->NewsletterUser->create();
            if ($this->NewsletterUser->save($this->data)) {
                $this->Session->setFlash(__('lbl_thanks_for_your_subscription', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('lbl_invalid_fields', true));
            }
        }
        
        $this->set('options_languages', $this->NewsletterUser->Language->find('list'));
    }

    public function unsubscription() {
        if (!empty($this->data)) {
            $this->NewsletterUser->set($this->data);

            // @todo: check this validations
            unset($this->NewsletterUser->validate['email']['email_unique']);             
            unset($this->NewsletterUser->validate['first_name']);
            unset($this->NewsletterUser->validate['last_name']);

            if ($this->NewsletterUser->validates()) {

                $newsletterUser = $this->NewsletterUser->find('first', array('conditions' => array('NewsletterUser.email' => $this->data['NewsletterUser']['email'])));

                $this->set('newsletterUser', $newsletterUser);
                if ($newsletterUser) {
                    
                    if (!$this->_sendUnsubscriptionMail($newsletterUser)) {
                        $this->Session->setFlash(__('lbl_unsubscription_email_not_sent', true));
                        return;
                    }
                    $this->Session->setFlash(__('lbl_unsubscription_email_to_remove', true));
                    
                } else {
                    $this->Session->setFlash(__('lbl_unsubscription_email_not_found', true));
                }

            } else {
                $this->Session->setFlash(__('lbl_unsubscription_email_not_found', true));
            }
            
        }
    }

    public function confirm_unsubscription($id = null) {
        if ($id) {
            $newsletterUser = $this->NewsletterUser->read(null, $id);
            if ($newsletterUser) {
                $key = md5($newsletterUser['NewsletterUser']['id'] . $newsletterUser['NewsletterUser']['email']);
                $paramKey = '';
                if (isset($this->params['named']['key'])) {
                    $paramKey = $this->params['named']['key'];
                }
                if ($key == $paramKey) {
                    $this->NewsletterUser->del($id);
                    $this->Session->setFlash(__('lbl_unsubscription_ok', true));
                    $this->redirect('unsubscription');
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->redirect(array('action' => 'index'));
        }
    }

    public function admin_index() {
        $this->NewsletterUser->recursive = 0;
        $this->set('newsletterUsers', $this->paginate());
    }

    public function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('lbl_newsletter_user_not_found', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('newsletterUser', $this->NewsletterUser->read(null, $id));
    }

    public function admin_add() {
        if (!empty($this->data)) {
            $this->NewsletterUser->create();
            if ($this->NewsletterUser->save($this->data)) {
                $this->Session->setFlash(__('lbl_newsletter_user_saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('lbl_invalid_fields', true));
            }
        } else {
            $this->data['NewsletterUser']['is_active'] = true;
        }
        $this->set('languages', $this->NewsletterUser->Language->find('list'));
    }

    public function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('lbl_newsletter_user_not_found', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->NewsletterUser->save($this->data)) {
                $this->Session->setFlash(__('lbl_newsletter_user_saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('lbl_invalid_fields', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->NewsletterUser->read(null, $id);
        }
        $this->set('languages', $this->NewsletterUser->Language->find('list'));
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('lbl_newsletter_user_not_found', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->NewsletterUser->delete($id)) {
            $this->Session->setFlash(__('lbl_newsletter_user_deleted', true));
            $this->redirect(array('action' => 'index'));
        }
    }

    protected function _sendUnsubscriptionMail($newsletterUser = null) {
        if ($newsletterUser) {
            
            $this->Email->to = $newsletterUser['NewsletterUser']['email'];

            $this->Email->subject   = $this->_variable('baseTitle') . " :: " . __('lbl_newsletter_unsubscription_mail_subject', true);
            $this->Email->replyTo   = $this->_variable('baseTitle') . ' <' . $this->_variable('newsletterEmail') . '>';
            $this->Email->from      = $this->_variable('baseTitle') . ' <' . $this->_variable('newsletterEmail') . '>';

            $this->Email->layout = 'unsubscription';
            $this->Email->template = 'unsubscription';

            $this->Email->sendAs = 'both';  //Send as 'html', 'text' or 'both' (default is 'text')

            //Set view variables as normal
            $token = md5($newsletterUser['NewsletterUser']['id'] . $newsletterUser['NewsletterUser']['email']);
            
            $this->set('key', $token);
            $this->set('newsletterUser', $newsletterUser);

            return $this->Email->send();
        } else {
            return false;
        }
    }

}
