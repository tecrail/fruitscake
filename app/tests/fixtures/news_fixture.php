<?php
/* News Fixture generated on: 2011-01-08 16:01:41 : 1294500041 */
class NewsFixture extends CakeTestFixture {
	var $name = 'News';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'slug' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'short_description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'published' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'key' => 'index'),
		'date' => array('type' => 'date', 'null' => false, 'default' => '0000-00-00', 'key' => 'index'),
		'date_from' => array('type' => 'date', 'null' => false, 'default' => '0000-00-00', 'key' => 'index'),
		'date_to' => array('type' => 'date', 'null' => false, 'default' => '0000-00-00', 'key' => 'index'),
		'language_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'SLUG' => array('column' => 'slug', 'unique' => 1), 'TITLE' => array('column' => 'title', 'unique' => 0), 'SHORT_DESRCRIPTION' => array('column' => 'short_description', 'unique' => 0), 'DATE' => array('column' => 'date', 'unique' => 0), 'DATE_FROM' => array('column' => 'date_from', 'unique' => 0), 'DATE_TO' => array('column' => 'date_to', 'unique' => 0), 'LANGUAGE_ID' => array('column' => 'language_id', 'unique' => 0), 'PUBLISHED' => array('column' => 'published', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'slug' => 'Lorem ipsum dolor sit amet',
			'short_description' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'published' => 1,
			'date' => '2011-01-08',
			'date_from' => '2011-01-08',
			'date_to' => '2011-01-08',
			'language_id' => 1,
			'created' => '2011-01-08 16:20:41',
			'modified' => '2011-01-08 16:20:41'
		),
	);
}
?>