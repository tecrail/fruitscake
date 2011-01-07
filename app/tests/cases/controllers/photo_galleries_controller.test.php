<?php
/* PhotoGalleries Test cases generated on: 2011-01-07 15:01:15 : 1294410855*/
App::import('Controller', 'PhotoGalleries');

class TestPhotoGalleriesController extends PhotoGalleriesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PhotoGalleriesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.photo_gallery', 'app.photo');

	function startTest() {
		$this->PhotoGalleries =& new TestPhotoGalleriesController();
		$this->PhotoGalleries->constructClasses();
	}

	function endTest() {
		unset($this->PhotoGalleries);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>