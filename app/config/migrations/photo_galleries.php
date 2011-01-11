<?php

class Maa9ro38dfjn49klsasdasd4beba7b4jk extends CakeMigration {

    public $dependendOf = array();
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'photo_galleries' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
                    'title' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'slug' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'description' => array('type' => 'text', 'null' => true, 'default' => NULL),
                    'published' => array('type' => 'boolean', 'null' => false, 'default' => false),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                        'TITLE' => array('column' => array('title'), 'unique' => 0),
                        'SLUG' => array('column' => array('slug'), 'unique' => 1),
                        'PUBLISHED' => array('column' => array('published'), 'unique' => 0)
                    )
                ),
                'photos' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
                    'title' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'description' => array('type' => 'text', 'null' => true, 'default' => NULL),
                    'published' => array('type' => 'boolean', 'null' => false, 'default' => false),
                    'image' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'image_dir' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'image_mimetype' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'image_filesize' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'image_filename' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'photo_gallery_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                        'TITLE' => array('column' => array('title'), 'unique' => 0),
                        'PHOTO_GALLERY_ID' => array('column' => array('photo_gallery_id'), 'unique' => 0),
                        'PUBLISHED' => array('column' => array('published'), 'unique' => 0)
                    )
                )
            ),
        ),
        'down' => array(
            'drop_table' => array(
                'photo_galleries', 'photos'),
        )
    );

    public function before($direction) {
        return true;
    }

    public function after($direction) {
        return true;
    }

}
