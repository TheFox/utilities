<?php

namespace TheFox\Utilities;

class Bin
{
    /**
     * Bin::debugData('ABC');
     *
     * A  65 41    0 1 0 0  0 0 0 1
     * B  66 42    0 1 0 0  0 0 1 0
     * C  67 43    0 1 0 0  0 0 1 1
     *
     * @param string $data
     */
    public static function debugData(string $data)
    {
        $charset = '^°!"$%&/()=?+*#\'-_.:,;<> ';
        $charset .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charset .= 'abcdefghijklmnopqrstuvwxyz';
        $charset .= '0123456789';

        $dataLen = strlen($data);
        for ($pos = 0; $pos < $dataLen; $pos++) {
            $char = $data[$pos];
            $ascii = ord($char);
            $charOut = (strpos($charset, $char) === false ? ' ' : $char);
            fwrite(STDOUT, $charOut . sprintf(" %3d %02x    %d %d %d %d  %d %d %d %d\n",
                    $ascii, $ascii,
                    ($ascii & (1 << 7)) > 0,
                    ($ascii & (1 << 6)) > 0,
                    ($ascii & (1 << 5)) > 0,
                    ($ascii & (1 << 4)) > 0,
                    ($ascii & (1 << 3)) > 0,
                    ($ascii & (1 << 2)) > 0,
                    ($ascii & (1 << 1)) > 0,
                    ($ascii & (1 << 0)) > 0
                ));
        }
        fwrite(STDOUT, "\n");
    }

    /**
     * Show the first 8 bit of an Integer.
     *
     * Bin::debugInt(0xfe);
     *
     * 1 1 1 1  1 1 1 0   254
     *
     * @param integer $num
     */
    public static function debugInt(int $num)
    {
        fwrite(STDOUT, sprintf("%d %d %d %d  %d %d %d %d   %d\n",
            ($num & (1 << 7)) > 0,
            ($num & (1 << 6)) > 0,
            ($num & (1 << 5)) > 0,
            ($num & (1 << 4)) > 0,
            ($num & (1 << 3)) > 0,
            ($num & (1 << 2)) > 0,
            ($num & (1 << 1)) > 0,
            ($num & (1 << 0)) > 0,
            $num
        ));
        fwrite(STDOUT, "\n");
    }

    /**
     * Bin::debugInt32(0xfff);
     *
     * 1f 24         ff000000  0 0 0 0  0 0 0 0   0
     * 17 16           ff0000  0 0 0 0  0 0 0 0   0
     *  f  8             ff00  0 0 0 0  1 1 1 1   15
     *  7  0               ff  1 1 1 1  1 1 1 1   255
     *
     * @param integer $num
     * @param integer $sizeByte
     */
    public static function debugInt32(int $num, int $sizeByte = 4)
    {
        for ($b = $sizeByte - 1; $b >= 0; $b--) {
            $shift = $b * 8;

            // Mask
            $mask = 0xff << $shift;

            $numMasked = ($num & $mask) >> $shift;
            fwrite(STDOUT, sprintf("%2x %2d %16x  %d %d %d %d  %d %d %d %d   %d\n",
                (($b + 1) * 8) - 1,
                $shift,
                $mask,
                ($numMasked & (1 << 7)) > 0,
                ($numMasked & (1 << 6)) > 0,
                ($numMasked & (1 << 5)) > 0,
                ($numMasked & (1 << 4)) > 0,
                ($numMasked & (1 << 3)) > 0,
                ($numMasked & (1 << 2)) > 0,
                ($numMasked & (1 << 1)) > 0,
                ($numMasked & (1 << 0)) > 0,
                $numMasked
            ));
        }
        fwrite(STDOUT, "\n");
    }

    /**
     * @param int $num
     */
    public static function debugInt64(int $num)
    {
        static::debugInt32($num, 8);
    }

    /**
     * Convert an integer to a Binary string.
     * 
     * For example, convert int(24) to string(00011000).
     * 
     * @param int $i
     * @return string
     */
    public static function intToBinaryString(int $i): string
    {
        $rv = '';
        $rv .= $i & (1 << 7) ? '1' : '0';
        $rv .= $i & (1 << 6) ? '1' : '0';
        $rv .= $i & (1 << 5) ? '1' : '0';
        $rv .= $i & (1 << 4) ? '1' : '0';
        $rv .= $i & (1 << 3) ? '1' : '0';
        $rv .= $i & (1 << 2) ? '1' : '0';
        $rv .= $i & (1 << 1) ? '1' : '0';
        $rv .= $i & (1 << 0) ? '1' : '0';
        return $rv;
    }
}
