<?php

class Ma09328k494kfdksdnvi8365hsd9KUdsk extends CakeMigration {

    public $dependendOf = array();
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'news' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
                    'title' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'slug' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'short_description' => array('type' => 'string', 'null' => true, 'default' => NULL),
                    'description' => array('type' => 'text', 'null' => true, 'default' => NULL),
                    'image' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'image_dir' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'image_mimetype' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'image_filesize' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'image_filename' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'published' => array('type' => 'boolean', 'null' => false, 'default' => false),
                    'date' => array('type' => 'date', 'null' => false, 'default' => "0000-00-00"),
                    'date_from' => array('type' => 'date', 'null' => false, 'default' => "0000-00-00"),
                    'date_to' => array('type' => 'date', 'null' => false, 'default' => "0000-00-00"),
                    'language_id' => array('type' => 'integer', 'null' => false, 'default' => 0),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                        'TITLE' => array('column' => array('title'), 'unique' => 0),
                        'SHORT_DESRCRIPTION' => array('column' => array('short_description'), 'unique' => 0),
                        'SLUG' => array('column' => array('slug'), 'unique' => 1),
                        'DATE' => array('column' => array('date'), 'unique' => 0),
                        'DATE_FROM' => array('column' => array('date_from'), 'unique' => 0),
                        'DATE_TO' => array('column' => array('date_to'), 'unique' => 0),
                        'LANGUAGE_ID' => array('column' => array('language_id'), 'unique' => 0),
                        'PUBLISHED' => array('column' => array('published'), 'unique' => 0)
                    )
                )
            )
        ),
        'down' => array(
            'drop_table' => array(
                'news'),
        )
    );

    public function before($direction) {
        return true;
    }

    public function after($direction) {
        return true;
    }

}
