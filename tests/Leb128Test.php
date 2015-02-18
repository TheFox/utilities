<?php

use TheFox\Utilities\Leb128;

class Leb128Test extends PHPUnit_Framework_TestCase{
	
	public function testEncode(){
		$actual = unpack('H*', Leb128::encode(624485));
		$actual = $actual[1];
		$this->assertEquals('e58e26', $actual);
	}
	
	public function testDecode(){
		$str = pack('H*', 'e58e26');
		#print_r($str);
		$this->assertEquals(624485, Leb128::decode($str));
	}
	
}
