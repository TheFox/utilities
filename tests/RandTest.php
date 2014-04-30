<?php

use TheFox\Utilities\Rand;

class RandTest extends PHPUnit_Framework_TestCase{
	
	public function testData(){
		$this->assertEquals(21, strlen(Rand::data(21)));
	}
	
}
