<?php

namespace TheFox\Test;

use PHPUnit\Framework\TestCase;
use TheFox\Utilities\Leb128;

class Leb128Test extends TestCase
{
    public function testUencode()
    {
        $actual = unpack('H*', Leb128::uencode(0));
        $actual = $actual[1];
        $this->assertEquals('00', $actual);

        $actual = unpack('H*', Leb128::uencode(624485));
        $actual = $actual[1];
        $this->assertEquals('e58e26', $actual);

        $actual = unpack('H*', Leb128::uencode(1024 * 1024 * 1024));
        $actual = $actual[1];
        $this->assertEquals('8080808004', $actual);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionCode 10
     */
    public function testUencodeException10()
    {
        $actual = unpack('H*', Leb128::uencode(-624485));
    }

    /**
     * @expectedException RuntimeException
     * @expectedExceptionCode 20
     */
    public function testUencodeException20()
    {
        $x = 0;

        $len = Leb128::udecode(pack('H*', '8080808004FF'), $x, 4);
        $this->assertEquals(1024 * 1024 * 1024, $x);
        $this->assertEquals(5, $len);
    }

    /**
     * @expectedException RuntimeException
     * @expectedExceptionCode 30
     */
    public function testUencodeException30()
    {
        $x = 0;

        $len = Leb128::sdecode(pack('H*', 'e58e26'), $x, 2);
    }

    public function testUdecode()
    {
        $x = 0;

        $len = Leb128::udecode(pack('H*', 'e58e26'), $x);
        $this->assertEquals(624485, $x);
        $this->assertEquals(3, $len);

        $len = Leb128::udecode(pack('H*', '8080808004'), $x);
        $this->assertEquals(1024 * 1024 * 1024, $x);
        $this->assertEquals(5, $len);

        $len = Leb128::udecode(pack('H*', '8080808004'), $x, 5);
        $this->assertEquals(1024 * 1024 * 1024, $x);
        $this->assertEquals(5, $len);

        $len = Leb128::udecode(pack('H*', '8080808004FFFF'), $x);
        $this->assertEquals(1024 * 1024 * 1024, $x);
        $this->assertEquals(5, $len);

        $len = Leb128::udecode(pack('H*', '8080808004FFFF'), $x, 5);
        $this->assertEquals(1024 * 1024 * 1024, $x);
        $this->assertEquals(5, $len);
    }

    public function testSencode()
    {
        $actual = unpack('H*', Leb128::sencode(-624485));
        $actual = $actual[1];
        $this->assertEquals('9bf159', $actual);

        $actual = unpack('H*', Leb128::sencode(624485));
        $actual = $actual[1];
        $this->assertEquals('e58e26', $actual);
    }

    public function testSdecode()
    {
        $x = 0;

        $len = Leb128::sdecode(pack('H*', 'e58e26'), $x);
        $this->assertEquals(624485, $x);
        $this->assertEquals(3, $len);

        $len = Leb128::sdecode(pack('H*', '9bf159'), $x);
        $this->assertEquals(-624485, $x);
        $this->assertEquals(3, $len);
    }
}
