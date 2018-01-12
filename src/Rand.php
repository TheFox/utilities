<?php

namespace TheFox\Utilities;

class Rand
{
    /**
     * @param integer $len
     * @return string
     */
    public static function data(int $len = 16): string
    {
        $rv = '';
        for ($n = 0; $n < $len; $n++) {
            $rv .= chr(mt_rand(0, 255));
        }
        return $rv;
    }
}
