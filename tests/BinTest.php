<?php

use TheFox\Utilities\Bin;

class BinTest extends PHPUnit_Framework_TestCase{
	
	public function testData(){
		$this->assertTrue(true);
		
		Bin::debugData('hello world');
	}
	
	public function providerInt(){
		$rv = array();
		$rv[] = array(123);
		$rv[] = array(255);
		return $rv;
	}
	
	/**
	 * @dataProvider providerInt
	 */
	public function testInt($n){
		$this->assertTrue(true);
		
		Bin::debugInt($n);
	}
	
}
