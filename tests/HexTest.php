<?php

namespace TheFox\Test;

use PHPUnit\Framework\TestCase;
use TheFox\Utilities\Hex;

class HexTest extends TestCase
{
    public function testEncode()
    {
        $this->assertEquals('15', Hex::encode(21));
        $this->assertEquals('143abd9', Hex::encode(21212121));

        $this->assertEquals(21, Hex::decode(Hex::encode(21)));
        $this->assertEquals(21212121, Hex::decode(Hex::encode(21212121)));
        
        $this->assertEquals('414243', Hex::dataEncode('ABC'));
        $this->assertEquals('41-42-43', Hex::dataEncode('ABC', '-'));
        $this->assertEquals('68656c6c6f20776f726c64', Hex::dataEncode('hello world'));
        $this->assertEquals('68-65-6c-6c-6f-20-77-6f-72-6c-64', Hex::dataEncode('hello world', '-'));
        
        $this->assertEquals('1b', Hex::dataEncode("\x1b"));
        $this->assertEquals('7f', Hex::dataEncode("\x7f"));
    }

    public function testEncodeDecode()
    {
        $this->assertEquals(21, Hex::decode(Hex::encode(21)));
        $this->assertEquals(21212121, Hex::decode(Hex::encode(21212121)));

        $this->assertEquals('ABC', Hex::dataDecode(Hex::dataEncode('ABC')));
        $this->assertEquals('hello world', Hex::dataDecode(Hex::dataEncode('hello world')));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionCode 1
     */
    public function testDataDecodeInvalidArgumentException()
    {
        Hex::dataDecode('a41');
    }
}
