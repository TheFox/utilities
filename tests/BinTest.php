<?php

namespace TheFox\Test;

use PHPUnit\Framework\TestCase;
use TheFox\Utilities\Bin;

class BinTest extends TestCase
{
    public function testData()
    {
        $this->assertTrue(true);

        Bin::debugData('hello world');
        Bin::debugData('%s world');
    }

    /**
     * @return array
     */
    public function providerInt(): array
    {
        $rv = [
            [123],
            [255],
        ];
        return $rv;
    }

    /**
     * @dataProvider providerInt
     * @param int $n
     */
    public function testInt(int $n)
    {
        $this->assertTrue(true);

        Bin::debugInt($n);
    }

    /**
     * @return array
     */
    public function intToBinaryStringProvider(): array
    {
        $rv = [
            [0, '00000000'],
            [1, '00000001'],
            [2, '00000010'],
            [24, '00011000'],
            [255, '11111111'],
            [256, '00000000'],
        ];
        return $rv;
    }

    /**
     * @dataProvider intToBinaryStringProvider
     * @param int $n
     * @param string $expected
     */
    public function testIntToBinaryString(int $n, string $expected)
    {
        $s = Bin::intToBinaryString($n);
        $this->assertEquals($expected, $s);
    }
}
