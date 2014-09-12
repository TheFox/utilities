<?php

use TheFox\Utilities\Bin;

class BinTest extends PHPUnit_Framework_TestCase{
	
	public function testBin(){
		$this->assertTrue(true);
		
		Bin::debugData('hello world');
		
		Bin::debugInt(123);
		Bin::debugInt(255);
	}
	
}
