<?php

use TheFox\Utilities\Num;

class NumTest extends PHPUnit_Framework_TestCase{
	
	public function testBe2le(){
		$this->assertEquals(0x41, Num::be2le(0x41, 1));
		$this->assertEquals(0x4100, Num::be2le(0x41, 2));
		$this->assertEquals(0x41, Num::be2le(0x4100, 2));
		$this->assertEquals(0x4241, Num::be2le(0x4142, 2));
		$this->assertEquals(0x4342, Num::be2le(0x414243, 2));
		$this->assertEquals(0x434241, Num::be2le(0x414243, 3));
	}
	
	public function testLe2be(){
		$this->assertEquals(0x41, Num::le2be(0x41));
		$this->assertEquals(0x41, Num::le2be(0x4100));
		$this->assertEquals(0x4142, Num::le2be(0x4241));
		$this->assertEquals(0x414243, Num::le2be(0x434241));
	}
	
}
