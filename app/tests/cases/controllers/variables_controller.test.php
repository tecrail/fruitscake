<?php
/* Variables Test cases generated on: 2011-01-28 00:01:19 : 1296170899*/
App::import('Controller', 'Variables');

class TestVariablesController extends VariablesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class VariablesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.variable', 'app.menu');

	function startTest() {
		$this->Variables =& new TestVariablesController();
		$this->Variables->constructClasses();
	}

	function endTest() {
		unset($this->Variables);
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