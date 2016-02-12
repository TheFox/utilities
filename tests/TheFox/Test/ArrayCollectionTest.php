<?php

namespace TheFox\Test;

use PHPUnit_Framework_TestCase;

use TheFox\Utilities\ArrayCollection;

class ArrayCollectionTest extends PHPUnit_Framework_TestCase{
	
	public function testArrayCollection(){
		$ar = new ArrayCollection(array('a' => 'b', 'c' => 'd', 'e' => 'f'));
		
		$this->assertEquals('d', $ar['c']);
	}
	
}
