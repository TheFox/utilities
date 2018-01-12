<?php

namespace TheFox\Utilities;

class Num
{
    /**
     * Big Endian to Little Endian
     *
     * @param integer $n
     * @param integer $len
     * @return int
     */
    public static function be2le(int $n, int $len): int
    {
        $rv = 0;
        
        for ($pos = 0; $pos < $len; $pos++) {
            $rv <<= 8;
            $rv |= $n & 0xff;
            $n >>= 8;
        }
        
        return $rv;
    }

    /**
     * Big Endian to Little Endian Hex
     *
     * @param integer $n
     * @param integer $len
     * @return string
     */
    public static function be2leStr(int $n, int $len): string
    {
        $rv = '';
        
        for ($pos = 0; $pos < $len; $pos++) {
            $rv .= sprintf('%02x', $n & 0xff);
            $n >>= 8;
        }
        
        return $rv;
    }

    /**
     * Little Endian to Big Endian
     *
     * @param integer $n
     * @return integer
     */
    public static function le2be(int $n): int
    {
        $rv = 0;

        while ($n) {
            $rv <<= 8;
            $rv |= $n & 0xff;
            $n >>= 8;
        }

        return $rv;
    }
}
