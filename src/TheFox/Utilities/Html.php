<?php

namespace TheFox\Utilities;

class Html{
	
	public static function dump($data){
		print '<pre>';
		\Doctrine\Common\Util\Debug::dump($data);
		print '</pre>';
	}
	
}
