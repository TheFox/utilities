<?php

namespace TheFox\Utilities;

/**
 * @codeCoverageIgnore
 */
class Base58{
	
	const ALPHABET = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
	
	public static function encode($num){
		trigger_error(__CLASS__.'->'.__FUNCTION__.'() is deprecated. Use stephenhill/base58 instead.', E_USER_NOTICE);
	}
	
	public static function decode($base58){
		trigger_error(__CLASS__.'->'.__FUNCTION__.'() is deprecated. Use stephenhill/base58 instead.', E_USER_NOTICE);
	}
	
}
