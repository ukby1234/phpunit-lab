<?php
require __DIR__ . '/../classes/Input.php';
class InputTest extends PHPUnit_Framework_TestCase {
	public function testNormal() {
		$_GET['email'] = 'dtang@usc.edu';

		$result = Input::get('email');

		$this->assertEquals($result, 'dtang@usc.edu');
	}

	public function testNull() {
		$result1 = Input::get('email');
		$result2= Input::get('plan', 'standard');
		$this->assertNull($result1);
		$this->assertEquals($result2, 'standard');
	}
}
?>