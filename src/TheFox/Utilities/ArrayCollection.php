<?php

/**
 * @deprecated ArrayCollection
 * @codingStandardsIgnoreFile
 */

namespace TheFox\Utilities;

use Doctrine\Common\Collections\ArrayCollection as DoctrineArrayCollection;

class ArrayCollection extends DoctrineArrayCollection{
	
	public function __construct(array $elements = array()){
		trigger_error('Deprecated class called: '.__CLASS__.'. Use a mature class like ArrayObject: https://secure.php.net/manual/en/class.arrayobject.php', E_USER_NOTICE);
	}
	
}
