<?php

use TheFox\Utilities\Bin;

class BinTest extends PHPUnit_Framework_TestCase{
	
	public function testData(){
		$this->assertTrue(true);
		
		Bin::debugData('hello world');
	}
	
	public function testInt(){
		$this->assertTrue(true);
		
		Bin::debugInt(123);
		Bin::debugInt(255);
	}
	
}
