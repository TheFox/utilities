<?php

// https://en.wikipedia.org/wiki/LEB128
// http://stackoverflow.com/questions/18195415/c-base128-function

namespace TheFox\Utilities;

class Leb128
{
    /**
     * Unsigned Encode
     *
     * @param integer $x
     * @return string
     */
    public static function uencode(int $x): string
    {
        if ($x < 0) {
            throw new \InvalidArgumentException("Value can't be < 0. Use sencode().", 10);
        }

        $str = '';
        do {
            $char = $x & 0x7f;
            $x >>= 7;
            if ($x > 0) {
                $char |= 0x80;
            }
            $str .= chr($char);
        } while ($x);

        return $str;
    }

    /**
     * Unsigned Decode
     *
     * @param string $str
     * @param integer $x
     * @param integer $maxlen
     * @return integer
     */
    public static function udecode(string $str, int &$x, int $maxlen = 16): int
    {
        $len = 0;
        $x = 0;
        while ($str) {
            $char = substr($str, 0, 1);
            $char = ord($char);
            $str = substr($str, 1);

            $x |= ($char & 0x7f) << (7 * $len);
            $len++;

            if (($char & 0x80) == 0) {
                break;
            }

            if ($len >= $maxlen) {
                throw new \RuntimeException(sprintf('Max length %d reached.', $maxlen), 20);
            }
        }
        return $len;
    }

    /**
     * Signed Encode
     *
     * @param integer $x
     * @return string
     */
    public static function sencode(int $x): string
    {
        $buf = '';
        $more = 1;
        //$negative = $x < 0;
        while ($more) {
            $char = $x & 0x7f;
            $x >>= 7;

            //if($negative){
            //    $intSize = 64;
            //    $x |= -(1 << ($intSize - 7));
            //}

            if (($x == 0 && ($char & 0x40) == 0) || ($x == -1 && ($char & 0x40))) {
                $more = 0;
            } else {
                $char |= 0x80;
            }
            $buf .= chr($char);
        }

        return $buf;
    }

    /**
     * Signed Decode
     *
     * @param string $str
     * @param integer $x
     * @param integer $maxlen
     * @param integer $intSize
     * @return integer
     */
    public static function sdecode(string $str, int &$x, int $maxlen = 16, int $intSize = 64): int
    {
        $len = 0;
        $x = 0;
        $char = 0;
        //$shift = 0;
        while ($str) {
            $char = substr($str, 0, 1);
            $char = ord($char);
            $str = substr($str, 1);

            $shift = 7 * $len;
            $x |= ($char & 0x7f) << $shift;
            $len++;

            if (($char & 0x80) == 0) {
                break;
            }

            if ($len >= $maxlen) {
                throw new \RuntimeException(sprintf('Max length %d reached.', $maxlen), 30);
            }
        }

        $shift = 7 * $len;

        // Sign bit of byte is 2nd high order bit (0x40)
        if ($shift < $intSize && ($char & 0x40)) {
            $x |= -(1 << $shift);
        }

        return $len;
    }
}
