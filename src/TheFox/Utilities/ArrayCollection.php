<?php

namespace TheFox\Utilities;

use Doctrine\Common\Collections\ArrayCollection as DoctrineArrayCollection;

/**
 * @deprecated ArrayCollection
 * @codingStandardsIgnoreFile
 */
class ArrayCollection extends DoctrineArrayCollection
{
    public function __construct(array $elements = array())
    {
        trigger_error('Deprecated class called: ' . __CLASS__ . '. Use a mature class like ArrayObject: https://secure.php.net/manual/en/class.arrayobject.php', E_USER_NOTICE);
    }
}
