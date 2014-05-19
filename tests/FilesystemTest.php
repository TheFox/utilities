<?php

use TheFox\Utilities\Filesystem;

class FilesystemTest extends PHPUnit_Framework_TestCase{
	
	public function testDirDelete(){
		#fwrite(STDOUT, __METHOD__.' mkdir'."\n");
		@mkdir('test1/test2', 0777, true);
		@mkdir('test1/test3', 0777, true);
		@mkdir('test4/test5', 0777, true);
		@mkdir('test6', 0777, true);
		@mkdir('test7', 0777, true);
		#sleep(1);
		
		#fwrite(STDOUT, __METHOD__.' put contents'."\n");
		file_put_contents('test1/test2/test.txt', 'test');
		file_put_contents('test7/test.txt', 'test');
		#sleep(1);
		
		#fwrite(STDOUT, __METHOD__.' exists'."\n");
		$this->assertFileExists('test1');
		$this->assertFileExists('test1/test2');
		$this->assertFileExists('test1/test2/test.txt');
		$this->assertFileExists('test1/test3');
		$this->assertFileExists('test4');
		$this->assertFileExists('test4/test5');
		$this->assertFileExists('test6');
		$this->assertFileExists('test7');
		$this->assertFileExists('test7/test.txt');
		#sleep(1);
		
		#fwrite(STDOUT, __METHOD__.' del'."\n");
		Filesystem::dirDelete('test1');
		Filesystem::dirDelete('test4');
		Filesystem::dirDelete('test6');
		Filesystem::dirDelete('test7');
		#sleep(1);
		
		#fwrite(STDOUT, __METHOD__.' not exists'."\n");
		$this->assertFileNotExists('test1');
		$this->assertFileNotExists('test1/test2');
		$this->assertFileNotExists('test1/test3');
		$this->assertFileNotExists('test4');
		$this->assertFileNotExists('test4/test5');
		$this->assertFileNotExists('test6');
		$this->assertFileNotExists('test7');
	}
	
}
