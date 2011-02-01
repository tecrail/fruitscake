<?php

class Ma0lppaoo0234kjdsdfjasd90jasd9sd9KUdsk extends CakeMigration {

    public $dependendOf = array();
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'newsletter_users' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
                    'first_name' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'last_name' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'email' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'is_active' => array('type' => 'boolean', 'null' => false, 'default' => false),
                    'language_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                        'FIRST_NAME' => array('column' => array('first_name'), 'unique' => 0),
                        'LAST_NAME' => array('column' => array('last_name'), 'unique' => 0),
                        'EMAIL' => array('column' => array('email'), 'unique' => 0),
                        'LANGUAGE_ID' => array('column' => array('language_id'), 'unique' => 0),
                        'IS_ACTIVE' => array('column' => array('is_active'), 'unique' => 0)
                    )
                )
            )
        ),
        'down' => array(
            'drop_table' => array(
                'newsletter_users'),
        )
    );

    public function before($direction) {
        return true;
    }

    public function after($direction) {
        return true;
    }

}
