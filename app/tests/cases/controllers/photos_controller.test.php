<?php
/* Photos Test cases generated on: 2011-01-07 15:01:25 : 1294410865*/
App::import('Controller', 'Photos');

class TestPhotosController extends PhotosController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PhotosControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.photo', 'app.photo_gallery');

	function startTest() {
		$this->Photos =& new TestPhotosController();
		$this->Photos->constructClasses();
	}

	function endTest() {
		unset($this->Photos);
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