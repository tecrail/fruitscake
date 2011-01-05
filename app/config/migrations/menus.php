<?php

class Caa9bc72d1cc4476fbccp1e4beba7b4jk extends CakeMigration {

    public $dependendOf = array();
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'menus' => array(
                    'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
                    'menu_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36),
                    'foreign_key' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36),
                    'model' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'record_count' => array('type' => 'integer', 'null' => true, 'default' => 0),
                    'lft' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
                    'rght' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
                    'name' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'slug' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'description' => array('type' => 'text', 'null' => true, 'default' => NULL),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'UNIQUE_MENU_NAME' => array('column' => array('name'), 'unique' => 0))
                )
            ),
        ),
        'down' => array(
            'drop_table' => array(
                'menus'),
        )
    );

    public function before($direction) {
        return true;
    }

    public function after($direction) {
        return true;
    }

}
