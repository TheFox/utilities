<?php

namespace TheFox\Utilities;

class Num{
	
	/**
	 * Big Endian to Little Endian
	 */
	public static function be2le($n, $len){
		$rv = 0;
		for($pos = 0; $pos < $len; $pos++){ 
			$rv <<= 8;
			$rv |= $n & 0xff;
			$n >>= 8;
		}
		return $rv;
	}
	
	/**
	 * Little Endian to Big Endian
	 */
	public static function le2be($n){
		$rv = 0;
		
		while($n){
			$rv <<= 8;
			$rv |= $n & 0xff;
			$n >>= 8;
			#print "le2be: ".dechex($n)." ".dechex($rv)."\n";
			#sleep(1);
		}
		
		return $rv;
	}
	
}
