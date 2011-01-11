<?php

class Language extends AppModel {

    public $name = 'Language';
    public $displayField = 'title';
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $hasMany = array(
        'News' => array(
            'className' => 'News',
            'foreignKey' => 'language_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
