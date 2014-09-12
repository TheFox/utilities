<?php

namespace TheFox\Utilities;

class Bin{
	
	public static function debugData($data){
		$charset = '^°!"$%&/()=?+*#\'-_.:,;<> ';
		$charset .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charset .= 'abcdefghijklmnopqrstuvwxyz';
		$charset .= '0123456789';
		
		fwrite(STDOUT, "c ddd xx    b b b b  b b b b\n");
		fwrite(STDOUT, "- --- --    ----------------\n");
		
		$dataLen = strlen($data);
		for($pos = 0; $pos < $dataLen; $pos++){
			$char = $data[$pos];
			$ascii = ord($char);
			
			fwrite(STDOUT, sprintf((strpos($charset, $char) === false ? ' ' : $char)." %3d %02x    %d %d %d %d  %d %d %d %d\n",
				$ascii, $ascii,
				($ascii & (1 << 7) ) > 0,
				($ascii & (1 << 6) ) > 0,
				($ascii & (1 << 5) ) > 0,
				($ascii & (1 << 4) ) > 0,
				($ascii & (1 << 3) ) > 0,
				($ascii & (1 << 2) ) > 0,
				($ascii & (1 << 1) ) > 0,
				($ascii & (1 << 0) ) > 0 
				));
		}
		fwrite(STDOUT, "\n");
	}
	
	public static function debugInt($num){
		fwrite(STDOUT, "b b b b  b b b b   d\n");
		fwrite(STDOUT, "--------------------\n");
		fwrite(STDOUT, sprintf("%d %d %d %d  %d %d %d %d   %d\n",
				($num & (1 << 7) ) > 0,
				($num & (1 << 6) ) > 0,
				($num & (1 << 5) ) > 0,
				($num & (1 << 4) ) > 0,
				($num & (1 << 3) ) > 0,
				($num & (1 << 2) ) > 0,
				($num & (1 << 1) ) > 0,
				($num & (1 << 0) ) > 0,
				$num
		));
		fwrite(STDOUT, "\n");
	}
	
}
