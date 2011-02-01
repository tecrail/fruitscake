<?php

class Ma09328k494kfdksdnvi8365hsd9KUdsk extends CakeMigration {

    public $dependendOf = array();
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'newsletters' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
                    'title' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'slug' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'description_html' => array('type' => 'text', 'null' => true, 'default' => NULL),
                    'description_text' => array('type' => 'text', 'null' => true, 'default' => NULL),
                    'attachment' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'attachment_dir' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'attachment_mimetype' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'attachment_filesize' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'attachment_filename' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
                    'language_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                        'TITLE' => array('column' => array('title'), 'unique' => 0),
                        'SLUG' => array('column' => array('slug'), 'unique' => 1),
                        'LANGUAGE_ID' => array('column' => array('language_id'), 'unique' => 0),
                        'USER_ID' => array('column' => array('user_id'), 'unique' => 0)
                    )
                )
            )
        ),
        'down' => array(
            'drop_table' => array(
                'newsletters'),
        )
    );

    public function before($direction) {
        return true;
    }

    public function after($direction) {
        return true;
    }

}
