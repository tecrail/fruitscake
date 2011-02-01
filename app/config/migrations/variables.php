<?php

class EasdSADFjhf892r3kWOasdf90sd9KUdsk extends CakeMigration {

    public $dependendOf = array();
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'variables' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
                    'key' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'value' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                        'KEY' => array('column' => array('key'), 'unique' => 1),
                        'VALUE' => array('column' => array('value'), 'unique' => 0)
                    )
                )
            )
        ),
        'down' => array(
            'drop_table' => array(
                'variables'),
        )
    );

    public function before($direction) {
        return true;
    }

    public function after($direction) {
        return true;
    }

}
