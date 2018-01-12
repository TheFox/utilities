<?php

namespace TheFox\Test;

use PHPUnit\Framework\TestCase;
use TheFox\Utilities\Rand;

class RandTest extends TestCase
{
    public function testData()
    {
        $this->assertEquals(21, strlen(Rand::data(21)));
    }
}
