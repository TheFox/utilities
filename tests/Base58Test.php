<?php

use TheFox\Utilities\Base58;

class Base58Test extends PHPUnit_Framework_TestCase{
	
	public function testBasic(){
		#fwrite(STDOUT, __METHOD__.''."\n");
		#$this->markTestIncomplete('This test has not been implemented yet.');
		
		$this->assertTrue(function_exists('bccomp'), 'bccomp not found.');
		$this->assertTrue(function_exists('bcdiv'), 'bcdiv not found.');
		$this->assertTrue(function_exists('bcmod'), 'bcmod not found.');
		$this->assertTrue(function_exists('bcmul'), 'bcmul not found.');
		$this->assertTrue(function_exists('bcadd'), 'bcadd not found.');
	}
	
	public function testEncode(){
		$this->assertEquals('N', Base58::encode(21));
		$this->assertEquals('2sidE', Base58::encode(21212121));
	}
	
	public function testDencode(){
		$this->assertEquals(21, Base58::decode(Base58::encode(21)));
		$this->assertEquals(21212121, Base58::decode(Base58::encode(21212121)));
	}
	
}
