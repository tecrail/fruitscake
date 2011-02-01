<?php
class NewslettersController extends AppController {

    public $name = 'Newsletters';
    public $components = array('Email');
    public $uses = array('Newsletter', 'NewsletterUser');

    public function beforeFilter() {
        parent::beforeFilter();
        //debug
        /*$this->Email->smtpOptions = array(
            'port'=>'25',
            'timeout'=>'30',
            'host' => 'out.alice.it'
        );
        $this->Email->delivery = 'smtp';*/
        $this->Auth->allow(array('view'));
    }

    public function admin_index() {
        $this->Newsletter->recursive = 0;
        $this->set('newsletters', $this->paginate());
    }

    #public function admin_view($id = null) {
    #    if (!$id) {
    #        $this->Session->setFlash(__('Newsletter non trovata', true));
    #        $this->redirect(array('action'=>'index'));
    #    }
    #    $this->set('newsletter', $this->Newsletter->read(null, $id));
    #}

    public function admin_add() {
        if (!empty($this->data)) {
            $this->Newsletter->create();
            

            $this->data['Newsletter']['user_id'] = $this->Session->read('Auth.User.id');
            if ($this->Newsletter->save($this->data)) {
                
                                    //da verificare
            if ($this->data['Newsletter']['language_id'] == 1)
                    $this->data['Newsletter']['description_text'] = "Per visualizzare correttamente la newsletter si prega di utillizzare il seguente link: http://".$_SERVER['HTTP_HOST'].'/newsletters/view/'.$this->Newsletter->id;
            else
                $this->data['Newsletter']['description_text'] = "To properly view the newsletter please use the following link: http://".$_SERVER['HTTP_HOST'].'/newsletters/view/'.$this->Newsletter->id;
            
                $this->Newsletter->save($this->data);
                
                $this->Session->setFlash(__('La Newsletter è stata salvata', true));
                if($this->data['Newsletter']['send_newsletter']) {
                //                        $this->Session->setFlash($this->_sendNewsletter($this->data));
                    $this->redirect(array('action'=>'deliver', 'id' => $this->Newsletter->id ));
                } else {
                    $this->redirect(array('action'=>'index'));
                }
            } else {
                $this->Session->setFlash(__('Sono presenti uno o più campi non validi.', true));
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
            $this->Session->setFlash(__('Newsletter non trovata', true));
            $this->redirect(array('action'=>'index'));
        }
        if (!empty($this->data)) {
            if ($this->data['Newsletter']['language_id'] == 1) //italiano
                    $this->data['Newsletter']['description_text'] = "Per visualizzare correttamente la newsletter si prega di utillizzare il seguente link: http://".$_SERVER['HTTP_HOST'].'/newsletters/view/'.$this->data['Newsletter']['id'];
            else
                $this->data['Newsletter']['description_text'] = "To properly view the newsletter please use the following link: http://".$_SERVER['HTTP_HOST'].'/newsletters/view/'.$this->data['Newsletter']['id'];
            if ($this->Newsletter->save($this->data)) {
                $this->Session->setFlash(__('La Newsletter è stata salvata', true));
                if($this->data['Newsletter']['send_newsletter']) {
                //                        $this->Session->setFlash($this->_sendNewsletter($this->data));
                    $this->redirect(array('action'=>'deliver', 'id' => $this->Newsletter->id ));
                } else {
                    $this->redirect(array('action'=>'index'));
                }
            } else {
                $this->Session->setFlash(__('Sono presenti uno o più campi non validi.', true));
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
            $this->Session->setFlash(__('Newsletter non trovata', true));
            $this->redirect(array('action'=>'index'));
        }

        $newsletter = $this->Newsletter->read(null, $id);

        if ($newsletter) {

            $this->NewsletterUser->recursive = -1;
            $newsletterUsers = $this->NewsletterUser->find('all', array('conditions' => array('NewsletterUser.language_id' => $newsletter['Newsletter']['language_id'], 'NewsletterUser.is_active' => true)));

            foreach ($newsletterUsers as $newsletterUser) {
                $this->_deliverEmail($newsletter, $newsletterUser['NewsletterUser']);
            }
            
//            debug($this->Email->smtpError);
//            die();

            $this->Session->setFlash(__('Newsletter inviata', true));

            $this->redirect(array('action'=>'index'));


        }

    }

    //    protected public function _sendNewsletter($data = null, $languages) {
    //        $msg = "Utenti a cui non è stato possibile recapitare la newsletter:<ul>";
    //        $sentToAll = true;
    //
    //        $newsletterUsers = $this->NewsletterUser->find('all', array('conditions' => array('NewsletterUser.is_active' => true)));
    //        foreach ($newsletterUsers as $newsletterUser) {
    //            $this->Email->reset();
    //            if(!$this->_deliverEmail($data, $newsletterUser['NewsletterUser']['email'])) {
    //                $sentToAll = false;
    //                $msg.= "<li>{$newsletterUser['NewsletterUser']['email']}</li>";
    //            }
    //        }
    //        if($sentToAll) {
    //            $msg = "Newsletter inviata con successo";
    //        } else {
    //            $msg.= "</ul>";
    //        }
    //
    //        return $msg;
    //
    //    }

    protected function _deliverEmail($newsletter = null, $user = null, $lang = null) {
        if($newsletter && $user) {

            $this->Email->to = $user['email'];
            $this->Email->subject = 'Newsletter :: '.$newsletter['Newsletter']["title"];
            $this->Email->replyTo = REPLYTO_EMAIL;
            $this->Email->from = BASE_TITLE.'<'.INFO_EMAIL.'>';

            if((bool)$newsletter['Newsletter']["attachment"]) {
                $this->Email->attachments = array(APP . "webroot" . DS . "files" . DS . "attachments" . DS . $newsletter['Newsletter']["attachment"]);
            }

            if ($newsletter['Newsletter']["language_id"] == 1) {
                $this->Email->layout = 'newsletter';
            }
            else {
                $this->Email->layout = 'newsletter_en';
            }
            $this->Email->template = 'newsletter';

            $this->Email->sendAs = 'both';

            $this->set("data", $newsletter);
            $this->set("user", $user);

//            debug
//            $this->Email->delivery = 'smtp';


            return $this->Email->send();

        } else {
            return false;
        }
    }

    public function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Newsletter non trovata', true));
            $this->redirect(array('action'=>'index'));
        }
        $this->layout = 'email/html/newsletter';
        $this->set('newsletter', $this->Newsletter->read(null, $id));
    }


    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Newsletter', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Newsletter->del($id)) {
            $this->Session->setFlash(__('Newsletter deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The Newsletter could not be deleted. Please, try again.', true));
        $this->redirect(array('action' => 'index'));
    }

}
?>