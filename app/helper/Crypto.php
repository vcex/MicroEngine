<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Encode pwrd class.
*
*@package engine
*
*@subpackage app/helper
*
*@author 0x00-dev
*
*@link <0x00.dev@gmail.com>
*
*@version 1.0.0
*
*/




class Crypto
{
	public static function encode($str)
	{

		$str_c = strlen($str);


		$str_to_arr = str_split($str);

		$str_to_arr2 = array_reverse($str_to_arr);

		rsort($str_to_arr);

		for($i = 0; $i < $str_c; $i++)
		{
			$str_to_arr[$i] = $str_to_arr2[$i];
		}

		$pwrd = implode($str_to_arr);

		$hash = crypt($pwrd,SALT);

		$new_pwrd = $hash.sha1(SKEY);

		return $new_pwrd;

	}
}