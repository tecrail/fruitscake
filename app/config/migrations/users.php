<?php
class M4d17de526cfc4c41ad210c5bdf9508da extends CakeMigration {

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
                'users' => array(
                    'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
                    'username' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'slug' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'first_name' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'last_name' => array('type' => 'string', 'null' => false, 'default' => NULL),
                    'passwd' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 128),
                    'password_token' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 128),
                    'email' => array('type' => 'string', 'null' => true, 'default' => NULL),
                    'email_authenticated' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
                    'email_token' => array('type' => 'string', 'null' => true, 'default' => NULL),
                    'email_token_expires' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'tos' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
                    'active' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
                    'last_login' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'last_activity' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'is_admin' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
                    'role' => array('type' => 'string', 'null' => true, 'default' => NULL),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                        'BY_USERNAME' => array('column' => array('username'), 'unique' => 1),
                        'BY_EMAIL' => array('column' => array('email'), 'unique' => 1),
                        'BY_PWD' => array('column' => array('passwd'), 'unique' => 0)
//						'BY_USERNAME' => array('column' => array('username', 'passwd'), 'unique' => 0),
//						'BY_EMAIL' => array('column' => array('email', 'passwd'), 'unique' => 0)
                    ),
                ),
            ),
        ),
        'down' => array(
            'drop_table' => array(
                'users'),
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
