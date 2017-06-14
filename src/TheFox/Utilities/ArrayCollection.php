<?php

namespace TheFox\Utilities;

/**
 * @deprecated ArrayCollection
 * @codingStandardsIgnoreFile
 */
class ArrayCollection
{
    public function __construct(array $elements = array())
    {
        trigger_error('Deprecated class called: ' . __CLASS__ . '. Use a mature class like ArrayObject: https://secure.php.net/manual/en/class.arrayobject.php', E_USER_NOTICE);
    }
}
