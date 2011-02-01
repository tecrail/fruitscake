<?php
/* Variable Fixture generated on: 2011-01-28 00:01:18 : 1296170898 */
class VariableFixture extends CakeTestFixture {
	var $name = 'Variable';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'key' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'value' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'KEY' => array('column' => 'key', 'unique' => 1), 'VALUE' => array('column' => 'value', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'key' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'created' => '2011-01-28 00:28:18',
			'modified' => '2011-01-28 00:28:18'
		),
	);
}
?>