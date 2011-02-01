<?php
class NewsletterUsersController extends AppController {

    public $name = 'NewsletterUsers';
    public $components = array('Email');

    function beforeFilter() {
        parent::beforeFilter();

        /*$this->Email->smtpOptions = array(
            'port'=>'25',
            'timeout'=>'30',
            'host' => 'out.alice.it'
        );
        $this->Email->delivery = 'smtp';*/

        $this->Auth->allow(array('index', 'unsubscription', 'confirm_unsubscription'));
    }

    function index() {
        if (!empty($this->data)) {
            $this->NewsletterUser->create();
            if ($this->NewsletterUser->save($this->data)) {
                $this->Session->setFlash(__('lbl_thanks_for_your_subscription', true));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('lbl_invalid_fields', true));
            }
        }
        $this->set('options_languages', $this->NewsletterUser->Language->find('list'));
        $this->pageTitle = $this->pageTitle." :: ".__('lbl_newsletter_subscription', true);
//        $this->pageTitle = ((__('lbl_newsletter', true)).' - '.(__('lbl_newsletter_subscription', true)).' - '.(__('lbl_title', true)));
    }

    function unsubscription() {
        if (!empty($this->data)) {
            $this->NewsletterUser->set( $this->data );
//            debug($this->data);
//            die();
            //annulla le validazioni dell'inserimento
            unset($this->NewsletterUser->validate['email']['email_unique']);
            unset($this->NewsletterUser->validate['first_name']);
            unset($this->NewsletterUser->validate['last_name']);

            if($this->NewsletterUser->validates()) {
                $newsletterUser = $this->NewsletterUser->find('first', array('conditions' => array('NewsletterUser.email' => $this->data['NewsletterUser']['email'])));
                $this->set('newsletterUser', $newsletterUser);
                if($newsletterUser) {
                    //invia un email di conferma
                    if (!$this->_sendUnsubscriptionMail($newsletterUser)) {
                            $this->Session->setFlash(__('lbl_email_not_sent', true));
                            return;
                    }
                    $this->Session->setFlash(__('lbl_email_to_remove', true));
                } else {
                    $this->Session->setFlash(__('lbl_email_not_found', true));
                }
            } else {
                $this->Session->setFlash(__('lbl_email_not_found', true));
            }
        }
        $this->pageTitle = $this->pageTitle." :: ".__('lbl_delete_from_newsletter', true);
    }

    function confirm_unsubscription($id = null) {
        if($id) {
            $newsletterUser = $this->NewsletterUser->read(null, $id);
            if($newsletterUser) {
                $key = md5($newsletterUser['NewsletterUser']['id'].$newsletterUser['NewsletterUser']['email']);
                $paramKey = '';
                if(isset($this->params['named']['key'])) { $paramKey = $this->params['named']['key']; }
                if( $key == $paramKey ) {
                    $this->NewsletterUser->del($id);
                    $this->Session->setFlash(__('lbl_unsubscription_ok', true));
                    $this->redirect('unsubscription');
                } else {
                    $this->redirect(array('action'=>'index'));
                }
            }else {
                $this->redirect(array('action'=>'index'));
            }
        } else {
            $this->redirect(array('action'=>'index'));
        }

    }

    function admin_index() {
        $this->NewsletterUser->recursive = 0;
        $this->set('newsletterUsers', $this->paginate());
    }

    function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Iscritto alla newsletter non trovato', true));
            $this->redirect(array('action'=>'index'));
        }
        $this->set('newsletterUser', $this->NewsletterUser->read(null, $id));
    }

    function admin_add() {
        if (!empty($this->data)) {
            $this->NewsletterUser->create();
            if ($this->NewsletterUser->save($this->data)) {
                $this->Session->setFlash(__('Iscritto alla newsletter salvato', true));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('Sono presenti uno o più campi non validi.', true));
            }
        } else {
            $this->data['NewsletterUser']['is_active'] = true;
        }
        $this->set('languages', $this->NewsletterUser->Language->find('list'));
    }

    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Iscritto alla newsletter non trovato', true));
            $this->redirect(array('action'=>'index'));
        }
        if (!empty($this->data)) {
            if ($this->NewsletterUser->save($this->data)) {
                $this->Session->setFlash(__('Iscritto alla newsletter salvato', true));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('Sono presenti uno o più campi non validi.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->NewsletterUser->read(null, $id);
        }
        $this->set('languages', $this->NewsletterUser->Language->find('list'));
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Iscritto alla newsletter non trovato', true));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->NewsletterUser->del($id)) {
            $this->Session->setFlash(__('Iscritto alla newsletter cancellato', true));
            $this->redirect(array('action'=>'index'));
        }
    }

    protected function _sendUnsubscriptionMail($newsletterUser = null) {
        if($newsletterUser) {
            $this->Email->to = $newsletterUser['NewsletterUser']['email'];
            $this->Email->subject = __('lbl_request_to_remove :: www.castellosuperiore.it'); //TODO: lbl
            $this->Email->replyTo = REPLYTO_EMAIL;
            $this->Email->from = BASE_TITLE.'<'.INFO_EMAIL.'>';
            if ($newsletterUser['NewsletterUser']['language_id'] == 1) {
                $this->Email->layout = 'unsubscription';
                $this->Email->template = 'unsubscription';
            }
            else {
                $this->Email->layout = 'unsubscription_en';
                $this->Email->template = 'unsubscription_en';
            }
            //Send as 'html', 'text' or 'both' (default is 'text')
            $this->Email->sendAs = 'both'; // because we like to send pretty mail
            //Set view variables as normal
            $key = md5($newsletterUser['NewsletterUser']['id'].$newsletterUser['NewsletterUser']['email']);
            $this->set('key', $key);
            $this->set('newsletterUser', $newsletterUser);
             
            //Do not pass any args to send()
            return $this->Email->send();
        } else {
            return false;
        }

    }

}
?>