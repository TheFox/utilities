<?php

// http://stackoverflow.com/questions/18195415/c-base128-function

namespace TheFox\Utilities;

class Leb128{
	
	public static function encode($x){
		$buf = '';
		do{
			$c = $x & 0x7f;
			if($x >>= 7){
				$c |= 0x80;
			}
			$buf .= chr($c);
		}while($x);
		return $buf;
	}
	
	public static function decode($str, &$x){
		$len = 0;
		$x = 0;
		while($str){
			$c = substr($str, 0, 1);
			$c = ord($c);
			$str = substr($str, 1);
			
			$x |= ($c & 0x7f) << (7 * $len);
			$len++;
			
			if(!($c & 0x80)){
				break;
			}
		}
		return $len;
	}
	
}
