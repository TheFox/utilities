<?php

namespace TheFox\Test;

use PHPUnit_Framework_TestCase;
use TheFox\Utilities\Bin;

class BinTest extends PHPUnit_Framework_TestCase
{
    public function testData()
    {
        $this->assertTrue(true);

        Bin::debugData('hello world');
        Bin::debugData('%s world');
    }

    public function providerInt()
    {
        $rv = [
            [123],
            [255],
        ];
        return $rv;
    }

    /**
     * @dataProvider providerInt
     */
    public function testInt(int $n)
    {
        $this->assertTrue(true);

        Bin::debugInt($n);
    }
}
