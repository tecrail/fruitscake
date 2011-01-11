<?php
class M4d1qweasddsa5334sd210c5bdf9508da extends CakeMigration {

    /**
     * Dependency array. Define what minimum version required for other part of db schema
     *
     * Migration defined like 'app.31' or 'plugin.PluginName.12'
     *
     * @var array $dependendOf
     */
    public $dependendOf = array();
    /**
     * Migration array
     *
     * @var array $migration
     */
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'pages' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => 0, 'key' => 'primary'),
                    'slug' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'title' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'description' => array('type' => 'text', 'null' => false, 'default' => NULL),
                    'published' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                        'BY_SLUG' => array('column' => array('slug'), 'unique' => 1),
                        'BY_TITLE' => array('column' => array('title'), 'unique' => 0)
                    ),
                ),
            ),
        ),
        'down' => array(
            'drop_table' => array(
                'pages'),
        )
    );

    /**
     * before migration callback
     *
     * @param string $direction, up or down direction of migration process
     */
    public function before($direction) {
        return true;
    }

    /**
     * after migration callback
     *
     * @param string $direction, up or down direction of migration process
     */
    public function after($direction) {
        return true;
    }

}
