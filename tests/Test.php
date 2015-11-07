<?php

class Test extends PHPUnit_Framework_TestCase {
	public function testShouldCallEachFunction() {
		$calls = 0;
		$spy = function() use(&$calls) { ++$calls; };

		$f = compose($spy, $spy, $spy, $spy, $spy);
		$f(null);
		$this->assertEquals($calls, 5);
	}

	public function testShouldCallFirstFunctionWithInput() {
		$firstCall = null;
		$spy1 = function($input) use(&$firstCall) { $firstCall = $input; };
		$spy2 = function() { };

		$f = compose($spy2, $spy1);
		$f(5);
		$this->assertEquals($firstCall, 5);
	}
}