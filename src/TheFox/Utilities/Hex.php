<?php

namespace TheFox\Utilities;

use InvalidArgumentException;

class Hex
{
    const ALPHABET = '0123456789abcdef';

    /**
     * Encode an Integer to Hex string.
     *
     * @param integer $dec
     * @return string
     */
    public static function encode(int $dec): string
    {
        $chars = static::ALPHABET;
        $rv = '';

        while (bccomp($dec, 0) == 1) {
            $dv = (string)bcdiv($dec, '16', 0);
            $rem = (integer)bcmod($dec, '16');
            $dec = $dv;
            $rv .= $chars[$rem];
        }

        return strrev($rv);
    }

    /**
     * Decode a Hex string to an Integer.
     *
     * @param string $hex
     * @return string
     */
    public static function decode(string $hex): string
    {
        $chars = static::ALPHABET;
        $rv = '';

        $hex = strtolower($hex);
        $hexLen = strlen($hex);
        for ($i = 0; $i < $hexLen; $i++) {
            $current = (string)strpos($chars, $hex[$i]);
            $rv = (string)bcmul($rv, '16', 0);
            $rv = (string)bcadd($rv, $current, 0);
        }
        return $rv;
    }

    /**
     * Encode a String to a Hex string.
     *
     * @param string $data
     * @param string $separator
     * @return string
     */
    public static function dataEncode(string $data, string $separator = ''): string
    {
        $rv = [];

        $format = '%02x';
        $dataLen = strlen($data);
        for ($n = 0; $n < $dataLen; $n++) {
            $rv[] = sprintf($format, ord($data[$n]));
        }

        return join($separator, $rv);
    }

    /**
     * Decode a Hex string to a String.
     *
     * @param string $hex
     * @return string
     */
    public static function dataDecode(string $hex): string
    {
        $hexLen = strlen($hex);
        if ($hexLen % 2 != 0) {
            throw new InvalidArgumentException(
                'Uneven number of hex string: ' . $hexLen, 1);
        }

        $rv = '';
        $hexLen = strlen($hex);
        for ($n = 0; $n < $hexLen; $n += 2) {
            $rv .= chr(hexdec($hex[$n] . $hex[$n + 1]));
        }

        return $rv;
    }
}
