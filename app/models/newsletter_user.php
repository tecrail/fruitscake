<?php

class NewsletterUser extends AppModel {

    public $name = 'NewsletterUser';
    public $belongsTo = array(
        'Language' => array(
            'className' => 'Language',
            'foreignKey' => 'language_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $validate = array(
        'first_name' => array(
            'name_not_empty' => array(
                'rule' => 'notEmpty',
                'message' => 'Inserisci il nome',
                'required' => true
            )
        ),
        'last_name' => array(
            'surname_not_empty' => array(
                'rule' => 'notEmpty',
                'message' => 'Inserisci il cognome',
                'required' => true
            )
        ),
        'email' => array(
            'email' => array(
                'rule' => 'email',
                'message' => 'Email non valida'
            ),
            'email_not_empty' => array(
                'rule' => 'notEmpty',
                'message' => 'Inserisci l\'email su cui vuoi ricevere la newsletter',
                'required' => true
            ),
            'email_unique' => array(
                'rule' => 'isUnique',
                'message' => 'L\'email inserita è già stata registrata'
            )
        )
    );

    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->validate = array(
            'first_name' => array(
                'name_not_empty' => array(
                    'rule' => 'notEmpty',
                    'message' => __('notEmpty validation message', true),
                    'required' => true
                )
            ),
            'last_name' => array(
                'surname_not_empty' => array(
                    'rule' => 'notEmpty',
                    'message' => __('notEmpty validation message', true),
                    'required' => true
                )
            ),
            'email' => array(
                'email' => array(
                    'rule' => 'email',
                    'message' => __('email validation message', true),
                ),
                'email_not_empty' => array(
                    'rule' => 'notEmpty',
                    'message' => __('notEmpty validation message', true),
                    'required' => true
                ),
                'email_unique' => array(
                    'rule' => 'isUnique',
                    'message' => __('notEmpty validation message', true),
                )
            )
        );
    }

}