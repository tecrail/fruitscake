<?php
/* Page Test cases generated on: 2011-01-06 16:01:38 : 1294328198*/
App::import('Model', 'Page');

class PageTestCase extends CakeTestCase {
	var $fixtures = array('app.page');

	function startTest() {
		$this->Page =& ClassRegistry::init('Page');
	}

	function endTest() {
		unset($this->Page);
		ClassRegistry::flush();
	}

}
?>