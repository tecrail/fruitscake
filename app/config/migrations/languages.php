<?php

class Memri39KJ38KJdslksdfLKW49SLKlk49s extends CakeMigration {

    public $dependendOf = array();
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'languages' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
                    'title' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'locale' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'slug' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'published' => array('type' => 'boolean', 'null' => false, 'default' => false),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                        'TITLE' => array('column' => array('title'), 'unique' => 0),
                        'PUBLISHED' => array('column' => array('published'), 'unique' => 0)
                    )
                )
            )
        ),
        'down' => array(
            'drop_table' => array(
                'languages'),
        )
    );

    public function before($direction) {
        return true;
    }

    public function after($direction) {
        return true;
    }

}
