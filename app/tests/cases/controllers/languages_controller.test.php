<?php
/* Languages Test cases generated on: 2011-01-28 00:01:56 : 1296170216*/
App::import('Controller', 'Languages');

class TestLanguagesController extends LanguagesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class LanguagesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.language', 'app.news', 'app.newsletter_user', 'app.newsletter', 'app.user', 'app.menu');

	function startTest() {
		$this->Languages =& new TestLanguagesController();
		$this->Languages->constructClasses();
	}

	function endTest() {
		unset($this->Languages);
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