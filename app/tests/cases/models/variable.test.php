<?php
/* Variable Test cases generated on: 2011-01-28 00:01:18 : 1296170898*/
App::import('Model', 'Variable');

class VariableTestCase extends CakeTestCase {
	var $fixtures = array('app.variable');

	function startTest() {
		$this->Variable =& ClassRegistry::init('Variable');
	}

	function endTest() {
		unset($this->Variable);
		ClassRegistry::flush();
	}

}
?>