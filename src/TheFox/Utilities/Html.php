<?php

namespace TheFox\Utilities;

/**
 * @codeCoverageIgnore
 */
class Html{
	
	public static function dump($data, $level = null){
		print '<pre>';
		\Doctrine\Common\Util\Debug::dump($data, $level);
		print '</pre>';
	}
	
}
