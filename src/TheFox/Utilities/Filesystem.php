<?php

namespace TheFox\Utilities;

class Filesystem{
	
	public static function dirDelete($path){
		if(is_dir($path)){
			$dh = opendir($path);
			if($dh){
				while(($file = readdir($dh)) !== false){
					if($file != '.' && $file != '..' && $file[0] != '.'){
						static::dirDelete($path.'/'.$file);
					}
				}
				closedir($dh);
				
				$dh = opendir($path);
				while(($file = readdir($dh)) !== false){
					if($file != '.' && $file != '..' && $file[0] == '.'){
						static::dirDelete($path.'/'.$file);
					}
				}
				closedir($dh);
				
				#fwrite(STDOUT, __METHOD__.' dir:  '.$path."\n");
				rmdir($path);
			}
		}
		else{
			#fwrite(STDOUT, __METHOD__.' file: '.$path."\n");
			unlink($path);
		}
	}
	
}
