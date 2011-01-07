<?php
/* Photo Test cases generated on: 2011-01-07 15:01:25 : 1294410865*/
App::import('Model', 'Photo');

class PhotoTestCase extends CakeTestCase {
	var $fixtures = array('app.photo', 'app.photo_gallery');

	function startTest() {
		$this->Photo =& ClassRegistry::init('Photo');
	}

	function endTest() {
		unset($this->Photo);
		ClassRegistry::flush();
	}

}
?>