<?php
/* Language Test cases generated on: 2011-01-28 00:01:55 : 1296170215*/
App::import('Model', 'Language');

class LanguageTestCase extends CakeTestCase {
	var $fixtures = array('app.language', 'app.news', 'app.newsletter_user', 'app.newsletter', 'app.user');

	function startTest() {
		$this->Language =& ClassRegistry::init('Language');
	}

	function endTest() {
		unset($this->Language);
		ClassRegistry::flush();
	}

}
?>