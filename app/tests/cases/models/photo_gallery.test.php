<?php
/* PhotoGallery Test cases generated on: 2011-01-07 15:01:14 : 1294410854*/
App::import('Model', 'PhotoGallery');

class PhotoGalleryTestCase extends CakeTestCase {
	var $fixtures = array('app.photo_gallery', 'app.photo');

	function startTest() {
		$this->PhotoGallery =& ClassRegistry::init('PhotoGallery');
	}

	function endTest() {
		unset($this->PhotoGallery);
		ClassRegistry::flush();
	}

}
?>