<?php

namespace TheFox\Utilities;

class Html{
	
	/**
	 * @param string $data
	 * @param integer $level
	 */
	public static function dump($data, $level = null){
		print '<pre>';
		\Doctrine\Common\Util\Debug::dump($data, $level);
		print '</pre>';
	}
	
}
