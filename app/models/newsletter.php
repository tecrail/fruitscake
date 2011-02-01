<?php

class Newsletter extends AppModel {

    public $name = 'Newsletter';
    public $belongsTo = array(
        'User' => array(
            'classtitle' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Language' => array(
            'classtitle' => 'Language',
            'foreignKey' => 'language_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $actsAs = array(
        'Containable',
        'CakeAttachment.Upload' => array(
            'attachment' => array(
                'dir' => "{FILES}attachments",
                'uniqidAsFilenames' => true
            )
        ),
        'Utils.Sluggable' => array(
            'method' => 'multibyteSlug',
            'separator' => '-',
            'update' => true
        )
    );
    public $validate = array();

    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);

        $this->validate = array(
            'title' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => __('notEmpty validation message', true),
                ),
                'between' => array(
                    'rule' => array('between', 0, 255),
                    'message' => __('between 0-255 validation message', true),
                )
            )
        );
    }

}