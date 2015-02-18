<?php

use TheFox\Utilities\Leb128;

class Leb128Test extends PHPUnit_Framework_TestCase{
	
	public function testEncode(){
		$actual = unpack('H*', Leb128::encode(624485));
		$actual = $actual[1];
		$this->assertEquals('e58e26', $actual);
		
		$actual = unpack('H*', Leb128::encode(1024 * 1024 * 1024));
		$actual = $actual[1];
		$this->assertEquals('8080808004', $actual);
	}
	
	public function testDecode(){
		$len = Leb128::decode(pack('H*', 'e58e26'), $x);
		$this->assertEquals(624485, $x);
		$this->assertEquals(3, $len);
		
		$len = Leb128::decode(pack('H*', 'e58e26FF'), $x);
		$this->assertEquals(624485, $x);
		$this->assertEquals(3, $len);
		
		$len = Leb128::decode(pack('H*', '8080808004'), $x);
		$this->assertEquals(1024 * 1024 * 1024, $x);
		$this->assertEquals(5, $len);
		
		$len = Leb128::decode(pack('H*', '8080808004FFFFFF'), $x);
		$this->assertEquals(1024 * 1024 * 1024, $x);
		$this->assertEquals(5, $len);
	}
	
}
