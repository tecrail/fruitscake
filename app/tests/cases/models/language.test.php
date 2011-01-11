<?php
/* Language Test cases generated on: 2011-01-08 16:01:28 : 1294500628*/
App::import('Model', 'Language');

class LanguageTestCase extends CakeTestCase {
	var $fixtures = array('app.language', 'app.news');

	function startTest() {
		$this->Language =& ClassRegistry::init('Language');
	}

	function endTest() {
		unset($this->Language);
		ClassRegistry::flush();
	}

}
?>